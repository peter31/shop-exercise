<?php
namespace Common\Constraints;

use Symfony\Component\Validator\Constraint;

class Exists extends Constraint
{
    public $message;
    public $table;
    public $field;
}

