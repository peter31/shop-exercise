<?php
namespace Common\Constraints;

use Symfony\Component\Validator\Constraint;

class FileExtension extends Constraint
{
    public $message;

    public $ext;

}
