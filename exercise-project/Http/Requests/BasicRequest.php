<?php

namespace Http\Requests;

use Core\Response;
use Core\Validator;

class BasicRequest
{
    protected array $errors = [];

    public function validateData(array $data, array $rules)
    {
        foreach ($rules as $field => $rule) {
            if (!isset($data[$field])) {
                $this->errors[$field] = [
                    'message' => ucfirst($field) . ' is required.',
                    'status' => Response::BAD_REQUEST
                ];
            } elseif ($rule === 'number' && !Validator::number($data[$field])) {
                $this->errors[$field] = [
                    'message' => ucfirst($field) . ' must be a number.',
                    'status' => Response::BAD_REQUEST
                ];
            } elseif (is_array($rule) && $rule[0] === 'string') {
                if(!Validator::string($data[$field], $min = $rule[1] ?? 1, $max = $rule[2] ?? INF)) {
                    $this->errors[$field] = [
                        'message' => ucfirst($field) . " must be between $min and $max characters.",
                        'status' => Response::BAD_REQUEST
                    ];
                }
            }
        }
    }

    public function failed()
    {
        return !empty($this->errors);
    }
}