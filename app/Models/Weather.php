<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $city_id
 * @property float $latitude
 * @property float $longitude
 * @property float $temperature
 * @property int $pressure
 * @property int $humidity
 * @property float $min_temperature
 * @property float $max_temperature
 * @property string $created_at
 * @property string $updated_at
 *
 * @property City $city
 */
class Weather extends Model
{
    protected $fillable = [
        'city_id',
        'latitude',
        'longitude',
        'temperature',
        'pressure',
        'humidity',
        'min_temperature',
        'max_temperature',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
