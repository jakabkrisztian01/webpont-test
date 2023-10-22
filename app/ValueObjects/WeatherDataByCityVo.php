<?php

namespace App\ValueObjects;

use Illuminate\Support\Carbon;

class WeatherDataByCityVo
{
    public function __construct(
        public Carbon $time,
        public string $city,
        public float $latitude,
        public float $longitude,
        public float $temperature,
        public int $pressure,
        public int $humidity,
        public float $minTemperature,
        public float $maxTemperature,
    ) {
    }

}
