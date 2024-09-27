<?php

namespace Http\Requests\notes;

use Core\Session;
use Http\Requests\BasicRequest;

class StoreNotesRequest extends BasicRequest
{
//    TODO
//    protected string $body;
//    protected int $userId;
    protected $body;
    protected $userId;

    public function process()
    {
        $this->body = $_POST['body'];
        $this->userId = Session::getCurrentUserId();

        if (!$this->validate()) {
            return [
                'data' => [
                    'body' => $this->body,
                    'userId' => $this->userId,
                ],
                'errors' => $this->errors
            ];
        }

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
            ['body' => $this->body, 'userId' => $this->userId],
            ['body' => ['string', 1, 1000], 'userId' => 'number']
        );

        return !$this->failed();
    }
}