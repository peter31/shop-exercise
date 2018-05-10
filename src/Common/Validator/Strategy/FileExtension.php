<?php
namespace Common\Validator\Strategy;


class FileExtension extends AbstractValidationStrategy
{
    private $ext;

    public function __construct($ext)
    {
        $this->ext = $ext;
    }

    public function execute(array $data, $field)
    {
        $errors = [];

        if (isset($data[$field]) && $data[$field]['name']) {
            list(, $file_extension) = explode('.', $data[$field]['name']);
            if ($file_extension !== $this->ext) {
                $errors[] = sprintf('File "%s" is not "%s" extension !', $data[$field]['name'], $this->ext);
            }
        }

        return $errors;
    }
}
