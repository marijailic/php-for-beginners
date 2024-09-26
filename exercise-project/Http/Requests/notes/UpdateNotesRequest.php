<?php

namespace Http\Requests\notes;

use Core\Response;
use Core\Validator;
use Http\Repositories\NotesRepository;
use Http\Requests\BasicRequest;

class UpdateNotesRequest extends BasicRequest
{
    protected array $note;
    protected int $id;
    protected string $body;

    protected array $errors = [];

    public function __construct($noteId){
        parent::__construct();
        $this->note = (new NotesRepository())->getById($noteId);
        $this->id = (int) $_POST['id'];
        $this->body = $_POST['body'];
    }

    public function process()
    {
        $this->authorize($this->note['user_id']);
        $this->validate();

        return [
            'data' => [
                'id' => $this->id,
                'body' => $this->body,
            ],
            'errors' => $this->errors
        ];
    }

    protected function validate()
    {
        if(is_null($this->id)) {
            $this->errors['id'] = [
                'message' => "Note id is required.",
                'status'  => Response::BAD_REQUEST
            ];
            return;
        }

        if(!Validator::number($this->id)) {
            $this->errors['id'] = [
                'message' => "Note id must be a number.",
                'status'  => Response::BAD_REQUEST
            ];
            return;
        }

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
        }
    }
}