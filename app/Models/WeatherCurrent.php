<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * Class WeatherCurrent
 *
 * Representa a tabela de informações climáticas atuais.
 *
 * @property int $id O ID do registro
 * @property string $observation_time A hora da observação
 * @property int $temperature A temperatura em graus Celsius
 * @property int $weather_code O código de clima correspondente
 * @property string $weather_icons O ícone representando as condições climáticas
 * @property string $weather_descriptions A descrição textual das condições climáticas
 * @property int $wind_speed A velocidade do vento em km/h
 * @property int $wind_degree O grau da direção do vento
 * @property string $wind_dir A direção do vento (N, S, E, W, etc.)
 * @property int $pressure A pressão atmosférica em milibares
 * @property int $precip A quantidade de precipitação em mm
 * @property int $humidity O nível de umidade em %
 * @property int $cloudcover O nível de cobertura de nuvens em %
 * @property int $feelslike A sensação térmica
 * @property int $uv_index O índice UV
 * @property int $visibility A visibilidade em quilômetros
 * @property string $is_day Indica se é dia ou noite (day/night)
 * @property int $weather_id Chave estrangeira para a tabela Weather
 * @property Carbon|null $created_at Timestamp de criação do registro
 * @property Carbon|null $updated_at Timestamp de atualização do registro
 *
 * Eloquent Relationships
 * @property Weather $Weather O registro da tabela Weather associado a este clima atual
 */
class WeatherCurrent extends Model
{
    protected $table = 'weather_current';

    protected $fillable = [
        'observation_time',
        'temperature',
        'weather_code',
        'weather_icons',
        'weather_descriptions',
        'wind_speed',
        'wind_degree',
        'wind_dir',
        'pressure',
        'precip',
        'humidity',
        'cloudcover',
        'feelslike',
        'uv_index',
        'visibility',
        'is_day',
        'weather_id',
    ];

    /**
     * Relacionamento com Weather.
     * Cada registro de clima atual pertence a um único registro na tabela Weather.
     */
    public function weather(): BelongsTo
    {
        return $this->belongsTo(Weather::class);
    }
}
