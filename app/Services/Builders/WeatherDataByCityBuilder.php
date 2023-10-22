<?php

namespace App\Services\Builders;

use App\ValueObjects\WeatherDataByCityVo;
use Illuminate\Support\Carbon;

class WeatherDataByCityBuilder
{
    public function build(array $weatherData): WeatherDataByCityVo
    {
        return new WeatherDataByCityVo(
            time: Carbon::createFromTimestamp($weatherData['dt']),
            city: $weatherData['name'],
            latitude: $weatherData['coord']['lat'],
            longitude: $weatherData['coord']['lon'],
            temperature: $weatherData['main']['temp'],
            pressure: $weatherData['main']['pressure'],
            humidity: $weatherData['main']['humidity'],
            minTemperature: $weatherData['main']['temp_min'],
            maxTemperature: $weatherData['main']['temp_max'],
        );
    }

}
