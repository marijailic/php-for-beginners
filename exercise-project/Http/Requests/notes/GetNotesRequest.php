<?php

namespace Http\Requests\notes;

use Http\Requests\BasicRequest;
use Core\Session;

class GetNotesRequest extends BasicRequest
{
    protected function bindDataToValidate(): void
    {
        $this->data = [
            'userId' => Session::getCurrentUserId(),
        ];
    }

    protected function bindRulesForValidation(): void
    {
        $this->rules = [
            'userId' => ['required' => [], 'number' => []],
        ];
    }
}