<?php

namespace App\Http\Controllers\Auth;

use Antvel\User\Auth\Login;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Antvel\User\Requests\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\AgroUser;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;
use App\User;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * The Antvel sessions driver.
     *
     * @var Login
     */
    protected $antvel = null;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Login $antvel)
    {
        $this->middleware('guest', ['except' => 'logout']);

        $this->antvel = $antvel;
    }

    /**
     * Process the user login.
     *
     * @param  Request $request
     * @return void
     */
    public function login(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        $attempt = \Auth::attempt($credentials);
        if ($attempt) {
            return redirect(url('/'));
        }

        return redirect()->back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'password' => 'Invalid password',
        ]);
    }

    public function loginOauth(Request $request)
    {

        $user = AgroUser
            ::where('phone', $request->input('phone'))
            ->first();

        if ($user == null) {
            return redirect()->back()
                    ->withInput($request->only('phone'))
                    ->withErrors([
                        'phone' => 'User not found',
            ]);
        }

        $credentials = [
            'phone' => $request->input('phone'),
            'password' => $request->input('password')
        ];

        $client = new Client();
        $response = $client->request('POST', env('AGROYARD_API_AUTH'), [
            'form_params' => [
                'phone' => $request->input('phone'),
                'password' => $request->input('password'),
            ]
        ]);

        if ((string) $response->getBody() != '0') {
            $attempt = \Auth::attempt($credentials);
            if ($attempt) {
                $user->autosetRole();
                return redirect(url('/'));
            }
        }

        return redirect()->back()
                ->withInput($request->only('phone'))
                ->withErrors([
                    'password' => 'Invalid password',
        ]);
    }
}
