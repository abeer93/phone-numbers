<?php

namespace App\Services;

use App\Repositories\CountryRepository;

class FilterCountryService 
{
    /**
     * __constructor
     *
     * @param CountryRepository $countryRepo instance of country repository
     */
    public function __construct(public CountryRepository $countryRepo)
    {
        $this->countryRepo = $countryRepo;
    }

    /**
     * Filter countries
     * 
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function filterCountries($filters = [])
    {
        $fixedNames = ['Cameroon', 'Ethiopia', 'Morocco', 'Mozambique', 'Uganda'];
        return $this->countryRepo->whereIn('name', $fixedNames)->get();
    }
}
