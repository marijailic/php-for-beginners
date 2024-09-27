<?php

namespace Http\Requests\notes;

use Http\Requests\BasicAuthorizedRequest;
use Http\Repositories\NotesRepository;

class DestroyNoteRequest extends BasicAuthorizedRequest
{
//    TODO
//    protected int $id;
    protected $id;

    public function __construct()
    {
        parent::__construct();
    }

    public function process()
    {
//        TODO
//        $this->id = (int) $_GET['id'];
        $this->id = $_GET['id'];

        if (!$this->validate()) {
            return [
                'data' => [],
                'errors' => $this->errors
            ];
        }

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
            ['id' => $this->id],
            ['id' => 'number']
        );

        return !$this->failed();
    }
}