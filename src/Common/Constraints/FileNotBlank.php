<?php
namespace Common\Constraints;

use Symfony\Component\Validator\Constraint;

class FileNotBlank extends Constraint
{
    public $message = 'File is not selected';
}
