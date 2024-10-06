<?php
// TODO

namespace Http\Requests;

use Core\Validator;

class RequestValidator extends Validator
{
    private array $data;
    private array $rules;
    public array $errors;

    public function __construct($requestData)
    {
        $this->data = $requestData;
        $this->getRulesByData();
        $this->validateDataByRules();
    }

    private function getRulesByData(): void
    {
        $rulesByRequest = RequestValidationRules::rules;
        $dataKeys = array_keys($this->data);

        foreach ($rulesByRequest as $requestType => $rules) {
            $ruleKeys = array_keys($rules);
            if ($dataKeys == $ruleKeys) {
                $this->rules = $rules;
                break;
            }
        }
    }

    private function validateDataByRules(): void
    {
        foreach ($this->rules as $field => $fieldRules) {
            $value = $this->data[$field] ?? null;

            foreach ($fieldRules as $rule => $params) {
                if ($this->isInvalidRule($rule, $value, $params)) {
                    $this->addError($field, $this->generateErrorMessage($rule, $field, $params), Response::BAD_REQUEST);
                    break;
                }
            }
        }
    }

    private function isInvalidRule(string $rule, $value, $params): bool
    {
        if (method_exists(Validator::class, $rule)) {
            return !call_user_func_array([Validator::class, $rule], array_merge([$value], (array) $params));
        }
        return false;
    }

    private function addError(string $field, string $message, int $status): void
    {
        $this->errors[$field] = [
            'message' => $message,
            'status' => $status
        ];
    }

    private function generateErrorMessage(string $rule, string $field, array $params = []): string
    {
        $errorMessages = RequestValidationErrors::errors;
        $message = $errorMessages[$rule] ?? $errorMessages['invalid'];

        $min = $params[0] ?? 1;
        $max = $params[1] ?? INF;
        $replacements = [
            ':field' => ucfirst($field),
            ':min' => $min,
            ':max' => $max,
        ];

        return strtr($message, $replacements);
    }
}