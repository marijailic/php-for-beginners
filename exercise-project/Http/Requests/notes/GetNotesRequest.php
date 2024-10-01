<?php

namespace Http\Requests\notes;

use Http\Requests\BasicRequest;
use Core\Session;

class GetNotesRequest extends BasicRequest
{
    protected int $userId;

    public function process()
    {
        if (!$this->validate()) {
            return [
                'data' => [],
                'errors' => $this->errors
            ];
        }

        $this->userId = Session::getCurrentUserId();

        return [
            'data' => [
                'userId' => $this->userId,
            ],
            'errors' => []
        ];
    }

    protected function validate()
    {
        $this->validateData(
            ['userId' => Session::getCurrentUserId()],
            ['userId' => ['required', 'number']]
        );

        return !$this->failed();
    }
}