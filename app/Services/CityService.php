<?php

namespace App\Services;

use App\Models\City;
use App\Repositories\CityRepository;
use Illuminate\Support\Collection;

class CityService
{
    public function __construct(
        private readonly CityRepository $cityRepository
    ) {
    }

    /**
     * @return Collection<int, City>
     */
    public function getAllCity(): Collection
    {
        return $this->cityRepository->getAllCity();
    }

}
