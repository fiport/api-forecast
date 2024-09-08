<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * Class AddressConsulted
 *
 * Representa a tabela de endereços consultados.
 *
 * @property int $id O ID do registro
 * @property string $cep O código postal do endereço
 * @property string|null $logradouro O logradouro do endereço (opcional)
 * @property string|null $complemento O complemento do endereço (opcional)
 * @property string|null $unidade A unidade do endereço (opcional)
 * @property string|null $bairro O bairro do endereço (opcional)
 * @property string|null $localidade A localidade (cidade) do endereço (opcional)
 * @property string|null $uf A unidade federativa (estado) do endereço (opcional)
 * @property string|null $estado O nome do estado do endereço (opcional)
 * @property string|null $regiao A região do endereço (opcional)
 * @property string|null $ibge O código IBGE do endereço (opcional)
 * @property string|null $gia O código GIA do endereço (opcional)
 * @property string|null $ddd O código DDD do endereço (opcional)
 * @property string|null $siafi O código SIAFI do endereço (opcional)
 * @property Carbon|null $created_at Timestamp de criação do registro
 * @property Carbon|null $updated_at Timestamp de atualização do registro
 *
 * Eloquent Relationships
 * @property Collection|Weather[] $weathers Muitos para muitos com a tabela Weather
 */
class AddressConsulted extends Model
{
    protected $table = 'addresses_consulted';

    protected $fillable = [
        'cep',
        'logradouro',
        'complemento',
        'unidade',
        'bairro',
        'localidade',
        'uf',
        'estado',
        'regiao',
        'ibge',
        'gia',
        'ddd',
        'siafi',
    ];

    /**
     * Relacionamento de muitos para muitos com Weather.
     * Um endereço consultado pode estar associado a várias entradas de clima.
     */
    public function weathers(): BelongsToMany
    {
        return $this->belongsToMany(Weather::class, 'address_weather', 'address_id', 'weather_id')
            ->using(AddressWeather::class)
            ->withTimestamps();
    }
}
