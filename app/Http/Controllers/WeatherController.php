<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function get24hCityWeather(Request $request): JsonResponse
    {
        $isValid = Validator::make($request->all(), [
            'city' => 'required|string',
        ]);

        if ($isValid->fails()) {
            return response()->json($isValid->errors(), 401);
        }

        $weather = $this->weatherService->get24hCityWeather($request->input('city'));

        return response()
            ->json(
                $weather->isNotEmpty() ?
                    $weather :
                    ['message' => 'No weather data found for this city']
            );
    }
}
