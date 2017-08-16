<?php

namespace App;

/*
 * Antvel - Order Model
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */

use App\Log;
use App\Notice;
use App\OrderDetail;
use App\VirtualProduct;
use App\Eloquent\Model;
use App\VirtualProductOrder;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ProductsController as ProductsController;

//shop components.
use Antvel\Product\Models\Product;
use Antvel\AddressBook\Models\Address;
use Antvel\User\UsersRepository as Users;
use App\Models\UserProduct;

class Order extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'status',
        'type',
        'description',
        'end_date',
        'seller_id',
    ];

    protected $appends = ['translatedStatus'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function details()
    {
        return $this->hasMany('App\OrderDetail');
    }

    public function save(array $options = [])
    {
        $status_changed = (isset($this->original['status']) && $this->attributes['status'] != $this->original['status']) || (isset($options['status']) && $this->attributes['status'] != $options['status']);
        $saved = parent::save($options);
        if ($saved) {
            $this->createLog();
            if ($status_changed) {
                $this->sendNotice();
            }
        }

        return $saved;
    }

    public function getDetailsAttribute()
    {
        return $this->hasMany('App\OrderDetail')->get();
    }

    public function getTranslatedStatusAttribute()
    {
        return trans('globals.order_status.' . $this->status);
    }

    public function inDetail()
    {
        return $this->hasMany('App\OrderDetail');
    }

    public function createLog()
    {
        $actions = [];
        foreach (trans('globals.action_types') as $value) {
            if ($value['source_type'] == 'order') {
                $actions[$value['action']] = $value['id'];
            }
        }

        if (isset($actions[$this->status])) {
            Log::create([
                'action_type_id' => $actions[$this->status],
                'source_id' => $this->id,
                'user_id' => $this->user_id,
                'details' => "Order #$this->id $this->status",
            ]);
        }

        return $this;
    }

    public function sendNotice()
    {
        if (!empty($this->seller_id) && !empty($this->user_id) && $this->type == 'order') {
            switch ($this->status) {
                case 'open':
                    Notice::create([
                        'action_type_id' => 1,
                        'source_id' => $this->id,
                        'user_id' => $this->seller_id,
                        'sender_id' => $this->user_id,
                    ]);
                    break;
                case 'pending':
                    Notice::create([
                        'action_type_id' => 2,
                        'source_id' => $this->id,
                        'user_id' => $this->user_id,
                        'sender_id' => $this->seller_id,
                    ]);
                    break;
                case 'closed':
                    Notice::create([
                        'action_type_id' => 8,
                        'source_id' => $this->id,
                        'user_id' => $this->seller_id,
                        'sender_id' => $this->user_id,
                    ]);
                    break;
                case 'cancelled':
                    Notice::create([
                        'action_type_id' => 9,
                        'source_id' => $this->id,
                        'users' => [$this->seller_id, $this->user_id],
                    ]);
                    break;
                case 'sent':
                    Notice::create([
                        'action_type_id' => 11,
                        'source_id' => $this->id,
                        'user_id' => $this->user_id,
                        'sender_id' => $this->seller_id,
                    ]);
                    break;
            }
        }
        // $this->sendMail();
        return $this;
    }

    public function sendMail()
    {
        switch ($this->status) {
            case 'pending':
                //Sends the user a mail to nitify that the
                $template = 'emails.order_status_changed';
                $buyer_user = User::findOrFail($this->user_id);
                $email = $buyer_user->email;
                $email_message = trans('email.status_changed.changed_to_pending');
                $subject = trans('email.status_changed.subject1') . $this->id . ' ' . trans('email.status_changed.subject2') . ' ' . trans('store.pending');
                break;
            case 'closed':
                //Sends the buyer a mail to notify that the Order is Closed
                $template = 'emails.order_status_changed';
                $seller_user = User::findOrFail($this->seller_id);
                $email = $seller_user->email;
                $email_message = trans('email.status_changed.changed_to_closed');
                $subject = trans('email.status_changed.subject1') . $this->id . ' ' . trans('email.status_changed.subject2') . ' ' . trans('store.closed');
                break;
            case 'sent':
                //Sends the user a mail to notify that the order is Sent
                $template = 'emails.order_status_changed';
                $buyer_user = User::findOrFail($this->user_id);
                $email = $buyer_user->email;
                $email_message = trans('email.status_changed.changed_to_sent');
                $subject = trans('email.status_changed.subject1') . $this->id . ' ' . trans('email.status_changed.subject2') . ' ' . trans('store.sent');
                break;
        }
        $data = [
            'order_id' => $this->id,
            'email' => $email,
            'email_message' => $email_message,
            'new_status' => $this->status,
            'subject' => $subject,
        ];
        if (isset($template)) {
            Mail::queue($template, $data, function ($message) use ($data) {
                $message->to($data['email'])->subject($data['subject']);
            });
        }
    }

    /**
     * Start the checkout process for any type of order.
     *
     * @param int $type_order Type of order to be processed
     *
     * @return Response
     */
    public static function placeOrders($type_order)
    {
        $cart = self::ofType($type_order)->auth()->whereStatus('open')->orderBy('id', 'desc')->first();

        $show_order_route = 'orders.show_cart';

        $cartDetail = OrderDetail::where('order_id', $cart->id)->get();

        //Checks if the user has points for the cart price and the store has stock
        //and set the order prices to the current ones if different
        //Creates the lists or sellers to send mail to
        $seller_email = [];
        foreach ($cartDetail as $orderDetail) {
            $product = UserProduct::find($orderDetail->product_id);
            $seller = User::find($product->created_by);

            // dd($product, $seller);

            if (!in_array($seller->email, $seller_email)) {
                $seller_email[] = $seller->email;
            }
        }

        //Checks if the user has points for the cart price
        $user = \Auth::user();

        //moves the details to the new orders
        $oldOrder = $orderDetail->order;
        //Separate the order for each seller
        //Looks for all the different sellers in the cart

        $sellers = [];
        foreach ($cartDetail as $orderDetail) {
            if (!in_array($orderDetail->product->updated_by, $sellers)) {
                $sellers[] = $orderDetail->product->updated_by;
            }
        }
        foreach ($sellers as $seller) {
            //Creates a new order and address for each seller
            $newOrder = new self();
            $newOrder->user_id = $user->id;
            $newOrder->status = 'open';
            $newOrder->type = 'order';
            $newOrder->seller_id = $seller;
            $newOrder->save();
            $newOrder->sendNotice();
            //moves the details to the new orders
            foreach ($cartDetail as $orderDetail) {
                if ($orderDetail->product->updated_by == $seller) {
                    $orderDetail->order_id = $newOrder->id;
                    $orderDetail->save();
                }

                //Increasing product counters.
                ProductsController::setCounters($orderDetail->product, ['sale_counts' => trans('globals.product_value_counters.sale')], 'orders');

                //saving tags in users preferences
                if (trim($orderDetail->product->tags) != '') {
                    Users::updatePreferences('product_purchased', $product->tags);
                }
            }
        }
        $oldOrder->delete();

        foreach ($seller_email as $email) {
            $mailed_order = self::where('id', $newOrder->id)->with('details')->get()->first();

            //Send a mail to the user: Order has been placed
            $data = [
                'orderId' => $newOrder->id,
                'order' => $mailed_order,
            ];
            //dd($data['order']->details,$newOrder->id);
            $title = trans('email.new_order_for_user.subject') . " (#$newOrder->id)";
            Mail::send('emails.neworder', compact('data', 'title'), function ($message) use ($user) {
                $message->to($user->email)->subject(trans('email.new_order_for_user.subject'));
            });
            //Send a mail to the seller: Order has been placed
            $title = trans('email.new_order_for_seller.subject') . " (#$newOrder->id)";
            Mail::send('emails.sellerorder', compact('data', 'title'), function ($message) use ($email) {
                $message->to($email)->subject(trans('email.new_order_for_seller.subject'));
            });
        }

        return;
    }

    public function scopeOfType($query, $type)
    {
        return $query->whereType($type);
    }

    public function scopeOfStatus($query, $status)
    {
        return $query->where('orders.status', $status);
    }

    public function scopeOfDates($query, $from, $to = '')
    {
        if (trim($from) == '' && trim($to) == '') {
            return;
        }

        if (trim($from) != '' && trim($to) != '') {
            return $query->whereBetween(\DB::raw('DATE(orders.created_at)'), [$from, $to]);
        } elseif (trim($from) != '' && trim($to) == '') {
            return $query->where(\DB::raw('DATE(orders.created_at)'), $from);
        } elseif (trim($from) == '' && trim($to) != '') {
            return $query->where(\DB::raw('DATE(orders.created_at)'), $to);
        }
    }
}
