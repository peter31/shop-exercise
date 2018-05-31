<?php
namespace Common\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;


class FileExtensionValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {

        if (!$constraint instanceof FileExtension) {
            throw new UnexpectedTypeException($constraint, __NAMESPACE__.'\FileExtension');
        }

        list(, $real_file_extension) = explode('.', $value['name']);

        if ($real_file_extension !== $constraint->required_file_extension) {
            $this->context->buildViolation($constraint->message)->addViolation();
//                $errors[] = sprintf('File "%s" is not "%s" extension !', $value['name'], $constraint->required_file_extension);
            }
        }
}
