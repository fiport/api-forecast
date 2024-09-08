<?php

namespace App\Http\Controllers\Weather;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddressConsulted;
use App\Models\Weather;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class WeatherDeleteController extends Controller
{
    /**
     * @param int $id
     * @return JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        DB::beginTransaction();
        try {
            Weather::query()->findOrFail($id)->delete();

            DB::commit();

            return response()->json([
                'message' => 'Registro removido com sucesso'
            ]);

        } catch (\Exception $error) {
            DB::rollBack();

            return response()->json([
                'message' => 'Erro ao excluir Registro.',
                'error' => $error->getMessage()
            ], 500);
        }
    }
}
