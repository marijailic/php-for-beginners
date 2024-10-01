<?php

namespace Http\Requests\notes;

use Http\Requests\BasicAuthorizedRequest;
use Http\Repositories\NotesRepository;

class UpdateNoteRequest extends BasicAuthorizedRequest
{
    protected int $id;
    protected string $body;

    public function __construct()
    {
        parent::__construct();
    }

    public function process()
    {

        if (!$this->validate()) {
            return [
                'data' => [
                    'id' => $_POST['id'],
                    'body' => $_POST['body'],
                ],
                'errors' => $this->errors
            ];
        }

        $this->id = (int) $_POST['id'];
        $this->body = $_POST['body'];

        $noteUserId = (new NotesRepository())->getById($this->id)['user_id'];
        $this->authorize($noteUserId);

        return [
            'data' => [
                'id' => $this->id,
                'body' => $this->body,
            ],
            'errors' => []
        ];
    }

    protected function validate()
    {
        $this->validateData(
            ['id' => $_POST['id'], 'body' => $_POST['body']],
            ['id' => ['required', 'number'], 'body' => ['required', 'string' => [1, 1000]]]
        );

        return !$this->failed();
    }
}