<?php

namespace App\Services;

use App\Enums\PhoneStateEnum;
use App\Repositories\CustomerRepository;
use App\Traits\PhoneTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class FilterPhonesService 
{
    use PhoneTrait;

    /**
     * __constructor
     *
     * @param CustomerRepository $customerRepo instance of customer repository
     */
    public function __construct(public CustomerRepository $customerRepo)
    {}

    /**
     * Filter phone numbers list
     * 
     * @param array $filters
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function filterPhones($filters = [])
    {
        $phones = $this->customerRepo->phonesList($filters);

        if(isset($filters['valid_phones'])) {
            $phonesCollection =  $this->validatePhones($phones, $filters['valid_phones']);
        } else {
            $phonesCollection =  $this->validatePhones($phones);
        }

        return $this->paginateDatae($phonesCollection);
    }

    /**
     * Validate Phone numbers collection based on phone country code
     * 
     * @param Collection $phonesCollection
     * @param int $valid represent if user need to filter phones by valid or not valid
     */
    private function validatePhones($phonesCollection, $valid = null)
    {
        $phonesCollection = $phonesCollection->map(function ($phone) {
            $phone->state = static::isValidPhone($phone->phone_number, $phone->phonecode);
            return $phone;
        });

        if($valid && in_array($valid, PhoneStateEnum::getConstantsValues())) {
            $phonesCollection = $phonesCollection->where('state', $valid)->values();
        }

        return $phonesCollection;
    }

    /**
     * Paginate data
     * 
     * @param array|Collection $items
     * @param int              $perPage
     * @param int              $page
     *
     * @return LengthAwarePaginator
     */
    public function paginateDatae($items, $perPage = 15, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page);
    }
}
