<?php
namespace Common\Validator\Strategy;

use Common\DB;

class Exists extends AbstractValidationStrategy
{
    /** @var string */
    private $table;

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function execute(array $data, $field)
    {
        $errors = [];
        if (isset($data[$field]) && $data[$field]) {
            $sql = sprintf('SELECT * FROM %s WHERE %s = "%s"', $this->table, $field, $data[$field]);
            $query = DB::connect()->query($sql);

            if ($query->num_rows === 0) {
                $errors[] = sprintf('Item with id %d does not exist', $data[$field]);
            }
        }

        return $errors;
    }
}
