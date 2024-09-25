<?php

namespace Http\Requests\notes;

use Http\Repositories\NotesRepository;
use Http\Requests\BasicRequest;

class DestroyNotesRequest extends BasicRequest
{
    protected $note;
    protected $id;

    protected $errors = [];

    public function __construct($noteId)
    {
        parent::__construct();
        $this->note = (new NotesRepository())->getById($noteId);
        $this->id = $_GET['id'];
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
        // TODO - validacija
    }
}