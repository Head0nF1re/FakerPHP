<?php

namespace Faker\Provider\pt_PT;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    /**
     * Returns the pt_PT phone country code.
     */
    const COUNTRY_CODE = '+351';

    /**
     * pt_PT Mobile Service Codes
     */
    protected static $mobileServiceCode = [
        91,
        92,
        93,
        96,
    ];

    /**
     * pt_PT Geographic Area Codes
     */
    protected static $areaCode = [
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
     * pt_PT Geographic Area and Mobile Service Codes
     */
    protected static $areaOrMobileServiceCode = [
        91,
        92,
        93,
        96,
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
     * @see http://en.wikipedia.org/wiki/Telephone_numbers_in_Portugal
     */
    protected static $formats = [
        '{{countryCode}} {{areaOrMobileServiceCode}}#######',
        '{{mobileServiceCode}}#######',
        '{{areaCode}}#######',
    ];

    protected static $e164Formats = [
        '{{countryCode}}{{areaOrMobileServiceCode}}#######',
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

    public static function areaOrMobileServiceCode()
    {
        return self::randomElement(static::$areaOrMobileServiceCode);
    }

    public static function areaCode()
    {
        return self::randomElement(static::$areaCode);
    }

    public static function mobileServiceCode()
    {
        return self::randomElement(static::$mobileServiceCode);
    }

    /**
     * Returns the pt_PT phone country code.
     *
     * @return string
     */
    public static function countryCode()
    {
        return self::COUNTRY_CODE;
    }

    /**
     * Returns a pt_PT mobile number in E.164 format.
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
     * Returns a pt_PT landline number in E.164 format.
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
