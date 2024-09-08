<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Class AddressWeather
 *
 * Representa a tabela pivot entre `AddressConsulted` e `Weather`.
 *
 * @property int $address_id Chave estrangeira para a tabela AddressConsulted
 * @property int $weather_id Chave estrangeira para a tabela Weather
 *
 * Eloquent Relationships
 * @property AddressConsulted $address O endereço associado
 * @property Weather $Weather O clima associado
 */
class AddressWeather extends Pivot
{
    protected $table = 'address_weather';

    protected $fillable = [
        'address_id',
        'weather_id',
    ];

    /**
     * @return BelongsTo
     */
    public function address(): BelongsTo
    {
        return $this->belongsTo(AddressConsulted::class);
    }

    /**
     * @return BelongsTo
     */
    public function weather(): BelongsTo
    {
        return $this->belongsTo(Weather::class);
    }
}
