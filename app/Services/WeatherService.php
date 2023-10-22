<?php

namespace App\Services;

use App\Exceptions\OpenWeatherApiException;
use App\Models\City;
use App\Repositories\WeatherRepository;
use App\Services\Builders\WeatherDataByCityBuilder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class WeatherService
{
    public function __construct(
        private readonly WeatherRepository $weatherRepository,
        private readonly OpenWeatherApiService $openWeatherApiService,
        private readonly CityService $cityService,
        private readonly WeatherDataByCityBuilder $weatherDataByCityVoBuilder
    ) {
    }


    public function storeCityWeather(): bool
    {
        $allCityWeatherData = Collection::make();
        $this->cityService->getAllCity()
            ->each(function (City $city) use ($allCityWeatherData) {
                try {
                    $allCityWeatherData->put(
                        $city->id,
                        $this->weatherDataByCityVoBuilder->build(
                            $this->openWeatherApiService->getCityWeatherByLatLon(
                                $city->latitude,
                                $city->longitude
                            ))
                    );
                } catch (OpenWeatherApiException $e) {
                    Log::error($e->getMessage());
                }
            });

        try {
            $this->weatherRepository->insert($allCityWeatherData);

            return true;
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return false;
        }
    }

    public function get24hCityWeather(string $city): Collection
    {
        return $this->weatherRepository->get24hCityWeather($city);
    }


}
