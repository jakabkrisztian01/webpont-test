<?php

namespace App\Services;

use App\Repositories\WeatherRepository;

class WeatherService
{
    public function __construct(
        private readonly WeatherRepository $weatherRepository
    ) {
    }
    public function storeCityWeather(): bool
    {

    }


}
