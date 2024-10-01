<?php

namespace Http\Requests\notes;

use Http\Requests\BasicRequest;
use Core\Session;

class StoreNoteRequest extends BasicRequest
{
    protected string $body;
    protected int $userId;

    public function process()
    {

        if (!$this->validate()) {
            return [
                'data' => [
                    'body' => $_POST['body'],
                    'userId' => Session::getCurrentUserId(),
                ],
                'errors' => $this->errors
            ];
        }

        $this->body = $_POST['body'];
        $this->userId = Session::getCurrentUserId();

        return [
            'data' => [
                'body' => $this->body,
                'userId' => $this->userId,
            ],
            'errors' => []
        ];
    }

    protected function validate()
    {
        $this->validateData(
            ['body' => $_POST['body'], 'userId' => Session::getCurrentUserId()],
            ['body' => ['required', 'string' => [1, 1000]], 'userId' => ['required', 'number']]
        );

        return !$this->failed();
    }
}