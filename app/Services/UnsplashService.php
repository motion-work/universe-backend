<?php

namespace App\Services;


use Crew\Unsplash\HttpClient;
use Crew\Unsplash\Photo;
use function GuzzleHttp\Psr7\str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UnsplashService
{

    protected $photo;

    /**
     * UnsplashService constructor.
     */
    public function __construct()
    {
        HttpClient::init([
            'applicationId' => env('UNSPLASH_ID'),
            'secret'        => env('UNSPLASH_SECRET'),
            'callbackUrl'   => env('UNSPLASH_CALLBACK_URL'),
            'utmSource'     => env('APP_NAME'),
        ]);
    }

    /**
     * @param string $query
     *
     * @return String
     */
    public function saveRandomImage($query = 'technology') : String
    {
        // Or apply some optional filters by passing a key value array of filters
        $filters = ['query' => $query,];

        $photo = Photo::random($filters);
        $this->photo = $photo;

        $url = $this->photo->urls['small'];

        $img = Image::make($url)->encode('jpg');
        $fileName = time() . '.jpg';

        Storage::put('public/' . $fileName, $img->getEncoded());

        return $fileName;
    }

}