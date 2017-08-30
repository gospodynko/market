<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Banner extends Model
{

    const BANNERS_PATH = 'banners/';

    protected $fillable = [
        'is_special',
        'url',
    ];
    protected $appends = [
        'image',
    ];

    public function getImageAttribute()
    {
        return Storage::disk('public')->url(self::BANNERS_PATH . $this->id . '.jpg');
    }

    public function setImageAttribute($imagePath)
    {
        $image = Image::make($imagePath);
        $image->encode('jpg', 100);

        $imageName = $this->id . '.jpg';

        Storage::disk('public')->put(self::BANNERS_PATH . $imageName, $image->stream());
    }
}
