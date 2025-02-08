<?php

namespace Faker\Provider\pt_PT;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    /**
     * Phone country code.
     */
    public const COUNTRY_CODE = '+351';

    /**
     * Mobile Service Codes
     */
    public const MOBILE_SERVICE_CODE = [
        91,
        92,
        93,
        96,
    ];

    /**
     * Geographic Area Codes
     */
    public const AREA_CODE = [
        21,
        22,
        23,
        24,
        25,
        26,
        27,
        28,
        29,
    ];

    /**
     * Geographic Area and Mobile Service Codes
     */
    public const AREA_AND_MOBILE_SERVICE_CODE = [
        ...self::AREA_CODE,
        ...self::MOBILE_SERVICE_CODE,
    ];

    /**
     * @see http://en.wikipedia.org/wiki/Telephone_numbers_in_Portugal
     */
    protected static $formats = [
        '{{countryCode}} {{areaAndMobileServiceCode}}#######',
        '{{mobileServiceCode}}#######',
        '{{areaCode}}#######',
    ];

    protected static $e164Formats = [
        '{{countryCode}}{{areaAndMobileServiceCode}}#######',
    ];

    protected static $e164MobileFormat = [
        '{{countryCode}}{{mobileServiceCode}}#######',
    ];

    protected static $e164LandlineFormat = [
        '{{countryCode}}{{areaCode}}#######',
    ];

    protected static $mobileNumberPrefixes = [
        '91#######',
        '92#######',
        '93#######',
        '96#######',
    ];

    public static function mobileNumber()
    {
        return static::numerify(static::randomElement(static::$mobileNumberPrefixes));
    }

    public static function areaAndMobileServiceCode()
    {
        return static::randomElement(self::AREA_AND_MOBILE_SERVICE_CODE);
    }

    public static function areaCode()
    {
        return static::randomElement(self::AREA_CODE);
    }

    public static function mobileServiceCode()
    {
        return static::randomElement(self::MOBILE_SERVICE_CODE);
    }

    /**
     * Returns the phone country code.
     *
     * @return string
     */
    public static function countryCode()
    {
        return self::COUNTRY_CODE;
    }

    /**
     * Returns a mobile number in E.164 format.
     *
     * Example: +35193XXXXXXX
     *
     * @return string
     */
    public function e164MobileNumber()
    {
        return static::numerify($this->generator->parse(static::randomElement(static::$e164MobileFormat)));
    }

    /**
     * Returns a landline number in E.164 format.
     *
     * Example: +35121XXXXXXX
     *
     * @return string
     */
    public function e164LandlineNumber()
    {
        return static::numerify($this->generator->parse(static::randomElement(static::$e164LandlineFormat)));
    }
}
