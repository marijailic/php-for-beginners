<?php

namespace Http\Requests;

class RequestValidationErrors
{
    const errors = [
        'required' => ':field is required.',
        'string' => ':field must be between :min and :max characters.',
        'email' => ':field must be a valid email address.',
        'number' => ':field must be a number.',
    ];
}
