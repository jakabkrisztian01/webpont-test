<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property float $latitude
 * @property float $longitude
 * @property string $created_at
 * @property string $updated_at
 */
class City extends Model
{
    protected $fillable = [
        'name',
        'latitude',
        'longitude',
    ];

}
