<?php

namespace App\Repositories;

use App\Models\Country;

class CountryRepository extends BaseRepository
{
    /**
     * __constructor
     *
     * @param Country $countryModel
     */
    public function __construct(Country $countryModel)
    {
        parent::__construct($countryModel);
    }
}
