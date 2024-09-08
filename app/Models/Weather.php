<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Weather.
 *
 * @property int $id
 * @property string $country
 * @property string $region
 * @property string $lat
 * @property string $lon
 * @property string $timezone_id
 * @property string $localtime
 * @property int $localtime_epoch
 * @property string $utc_offset
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * Eloquent Relationships
 * @property Collection|AddressConsulted[] $addresses
 * @property Collection|WeatherCurrent[] $weatherCurrent
 */
class Weather extends Model
{
    protected $table = 'weather';

    protected $fillable = [
        'name',
        'country',
        'region',
        'lat',
        'lon',
        'timezone_id',
        'localtime',
        'localtime_epoch',
        'utc_offset',
    ];

    /**
     * Relacionamento de muitos para muitos com AddressConsulted.
     * Um registro de clima pode estar associado a muitos endereços.
     */
    public function addresses(): BelongsToMany
    {
        return $this->belongsToMany(AddressConsulted::class, 'address_weather', 'weather_id', 'address_id')
            ->using(AddressWeather::class)
            ->withTimestamps();
    }

    /**
     * Relacionamento um-para-muitos com WeatherCurrent.
     * Um registro de clima pode ter várias informações de clima atual.
     */
    public function weatherCurrent(): HasOne
    {
        return $this->hasOne(WeatherCurrent::class);
    }
}
