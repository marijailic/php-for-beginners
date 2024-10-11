<?php

namespace Http\Requests;

use Core\Validator;
use Core\Response;

class RequestValidator extends Validator
{
    private array $data;
    private array $rules;
    public array $errors = [];

    public function __construct($requestData, $requestRules)
    {
        $this->data = $requestData;
        $this->rules = $requestRules;
        $this->validateDataByRules();
    }

    private function validateDataByRules(): void
    {
        foreach ($this->rules as $fieldName => $fieldRules) {
            $value = $this->data[$fieldName];

            foreach ($fieldRules as $ruleName => $ruleParams) {

                if (!$this->isValid($ruleName, $value, $ruleParams)) {
                    $this->addError($fieldName, $this->generateErrorMessage($ruleName, $fieldName, $ruleParams));
                    break;
                }

            }
        }
    }

    private function isValid($rule, $value, $params): bool
    {
        if (!method_exists(Validator::class, $rule)) {
            return false;
        }
            $args = array_merge([$value], $params);
            return call_user_func_array([Validator::class, $rule], $args);
    }

    private function addError($field, $message): void
    {
        $this->errors[$field] = [
            'message' => $message,
            'status' => Response::BAD_REQUEST,
        ];
    }

    private function generateErrorMessage($rule, $field, $params): string
    {
        $errorMessages = RequestValidationErrors::ERRORS;
        $message = $errorMessages[$rule] ?? $errorMessages['invalid'];

        $replacements = [
            ':field' => ucfirst($field),
            ':min' => $params[0] ?? null,
            ':max' => $params[1] ?? null,
        ];

        return strtr($message, $replacements);
    }
}