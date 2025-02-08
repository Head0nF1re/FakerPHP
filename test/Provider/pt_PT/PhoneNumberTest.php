<?php

declare(strict_types=1);

namespace Faker\Test\Provider\pt_PT;

use Faker\Provider\pt_PT\PhoneNumber;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class PhoneNumberTest extends TestCase
{
    public function testPhoneNumberReturnsPhoneNumberWithOrWithoutPrefix(): void
    {
        self::assertMatchesRegularExpression('/^(?:\+351 )?(?:9[1,2,3,6][0-9]{7}|2[1-9][0-9]{7})$/', $this->faker->phoneNumber());
    }

    public function testMobileNumberReturnsMobileNumberWithoutPrefix(): void
    {
        self::assertMatchesRegularExpression('/^(9[1,2,3,6][0-9]{7})/', $this->faker->mobileNumber());
    }

    public function testE164PhoneNumberReturnsE164MobileOrLandlineNumber(): void
    {
        self::assertMatchesRegularExpression('/^\+351(?:9[1,2,3,6][0-9]{7}|2[1-9][0-9]{7})$/', $this->faker->e164PhoneNumber());
    }

    public function testE164MobileNumberReturnsE164MobileNumber(): void
    {
        self::assertMatchesRegularExpression('/^\+3519[1,2,3,6][0-9]{7}$/', $this->faker->e164MobileNumber());
    }

    public function testE164LandlineNumberReturnsE164LandlineNumber(): void
    {
        self::assertMatchesRegularExpression('/^\+3512[1-9][0-9]{7}$/', $this->faker->e164LandlineNumber());
    }

    protected function getProviders(): iterable
    {
        yield new PhoneNumber($this->faker);
    }
}
