<?php

namespace App\Http\Controllers;

use App\Services\FilterPhonesService;
use App\Services\FilterCountryService;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    /**
     * __constructor
     *
     * @param FilterPhonesService   $phoneService instance of filter phones service
     * @param FilterCountryService  $countryService instance of list countries service
     */
    public function __construct(
                                public FilterPhonesService $phoneService,
                                public FilterCountryService $countryService
                            ) {
        $this->phoneService = $phoneService;
        $this->countryService = $countryService;
    }

    /**
     * Get phone numbers list
     * 
     * @param Request $request
     */
    public function index(Request $request)
    {
        $filters = $request->only('country_id', 'valid_phones', 'page');

        $countries = $this->countryService->filterCountries();

        $phones = $this->phoneService->filterPhones($filters);

        return view('list-phones', compact('phones', 'countries', 'filters'));
    }
}
