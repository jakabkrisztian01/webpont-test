<?php

namespace App\Repositories;

use App\Models\City;
use Illuminate\Support\Collection;

class CityRepository
{
    /**
     * @return Collection<int, City>
     */
    public function getAllCity(): Collection
    {
        return City::all();
    }

}
