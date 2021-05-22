<?php

namespace App\Enums;

use ReflectionClass;

class BaseEnum
{
    /**
     * Get public proprities for DTO class
     *
     * @param string $className
     * @return array
     */
    static function getConstants()
    {
        // instaniate ReflectionClass for enum class
        $enumReflection = new ReflectionClass(get_called_class());

        // read current enum public constans
        $constants = $enumReflection->getConstants();

        // return array of names for all constants for current enum
        return $constants;
    }

    /**
     * Get all of values of exists constants
     * 
     * @return array
     */
    public static function getConstantsValues()
    {
        $constants = self::getConstants();
        return array_values($constants);
    }

    /**
     * Get value for specific constant
     * 
     * @param $value
     * @return string
     */
    public static function getConstantValue($value)
    {
        $constants = self::getConstants();
        return $constants[strtoupper($value)];
    }
}