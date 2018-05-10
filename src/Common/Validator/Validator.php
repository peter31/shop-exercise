<?php
namespace Common\Validator;

use Common\Validator\Strategy\AbstractValidationStrategy;

class Validator
{
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function validate(array $data)
    {
        $errors = [];
        foreach ($this->config as $field => $validatorStrategies) {
            foreach ($validatorStrategies as $strategy) {
                if (!$strategy instanceof AbstractValidationStrategy) {
                    throw new \RuntimeException('Wrong strategy given');
                }

                $fieldErrors = $strategy->execute($data, $field);

                if (is_array($fieldErrors) && count($fieldErrors)) {
                    $errors = array_merge($errors, $fieldErrors);
                }
            }
        }

        return $errors;
    }
}
