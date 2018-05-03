<?php
namespace Common\Validator\Strategy;

abstract class AbstractValidationStrategy
{
    abstract public function execute(array $data, $field);
}
