<?php

namespace Http\Requests\notes;

use Core\Session;
use Core\Validator;
use Http\Requests\BasicRequest;

class StoreNotesRequest extends BasicRequest
{
    protected $body;
    protected $userId;

    protected $errors = [];

    public function __construct()
    {
        parent::__construct();
        $this->body = $_POST['body'];
        $this->userId = Session::getCurrentUserId();
    }

    public function process()
    {
        $this->validate();

        return [
            'data' => [
                'body' => $this->body,
                'userId' => $this->userId,
            ],
            'errors' => $this->errors
        ];
    }

    protected function validate()
    {
        // TODO - validacija
        if(!Validator::string($_POST['body'],1,1000)){
            $this->errors['body'] = 'A body of no more than 1000 characters is required.';
        }
    }
}