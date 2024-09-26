<?php

namespace Http\Requests\notes;

use Core\Validator;
use Core\Response;
use Http\Repositories\NotesRepository;
use Http\Requests\BasicRequest;

class DestroyNotesRequest extends BasicRequest
{
    protected array $note;
    protected int $id;

    protected array $errors = [];

    public function __construct($noteId)
    {
        parent::__construct();
        $this->note = (new NotesRepository())->getById($noteId);
        $this->id = (int) $_GET['id'];
    }

    public function process()
    {
        $this->authorize($this->note['user_id']);
        $this->validate();

        return [
            'data' => [
                'id' => $this->id
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
        }
    }
}