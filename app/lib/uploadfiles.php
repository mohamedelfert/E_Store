<?php

namespace PHPMVC\Lib;

class UploadFiles
{
    private $name;
    private $size;
    private $type;
    private $error;
    private $tmp_name;
    private $fileExtension;

    private $allowedType = ['png','jpg','jpeg','gif','ico','docx','pdf','zip'];

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
        $fileName             = uniqid('image_electronic_store','false');
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
            throw new \Exception('Sorry File Did not Upload Successfully');
        }elseif (!$this->isAllowedType()){
            throw new \Exception('Sorry File Type ( ' . $this->fileExtension . ' ) not Allowed');
        }elseif ($this->isNotAllowedSize()){
            throw new \Exception('Sorry File Size More Than Size Allowed');
        }else{
            $storageFolder = $this->isImage() ? IMAGES_UPLOAD_DIRECTORY : OTHER_FILES_UPLOAD_DIRECTORY;
            if (is_writable($storageFolder)){
                move_uploaded_file($this->tmp_name , $storageFolder . DS . $this->getFileName());
            }else{
                throw new \Exception('Sorry The Destination Folder Is Not Writable');
            }
        }
        return $this;
    }
}