<?php

namespace Http\Requests\notes;

use Http\Requests\BasicAuthorizedRequest;
use Http\Repositories\NotesRepository;

class DestroyNoteRequest extends BasicAuthorizedRequest
{
    public function __construct()
    {
        $this->bindDataToValidate();
        $this->validateData();
        $this->getUserIdToAuthorize();
        $this->authorizeUser();
        $this->constructPayload();
    }

    protected function bindDataToValidate(): void
    {
        $this->data = ['id' => $_GET['id']];
    }

    protected function getUserIdToAuthorize(): void
    {
        $this->userIdToAuthorize = (new NotesRepository())->getById($this->data['id'])['user_id'];
    }
}