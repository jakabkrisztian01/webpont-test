<?php

namespace App\Repositories;

use App\Models\Weather;
use App\ValueObjects\WeatherDataByCityVo;
use Illuminate\Support\Collection;

class WeatherRepository
{
    public function insert(Collection $weatherDataByCity): void
    {
        $weatherData = $weatherDataByCity
            ->map(function (WeatherDataByCityVo $weatherDataByCityVo, int $cityId) {
                return [
                    'city_id' => $cityId,
                    'latitude' => $weatherDataByCityVo->latitude,
                    'longitude' => $weatherDataByCityVo->longitude,
                    'temperature' => $weatherDataByCityVo->temperature,
                    'pressure' => $weatherDataByCityVo->pressure,
                    'humidity' => $weatherDataByCityVo->humidity,
                    'min_temperature' => $weatherDataByCityVo->minTemperature,
                    'max_temperature' => $weatherDataByCityVo->maxTemperature,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            });

        Weather::insert($weatherData->toArray());
    }

    /**
     * @return Collection<int, Weather>
     */
    public function get24hCityWeather($city): Collection
    {
        return Weather::join('cities', 'cities.id', '=', 'weather.city_id')
            ->where('cities.name', $city)
            ->where('weather.created_at', '>=', now()->subDay())
            ->orderBy('weather.created_at', 'desc')
            ->get();
    }

}
