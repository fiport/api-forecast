<?php

namespace App\Http\Resources;

use App\Models\AddressConsulted;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin AddressConsulted */
class AddressConsultedResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'cep' => $this->cep,
            'logradouro' => $this->logradouro,
            'complemento' => $this->complemento,
            'bairro' => $this->bairro,
            'localidade' => $this->localidade,
            'uf' => $this->uf,
            'estado' => $this->estado,
            'regiao' => $this->regiao,
            'ibge' => $this->ibge,
            'weathers' => $this->weathers,
        ];
    }
}
