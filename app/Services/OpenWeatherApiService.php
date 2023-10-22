<?php

namespace App\Services;

use App\Exceptions\OpenWeatherApiException;

class OpenWeatherApiService
{
    public function __construct(
        private readonly OpenWeatherApiClientService $openWeatherApiClientService,
    ) {
    }

    /**
     * @throws OpenWeatherApiException
     */
    public function getCityWeatherByLatLon(float $lat, float $lon): array
    {
        return $this->openWeatherApiClientService->getWeatherData([
            'lat' => $lat,
            'lon' => $lon,
        ]);
    }

}
