<?php
namespace Common\Constraints;

use Symfony\Component\Validator\Constraint;

class Unique extends Constraint
{
    public $message;
    public $table;
    public $field;
}