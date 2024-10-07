<?php

namespace Http\Requests;

abstract class BasicRequest
{

    protected array $data;
    protected array $rules;
    protected array $errors = [];
    public array $processedPayload;

    public function __construct()
    {
        $this->bindDataToValidate();
        $this->bindRulesForValidation();
        $this->validateData();
        $this->constructPayload();
    }

    abstract protected function bindDataToValidate();
    abstract protected function bindRulesForValidation();

    protected function validateData(): void
    {
        $validationOutcome = new RequestValidator($this->data, $this->rules);
        $this->errors = $validationOutcome->errors;
    }

    protected function constructPayload(): void
    {
        $this->processedPayload = [
            'data' => $this->data,
            'errors' => $this->errors
        ];
    }
}
