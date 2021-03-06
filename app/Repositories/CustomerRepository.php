<?php

namespace App\Repositories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class CustomerRepository extends BaseRepository
{
    /**
     * __constructor
     *
     * @param Customer $customerModel
     */
    public function __construct(Customer $customerModel)
    {
        parent::__construct($customerModel);
    }

    /**
     * Get phone list with its related country
     * 
     * @param array $filters
     * @param int   $perPage represent number of objects must returned per page
     * @return Collection
     */
    public function phonesList($filters = [])
    {
        $phonesQuery = $this->model
                        ->join("countries as c", function ($join) {
                            $join->on("phonecode", "=", DB::raw("SUBSTRING_INDEX(SUBSTRING(phone FROM 2), ')', 1)"));
                        })
                        ->selectRaw("c.id, c.name, phonecode, SUBSTRING_INDEX(phone, ' ', -1) as phone_number");

        if(isset($filters['country_id'])) {
            $phonesQuery->where('c.id', (int)$filters['country_id']);
        }

        return $phonesQuery->get();
    }
}
