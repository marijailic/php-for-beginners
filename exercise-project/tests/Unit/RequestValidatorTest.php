<?php

namespace tests\Unit;

use PHPUnit\Framework\TestCase;
use Http\Requests\RequestValidator;

// TODO

class RequestValidatorTest extends TestCase
{
    public function testShouldReturnErrorForInvalidEmail(): void
    {
        $validator = new RequestValidator(['email' => 'marijagmail.com'], ['email' => ['email' => []]]);

        self::assertEquals('Email must be a valid email address.', $validator->errors['email']['message']);
    }
}