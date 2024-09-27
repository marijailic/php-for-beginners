<?php

namespace Http\Requests\notes;

use Http\Requests\BasicAuthorizedRequest;
use Http\Repositories\NotesRepository;

class UpdateNotesRequest extends BasicAuthorizedRequest
{
//    TODO
//    protected int $id;
//    protected string $body;
    protected $id;
    protected $body;

    public function __construct()
    {
        parent::__construct();
    }

    public function process()
    {
//        TODO
//        $this->id = (int) $_POST['id'];
        $this->id = $_POST['id'];
        $this->body = $_POST['body'];

        if (!$this->validate()) {
            return [
                'data' => [
                    'id' => $this->id,
                    'body' => $this->body,
                ],
                'errors' => $this->errors
            ];
        }


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
            ['id' => $this->id, 'body' => $this->body],
            ['id' => 'number', 'body' => ['string', 1, 1000]]
        );

        return !$this->failed();
    }
}