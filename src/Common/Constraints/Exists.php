<?php
namespace Common\Constraints;

use Symfony\Component\Validator\Constraint;

class Exists extends Constraint
{
    public $message = 'Item with selected id does not exist';
    public $table;
    public $field;
}

