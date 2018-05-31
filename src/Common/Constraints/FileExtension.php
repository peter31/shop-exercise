<?php
namespace Common\Constraints;

use Symfony\Component\Validator\Constraint;

class FileExtension extends Constraint
{
    public $message;

    public $required_file_extension;

    public function __construct($extension)
    {
        $this->required_file_extension = $extension;
    }
}
