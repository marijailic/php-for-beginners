<?php

namespace Http\Requests\notes;

use Core\Response;
use Core\Session;
use Core\Validator;
use Http\Requests\BasicRequest;

class StoreNotesRequest extends BasicRequest
{
    protected string $body;
    protected int $userId;

    protected array $errors = [];

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
        if(is_null($this->body)) {
            $this->errors['body'] = [
                'message' => "Note body is required.",
                'status'  => Response::BAD_REQUEST
            ];
            return;
        }

        if(!Validator::string($_POST['body'],1,1000)) {
            $this->errors['body'] = [
                'message' => "A body of no more than 1000 characters is required.",
                'status'  => Response::BAD_REQUEST
            ];
            return;
        }

        if(is_null($this->userId)) {
            $this->errors['userId'] = [
                'message' => "User id is required.",
                'status'  => Response::BAD_REQUEST
            ];
            return;
        }

        if(!Validator::number($this->userId)) {
            $this->errors['userId'] = [
                'message' => "User id must be a number.",
                'status'  => Response::BAD_REQUEST
            ];
        }
    }
}