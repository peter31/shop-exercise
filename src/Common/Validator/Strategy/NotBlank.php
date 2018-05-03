<?php
namespace Common\Validator\Strategy;

class NotBlank extends AbstractValidationStrategy
{
    public function execute(array $data, $field)
    {
        $errors = [];
        if (!isset($data[$field]) || !$data[$field]) {
            $errors[] = sprintf('Field %s is required to fill', $field);
        }

        return $errors;
    }
}
