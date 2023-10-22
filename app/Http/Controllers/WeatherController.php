<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WeatherController extends Controller
{
    public function __construct(
        private readonly WeatherService $weatherService
    ) {
    }

    public function storeCityWeatherData(): JsonResponse
    {
        $this->weatherService->storeCityWeather();

        return response()->json(['message' => 'Weather data stored successfully']);
    }
    public function get24hCityWeather(Request $request): JsonResponse
    {
        $isValid = Validator::make($request->all(), [
            'city' => 'required|string',
        ]);

        if ($isValid->fails()) {
            return response()->json($isValid->errors(), 401);
        }

        //implement method
        $weather = $this->weatherService->get24hCityWeather($request->input('city'));

        return response()
            ->json(
                $weather->isNotEmpty() ?
                    $weather :
                    ['message' => 'No weather data found for this city']
            );
    }
}
