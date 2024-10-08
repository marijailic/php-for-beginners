<?php

namespace Http\Requests\notes;

use Http\Requests\BasicAuthorizedRequest;
use Http\Repositories\NotesRepository;

class GetNoteRequest extends BasicAuthorizedRequest
{
    protected function bindDataToValidate(): void
    {
        $this->data = [
            'id' => $_GET['id'],
        ];
    }

    protected function bindRulesForValidation(): void
    {
        $this->rules = [
            'id' => ['required' => [], 'number' =>[]],
        ];
    }

    protected function bindUserIdToAuthorize(): void
    {
        $this->userIdToAuthorize = (new NotesRepository())->getById($this->data['id'])['user_id'];
    }
}