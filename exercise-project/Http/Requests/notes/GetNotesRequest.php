<?php

namespace Http\Requests\notes;

use Http\Requests\BasicRequest;
use Core\Session;

class GetNotesRequest extends BasicRequest
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function bindDataToValidate(): void
    {
        $this->data = [
            'userId' => Session::getCurrentUserId(),
        ];
    }

    protected function bindRulesForValidation(): void
    {
        $this->rules = [
            'userId' => ['required', 'number'],
        ];
    }
}