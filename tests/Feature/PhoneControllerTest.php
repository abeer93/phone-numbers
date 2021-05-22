<?php

namespace Tests\Feature;

use App\Enums\PhoneRegexEnum;
use App\Enums\PhoneStateEnum;
use App\Models\Country;
use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class PhoneControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('migrate');
        Artisan::call('db:seed');
    }
    
    public function testListPhoneNumbersWillReturnPaginatedData()
    {
        $response = $this->get('/');
        $responseData = $response->getOriginalContent()->getData();

        $response->assertStatus(200);
        $response->assertViewHas('countries');
        $response->assertViewHas('phones');
        $response->assertViewHas('filters');
        $this->assertCount(15, $responseData['phones']->getCollection());
    }

    public function testListPhoneNumbersWithFilteringByCountryWillReturnDataSuccessfully()
    {
        $data = $this->getCountryAnditsRelatedPhones(PhoneRegexEnum::CAMEROON);

        $response = $this->get('/?country_id=' . $data['country']->id);
        $responseData = $response->getOriginalContent()->getData();

        $response->assertStatus(200);
        $response->assertViewHas('phones');
        $this->assertCount(count($data['phones']), $responseData['phones']->getCollection());
    }

    public function testListPhoneNumbersWithFilteringByCountryAndValidPhonesWillReturnDataSuccessfully()
    {
        $data = $this->getCountryAnditsRelatedPhones(PhoneRegexEnum::CAMEROON);
        $getValidPhones = $this->filterPhones($data['phones'], PhoneRegexEnum::$countriesPhonesRegex[PhoneRegexEnum::CAMEROON], PhoneStateEnum::OK);

        $response = $this->get('/?valid_phones=ok&country_id=' . $data['country']->id);
        $responseData = $response->getOriginalContent()->getData();

        $response->assertStatus(200);
        $response->assertViewHas('phones');
        $this->assertCount(count($getValidPhones), $responseData['phones']->getCollection());
    }

    public function testListPhoneNumbersWithFilteringByCountryAndInvalidPhonesWillReturnDataSuccessfully()
    {
        $data = $this->getCountryAnditsRelatedPhones(PhoneRegexEnum::CAMEROON);
        $getValidPhones = $this->filterPhones($data['phones'], PhoneRegexEnum::$countriesPhonesRegex[PhoneRegexEnum::CAMEROON], PhoneStateEnum::NOK);

        $response = $this->get('/?valid_phones=nok&country_id=' . $data['country']->id);
        $responseData = $response->getOriginalContent()->getData();

        $response->assertStatus(200);
        $this->assertCount(count($getValidPhones), $responseData['phones']->getCollection());
    }

    private function getCountryAnditsRelatedPhones($countryCode)
    {
        $country = Country::where('phonecode', $countryCode)->first();
        $countryPhones = Customer::whereRaw("SUBSTRING_INDEX(SUBSTRING(phone FROM 2), ')', 1) = " . $countryCode)->selectRaw("SUBSTRING_INDEX(phone, ' ', -1) as phone_number")->get();
        return [
            'country' => $country,
            'phones' => $countryPhones,
        ];
    }

    private function filterPhones($phones, $phoneRegex, $valid)
    {
        $phones = $phones->map(function ($phone) use($phoneRegex) {
            $phone->state = preg_match($phoneRegex, $phone->phone_number) ? PhoneStateEnum::OK : PhoneStateEnum::NOK;
            return $phone;
        });

        return $phones->where('state', $valid)->values();
    }
}
