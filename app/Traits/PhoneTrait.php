<?php 

namespace App\Traits;

use App\Enums\PhoneRegexEnum;
use App\Enums\PhoneStateEnum;

trait PhoneTrait
{
    /**
     * Check in phone number is valid depend on its country phone code
     * 
     * @param int|string $phoneNumber
     * @param int $countryCode
     * @return bool
     */
    public static function isValidPhone($phoneNumber, $countryCode)
    {
        if(! static::isValidCountryCode($countryCode)) {
            return false;
        }
        
        $countryPhoneRegex = PhoneRegexEnum::$countriesPhonesRegex[$countryCode];
        
        return preg_match($countryPhoneRegex, $phoneNumber) ? PhoneStateEnum::OK : PhoneStateEnum::NOK;
    }

    /**
     * Valid country phone code is already supported and predefined in @see App\Enums\PhoneRegexEnum
     * 
     * @param int $countryCode
     * @return bool
     */
    public static function isValidCountryCode($countryCode)
    {
        $supportedCountriesCodes = PhoneRegexEnum::getConstantsValues();

        return in_array($countryCode, $supportedCountriesCodes);
    }
}
