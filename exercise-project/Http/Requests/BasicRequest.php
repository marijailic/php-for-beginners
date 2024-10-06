<?php
// TODO

namespace Http\Requests;

abstract class BasicRequest
{

    protected array $data;
    protected array $errors = [];
    public array $processedPayload;

    abstract protected function bindDataToValidate();

    protected function validateData(): void
    {
        $validationOutcome = new RequestValidator($this->data);
//        $this->errors = $validationOutcome->errors;
        $this->errors = [];
    }

    protected function constructPayload(): void
    {
        $this->processedPayload = [
            'data' => $this->data,
            'errors' => $this->errors
        ];
    }
}
