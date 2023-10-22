<?php

namespace App\Services\Builders;

use Illuminate\Support\Facades\Http;

class OpenWeatherApiClientBuilder
{
    public function build()
    {
        return Http::baseUrl(config('weather-api.base_url'))->withQueryParameters(
            [
                'appid' => config('weather-api.api_key'),
            ]
        );
    }

}
