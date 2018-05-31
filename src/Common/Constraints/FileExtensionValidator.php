<?php
namespace Common\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;


class FileExtensionValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {

        var_dump($value);die;

        if (!$constraint instanceof FileExtension) {
            throw new UnexpectedTypeException($constraint, __NAMESPACE__.'\FileExtension');
        }

        if (null === $value || '' === $value) {
            return;
        }

        list(, $real_file_extension) = explode('.', $value['name']);

        if ($real_file_extension !== $constraint->ext) {
            $this->context->buildViolation(sprintf('File "%s" is not "%s" extension !', $value['name'], $constraint->ext))->addViolation();
//                $errors[] = sprintf('File "%s" is not "%s" extension !', $value['name'], $constraint->required_file_extension);
            }
        }
}
