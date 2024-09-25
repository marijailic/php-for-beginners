<?php

namespace Http\Requests\notes;

use Core\Validator;
use Http\Repositories\NotesRepository;
use Http\Requests\BasicRequest;

class UpdateNotesRequest extends BasicRequest
{
    protected $note;
    protected $id;
    protected $body;

    protected $errors = [];

    public function __construct($noteId){
        parent::__construct();
        $this->note = (new NotesRepository())->getById($noteId);
        $this->id = $_POST['id'];
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
        // TODO - validacija
        if (!Validator::string($this->body, 1, 1000)) {
            $this->errors['body'] = 'A body of no more than 1000 characters is required.';
        }
    }
}