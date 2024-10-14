<?php

namespace tests\Unit;

use PHPUnit\Framework\TestCase;
use Http\Requests\RequestValidator;

class RequestValidatorTest extends TestCase
{
    // for string
    public function testShouldReturnNoErrorsForStringThatFitsLengthLimitations(): void
    {
        $validator = new RequestValidator(['validString' => 'valid string'], ['validString' => ['string' => [1, 12]]]);

        self::assertEmpty($validator->errors);
    }

    public function testShouldReturnLengthErrorForStringThatIsTooLong(): void
    {
        $validator = new RequestValidator(['tooLongString' => 'long'], ['tooLongString' => ['string' => [1, 2]]]);

        self::assertEquals('TooLongString must be between 1 and 2 characters.', $validator->errors['tooLongString']['message']);
    }

    public function testShouldReturnLengthErrorForStringThatIsTooShort(): void
    {
        $validator = new RequestValidator(['tooShortString' => 'short'], ['tooShortString' => ['string' => [10, 100]]]);

        self::assertEquals('TooShortString must be between 10 and 100 characters.', $validator->errors['tooShortString']['message']);
    }

    // for email
    public function testShouldReturnNoErrorsForValidEmail(): void
    {
        $validator = new RequestValidator(['validEmail' => 'joedoe@example.com'], ['validEmail' => ['email' => []]]);

        self::assertEmpty($validator->errors);
    }

    public function testShouldReturnEmailErrorForInvalidEmail(): void
    {
        $validator = new RequestValidator(['invalidEmail' => 'joedoeexample.com'], ['invalidEmail' => ['email' => []]]);

        self::assertEquals('InvalidEmail must be a valid email address.', $validator->errors['invalidEmail']['message']);
    }

    // for number
    public function testShouldReturnNoErrorsForNumberThatFitsSizeLimitations(): void
    {
        $validator = new RequestValidator(['validNumber' => 2], ['validNumber' => ['number' => [1, 3]]]);

        self::assertEmpty($validator->errors);
    }

    public function testShouldReturnSizeErrorForNumberThatIsTooBig(): void
    {
        $validator = new RequestValidator(['tooBigNumber' => 11], ['tooBigNumber' => ['number' => [5, 10]]]);

        self::assertEquals('TooBigNumber must be between 5 and 10.', $validator->errors['tooBigNumber']['message']);
    }

    public function testShouldReturnSizeErrorForNumberThatIsTooSmall(): void
    {
        $validator = new RequestValidator(['tooSmallNumber' => 1], ['tooSmallNumber' => ['number' => [5, 10]]]);

        self::assertEquals('TooSmallNumber must be between 5 and 10.', $validator->errors['tooSmallNumber']['message']);
    }

    // for required
    public function testShouldReturnRequiredErrorForValueThatIsNull(): void
    {
        $validator = new RequestValidator(['nullValue' => null], ['nullValue' => ['required' => []]]);

        self::assertEquals('NullValue is required.', $validator->errors['nullValue']['message']);
    }

    public function testShouldReturnRequiredErrorForEmptyString(): void
    {
        $validator = new RequestValidator(['emptyString' => ''], ['emptyString' => ['required' => []]]);

        self::assertEquals('EmptyString is required.', $validator->errors['emptyString']['message']);
    }
}
