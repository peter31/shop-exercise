<?php
namespace Common\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

use Common\DB;

class ExistsValidator extends ConstraintValidator
{
    private $table;

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function validate($value, Constraint $constraint)
    {
        if (isset($value) && $value) {
            $sql = sprintf('SELECT * FROM %s WHERE %s = "%s"', $this->table, $value, $value['id']);
            $query = DB::connect()->query($sql);

            if (0 === $query->num_rows) {
                $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $this->formatValue($value))
                ->setCode(Exists::IS_BLANK_ERROR)
                ->addViolation();
            }
        }
    }
}
