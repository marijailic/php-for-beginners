<?php

namespace Http\Requests\notes;

use Http\Requests\BasicRequest;
use Core\Session;

class GetNotesRequest extends BasicRequest
{
    public function __construct()
    {
        $this->bindDataToValidate();
        $this->validateData();
        $this->constructPayload();

    }

    protected function bindDataToValidate(): void
    {
        $this->data = ['userId' => Session::getCurrentUserId()];
    }
}