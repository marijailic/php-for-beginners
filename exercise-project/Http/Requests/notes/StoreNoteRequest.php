<?php

namespace Http\Requests\notes;

use Http\Requests\BasicRequest;
use Core\Session;

class StoreNoteRequest extends BasicRequest
{
    protected function bindDataToValidate(): void
    {
        $this->data = [
            'body' => $_POST['body'],
            'userId' => Session::getCurrentUserId(),
        ];
    }

    protected function bindRulesForValidation(): void
    {
        $this->rules = [
            'body' => ['required' => [], 'string' => [1, 1000]],
            'userId' => ['required' => [], 'number' => []],
        ];
    }
}