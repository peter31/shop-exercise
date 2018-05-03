<?php
namespace Common\Validator\Strategy;

use Common\DB;

class EmailFormat extends AbstractValidationStrategy
{
    public function execute(array $data, $field)
    {
        $errors = [];
        if (isset($data[$field]) && $data[$field]) {
            if (filter_var($data[$field], FILTER_VALIDATE_EMAIL) === false) {
                $errors[] = sprintf('Given not valid email address in field "%s"', $field);
            }
        }

        return $errors;
    }
}
