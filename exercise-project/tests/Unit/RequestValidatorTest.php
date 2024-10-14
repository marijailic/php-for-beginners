<?php

namespace tests\Unit;

use PHPUnit\Framework\TestCase;
use Http\Requests\RequestValidator;

class RequestValidatorTest extends TestCase
{
    protected string $key;

    public function setUp(): void
    {
        $this->key = $this->getRandomKey(5);
    }

    // for string
    public function testShouldReturnNoErrorsForStringThatFitsLengthLimitations(): void
    {
        $validator = new RequestValidator([$this->key => 'valid string'], [$this->key => ['string' => [1, 12]]]);

        self::assertEmpty($validator->errors);
    }

    public function testShouldReturnLengthErrorForStringThatIsTooLong(): void
    {
        $validator = new RequestValidator([$this->key => 'long'], [$this->key => ['string' => [1, 2]]]);

        self::assertEquals(ucfirst($this->key) . ' must be between 1 and 2 characters.', $validator->errors[$this->key]['message']);
    }

    public function testShouldReturnLengthErrorForStringThatIsTooShort(): void
    {
        $validator = new RequestValidator([$this->key => 'short'], [$this->key => ['string' => [10, 100]]]);

        self::assertEquals(ucfirst($this->key) . ' must be between 10 and 100 characters.', $validator->errors[$this->key]['message']);
    }

    // for email
    public function testShouldReturnNoErrorsForValidEmail(): void
    {
        $validator = new RequestValidator([$this->key => 'joedoe@example.com'], [$this->key => ['email' => []]]);

        self::assertEmpty($validator->errors);
    }

    public function testShouldReturnEmailErrorForInvalidEmail(): void
    {
        $validator = new RequestValidator([$this->key => 'joedoeexample.com'], [$this->key => ['email' => []]]);

        self::assertEquals(ucfirst($this->key) . ' must be a valid email address.', $validator->errors[$this->key]['message']);
    }

    // for number
    public function testShouldReturnNoErrorsForNumberThatFitsSizeLimitations(): void
    {
        $validator = new RequestValidator([$this->key => 2], [$this->key => ['number' => [1, 3]]]);

        self::assertEmpty($validator->errors);
    }

    public function testShouldReturnSizeErrorForNumberThatIsTooBig(): void
    {
        $validator = new RequestValidator([$this->key => 11], [$this->key => ['number' => [5, 10]]]);

        self::assertEquals(ucfirst($this->key) . ' must be between 5 and 10.', $validator->errors[$this->key]['message']);
    }

    public function testShouldReturnSizeErrorForNumberThatIsTooSmall(): void
    {
        $validator = new RequestValidator([$this->key => 1], [$this->key => ['number' => [5, 10]]]);

        self::assertEquals(ucfirst($this->key) . ' must be between 5 and 10.', $validator->errors[$this->key]['message']);
    }

    // for required
    public function testShouldReturnRequiredErrorForValueThatIsNull(): void
    {
        $validator = new RequestValidator([$this->key => null], [$this->key => ['required' => []]]);

        self::assertEquals(ucfirst($this->key) . ' is required.', $validator->errors[$this->key]['message']);
    }

    public function testShouldReturnRequiredErrorForEmptyString(): void
    {
        $validator = new RequestValidator([$this->key => ''], [$this->key => ['required' => []]]);

        self::assertEquals(ucfirst($this->key) . ' is required.', $validator->errors[$this->key]['message']);
    }

    private function getRandomKey($length): string
    {
        // generate random string

        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomBytes = random_bytes($length);
        $randomString = '';

        var_dump($randomBytes);

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[ord($randomBytes[$i]) % $charactersLength];
        }

        return $randomString;
    }
}
