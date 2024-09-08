<?php

namespace App\Http\Controllers\AddressWeather;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddressConsulted;
use App\Models\Weather;
use Illuminate\Http\JsonResponse;

class AddressWeatherDeleteController extends Controller
{
    /**
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'address_id' => 'required|exists:addresses_consulted,id',
            'weather_id' => 'required|exists:Weather,id',
        ]);

        try {
            $address = AddressConsulted::query()->findOrFail($request->address_id);
            $weather = Weather::query()->findOrFail($request->weather_id);

            if ($address->weathers()->detach($weather->id)) {
                return response()->json(['message' => 'Relacionamento excluído com sucesso!']);
            }

            return response()->json(['message' => 'Relacionamento não encontrado.'], 404);

        } catch (\Exception $error) {
            return response()->json([
                'message' => 'Erro ao excluir o relacionamento.',
                'error' => $error->getMessage()
            ], 500);
        }
    }
}
