<?php

namespace App\Http\Controllers\AddressWeather;

use App\Http\Controllers\Controller;
use App\Models\AddressConsulted;
use App\Models\Weather;
use App\Models\WeatherCurrent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressWeatherCreateController extends Controller
{
    /**
     * @var Request
     */
    private Request $request;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        DB::beginTransaction();

        try {
            $address = $this->createAddressInfo();

            $weather = $this->createWeatherInfo($address);

            DB::commit();

            return response()->json([
                'message' => 'Dados salvos com sucesso!',
                'address' => $address,
                'weather' => $weather,
            ], 201);
        } catch (\Throwable $exception) {
            DB::rollBack();

            return response()->json([
                'message' => 'Falha ao gravar dados!',
                'reason' => $exception->getMessage(),
            ], 500);
        }
    }

    /**
     * Cria as informações do endereço consultado.
     *
     * @return AddressConsulted
     */
    private function createAddressInfo(): AddressConsulted
    {
        $addressExists = $this->checkIfAddressExists();

        if ($addressExists) {
            return $addressExists;
        }

        return AddressConsulted::query()->create($this->request->get('address'));
    }

    /**
     * @return AddressConsulted|null
     */
    private function checkIfAddressExists(): ?AddressConsulted
    {
        return AddressConsulted::query()
            ->where('cep', $this->request->get('address')['cep'])
            ->first();
    }

    /**
     * Cria as informações do clima e associa o clima ao endereço na tabela pivot.
     *
     * @param AddressConsulted $address
     * @return Weather
     */
    private function createWeatherInfo(AddressConsulted $address): Weather
    {
        $dataWeather = $this->request->get('weather')['location'];

        $weather = Weather::query()->create($dataWeather);

        // Associa o clima ao endereço na tabela pivot
        $address->weathers()->attach($weather->id);

        $this->createWeatherCurrent($weather->id);

        return $weather;
    }

    /**
     * Cria as informações de clima atual.
     *
     * @param int $weatherId
     * @return void
     */
    private function createWeatherCurrent(int $weatherId): void
    {
        $dataWeatherCurrent = $this->request->get('weather')['current'];

        $dataWeatherCurrent['weather_icons'] = json_encode($dataWeatherCurrent['weather_icons']);
        $dataWeatherCurrent['weather_descriptions'] = json_encode($dataWeatherCurrent['weather_descriptions']);

        WeatherCurrent::query()->create(array_merge(
            $dataWeatherCurrent,
            ['weather_id' => $weatherId]
        ));
    }
}
