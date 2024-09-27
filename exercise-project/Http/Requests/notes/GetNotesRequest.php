<?php

namespace Http\Requests\notes;

use Http\Requests\BasicRequest;
use Core\Session;

class GetNotesRequest extends BasicRequest
{
//    TODO
//    protected int $userId;
    protected $userId;

    public function process()
    {
        $this->userId = Session::getCurrentUserId();

        if (!$this->validate()) {
            return [
                'data' => [
                    'userId' => $this->userId,
                ],
                'errors' => $this->errors
            ];
        }

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
            ['userId' => $this->userId],
            ['userId' => 'number']
        );

        return !$this->failed();
    }
}