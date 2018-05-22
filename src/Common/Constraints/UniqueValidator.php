<?php
namespace Common\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

use Common\DB;

class UniqueValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof Unique) {
            throw new UnexpectedTypeException($constraint, __NAMESPACE__.'\Unique');
        }

        if (!$constraint->table || !$constraint->field) {
            throw new \RuntimeException('Wrong Unique validator configuration');
        }

        if (isset($value) && $value) {
            $sql = sprintf('SELECT * FROM %s WHERE %s = "%s"', $constraint->table, $constraint->field, $value);
            $query = DB::connect()->query($sql);

            if (0 !== $query->num_rows) {
                $this->context->buildViolation($constraint->message)->addViolation();
            }
        }
    }
}
