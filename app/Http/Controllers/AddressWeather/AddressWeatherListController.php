<?php

namespace App\Http\Controllers\AddressWeather;

use App\Http\Controllers\Controller;
use App\Models\AddressConsulted;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AddressWeatherListController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $addresses = AddressConsulted::with('weathers.weatherCurrent')
            ->paginate(10);

        return response()->json($addresses);
    }
}
