<?php

namespace App\Services;

use App\Exceptions\OpenWeatherApiException;
use App\Services\Builders\OpenWeatherApiClientBuilder;

class OpenWeatherApiClientService
{
    public function __construct(
        private readonly OpenWeatherApiClientBuilder $openWeatherApiClientBuilder
    ) {
    }

    /**
     * @throws OpenWeatherApiException
     */
    public function getWeatherData(array $queryParams): array
    {
        $response = $this->openWeatherApiClientBuilder->build()
            ->get('weather', $queryParams)->json();

        if ($response->successful()) {
            return $response->json();
        } else {
            throw new OpenWeatherApiException(
                'Failed to get weather data from OpenWeatherApi. Error code: ' .
                $response->status() .
                ' Error message: ' .
                $response->body()
            );
        }
    }

}
