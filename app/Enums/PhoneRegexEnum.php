<?php

namespace App\Enums;

class PhoneRegexEnum extends BaseEnum
{
    const CAMEROON   = 237;
    const ETHIOPIA   = 251;
    const MOROCCO    = 212;
    const MOZAMBIQUE = 258;
    const UGANDA     = 256;

    public static $countriesPhonesRegex = [
        self::CAMEROON   => '/[2368]\d{7,8}$/',
        self::ETHIOPIA   => '/[1-59]\d{8}$/',
        self::MOROCCO    => '/[5-9]\d{8}$/',
        self::MOZAMBIQUE => '/[28]\d{7,8}$/',
        self::UGANDA     => '/\d{9}$/'
    ];
}
