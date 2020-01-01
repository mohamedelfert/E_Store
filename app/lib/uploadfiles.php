<?php

namespace PHPMVC\Lib;

class UploadFiles
{
    private $name;
    private $size;
    private $type;
    private $error;
    private $tmp_name;

    public function __construct(array $file)
    {
        $this->name         = $file['name'];
        $this->size         = $file['size'];
        $this->type         = $file['type'];
        $this->error        = $file['error'];
        $this->tmp_name     = $file['tmp_name'];
    }
}