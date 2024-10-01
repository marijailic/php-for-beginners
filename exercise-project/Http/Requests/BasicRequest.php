<?php

namespace Http\Requests;

use Core\Response;
use Core\Validator;

class BasicRequest
{
    protected array $errors = [];

    public function validateData(array $data, array $rules)
    {
        foreach ($rules as $field => $fieldRules) {
            if (in_array('required', $fieldRules) && !isset($data[$field])) {
                $this->errors[$field] = [
                    'message' => ucfirst($field) . ' is required.',
                    'status' => Response::BAD_REQUEST
                ];
            } elseif (in_array('number', $fieldRules) && !Validator::number($data[$field])) {
                $this->errors[$field] = [
                    'message' => ucfirst($field) . ' must be a number.',
                    'status' => Response::BAD_REQUEST
                ];
            } elseif (array_key_exists('string', $fieldRules)
                && !Validator::string(
                    $data[$field],
                    $min = $fieldRules['string'][0] ?? 1,
                    $max = $fieldRules['string'][1] ?? INF
                )
            ) {
                    $this->errors[$field] = [
                        'message' => ucfirst($field) . " must be between $min and $max characters.",
                        'status' => Response::BAD_REQUEST
                    ];
            } elseif (in_array('email', $fieldRules) && !Validator::email($data[$field])) {
                $this->errors[$field] = [
                    'message' => ucfirst($field) . ' must be a valid email address.',
                    'status' => Response::BAD_REQUEST
                ];
            }
        }
    }

    public function failed()
    {
        return !empty($this->errors);
    }
}