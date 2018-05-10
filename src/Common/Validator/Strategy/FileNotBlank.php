<?php
namespace Common\Validator\Strategy;


class FileNotBlank extends AbstractValidationStrategy
{
    public function execute(array $data, $field)
    {
        $errors = [];
        if (!array_key_exists($field, $data) || !$data[$field]['name']) {
            $errors[] = 'File is not selected !';
        }

        return $errors;
    }
}
