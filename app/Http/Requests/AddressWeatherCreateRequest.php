<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressWeatherCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'cep' => 'required|string|max:9',
            'logradouro' => 'nullable|string|max:100',
            'complemento' => 'nullable|string|max:100',
            'unidade' => 'nullable|string|max:100',
            'bairro' => 'nullable|string|max:100',
            'localidade' => 'nullable|string|max:100',
            'uf' => 'nullable|string|max:5',
            'estado' => 'nullable|string|max:100',
            'regiao' => 'nullable|string|max:15',
            'ibge' => 'nullable|string|max:15',
            'gia' => 'nullable|string|max:15',
            'ddd' => 'nullable|string|max:5',
            'siafi' => 'nullable|string|max:5',
            'Weather' => 'required|array',
            'Weather.name' => 'required|string|max:100',
            'Weather.country' => 'required|string|max:100',
            'Weather.region' => 'required|string|max:100',
            'Weather.lat' => 'required|string',
            'Weather.lon' => 'required|string',
            'Weather.timezone_id' => 'required|string',
            'Weather.localtime' => 'required|string',
            'Weather.localtime_epoch' => 'required|integer',
            'Weather.utc_offset' => 'required|string',
        ];
    }
}
