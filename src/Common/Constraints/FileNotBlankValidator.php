<?php
namespace Common\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;


class FileNotBlankValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof FileNotBlank) {
            throw new UnexpectedTypeException($constraint, __NAMESPACE__ . '\FileNotBlank');
        }

        if (!isset($value) || !$value['name']) {
            $this->context->buildViolation($constraint->message)->addViolation();
        }
    }
}
