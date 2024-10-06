<?php

namespace Http\Requests;

class RequestValidationRules
{
    const rules = [
        'GetNotesRequest' => ['userId' => ['required', 'number']],
        'GetNoteRequest' => ['id' => ['required', 'number']],
        'StoreNoteRequest' => ['body' => ['required', 'string' => [1, 1000]], 'userId' => ['required', 'number']],
        'DestroyNoteRequest' => ['id' => ['required', 'number']],
        'UpdateNoteRequest' => ['id' => ['required', 'number'], 'body' => ['required', 'string' => [1, 1000]]],
        'StoreUserRequest' => ['email' => ['required', 'email'], 'password' => ['required', 'string' => [7, 255]]],
    ];
}
