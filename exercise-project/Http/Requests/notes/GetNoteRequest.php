<?php

namespace Http\Requests\notes;

use Http\Requests\BasicAuthorizedRequest;
use Http\Repositories\NotesRepository;

class GetNoteRequest extends BasicAuthorizedRequest
{
    protected int $id;

    public function __construct()
    {
        parent::__construct();
    }

    public function process()
    {

        if (!$this->validate()) {
            return [
                'data' => [],
                'errors' => $this->errors
            ];
        }

        $this->id = (int) $_GET['id'];

        $noteUserId = (new NotesRepository())->getById($this->id)['user_id'];
        $this->authorize($noteUserId);

        return [
            'data' => [
                'id' => $this->id
            ],
            'errors' => []
        ];
    }

    protected function validate()
    {
        $this->validateData(
            ['id' => $_GET['id']],
            ['id' => ['required', 'number']]
        );

        return !$this->failed();
    }
}