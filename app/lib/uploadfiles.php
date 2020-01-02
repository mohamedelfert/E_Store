<?php

namespace PHPMVC\Lib;

use mysql_xdevapi\Warning;

class UploadFiles
{
    private $name;
    private $size;
    private $type;
    private $error;
    private $tmp_name;
    private $fileExtension;

    private $allowedType = ['png','jpg','jpeg','gif','docx','pdf','zip'];

    public function __construct(array $file)
    {
        $this->name         = $this->name($file['name']);
        $this->size         = $file['size'];
        $this->type         = $file['type'];
        $this->error        = $file['error'];
        $this->tmp_name     = $file['tmp_name'];
    }

    public function name($name)
    {
        $this->fileExtension  = strtolower(pathinfo($name,PATHINFO_EXTENSION));
        $fileName             = substr(base64_encode(uniqid('image_electronic_store','false')) , 0 ,30);
        return $fileName;
    }

    private function isAllowedType()
    {
        return in_array($this->fileExtension , $this->allowedType);
    }

    private function isNotAllowedSize()
    {
        return ($this->size > 3000000);
//        preg_match_all('/((\d+)[MG])$/i' , MAX_SIZE_FILE_UPLOAD ,$matches);
//        $maxFileSizeToUpload = $matches[1][0];
//        $sizeUnit            = $matches[2][0];
//        $currentFileSize = ($sizeUnit == 'M') ? ($this->size / 1024 / 1024) : ($this->size / 1024 / 1024 / 1024);
//        $currentFileSize = ceil($currentFileSize);
//        return (int) $currentFileSize > $maxFileSizeToUpload;
    }

    private function isImage()
    {
        return preg_match_all('/image/i' , $this->type);
    }

    public function getFileName()
    {
        return $this->name . '.' . $this->fileExtension;
    }

    public function upload()
    {
        if ($this->error != 0){
            trigger_error('Sorry File Did not Upload Successfully' , E_USER_ERROR);
        }elseif (!$this->isAllowedType()){
            trigger_error('Sorry File Type not Allowed' , E_USER_ERROR);
        }elseif ($this->isNotAllowedSize()){
            trigger_error('Sorry File Size Not Allowed' , E_USER_ERROR);
        }else{
            if ($this->isImage()){
                move_uploaded_file($this->tmp_name , IMAGES_UPLOAD_DIRECTORY . DS . $this->getFileName());
            }else{
                move_uploaded_file($this->tmp_name , OTHER_FILES_UPLOAD_DIRECTORY . DS . $this->getFileName());
            }
        }
        return $this;
    }
}