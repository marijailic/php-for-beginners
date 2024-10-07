<?php

namespace Http\Requests\notes;

use Http\Requests\BasicAuthorizedRequest;
use Http\Repositories\NotesRepository;

class UpdateNoteRequest extends BasicAuthorizedRequest
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function bindDataToValidate(): void
    {
        $this->data = [
            'id' => $_POST['id'],
            'body' => $_POST['body'],
        ];
    }

    protected function bindRulesForValidation(): void
    {
        $this->rules = [
            'id' => ['required', 'number'],
            'body' => ['required', 'string' => [1, 1000]],
        ];
    }

    protected function bindUserIdToAuthorize(): void
    {
        $this->userIdToAuthorize = (new NotesRepository())->getById($this->data['id'])['user_id'];
    }
}