<?php

/**
 * Created by PhpStorm.
 * User: Akinlekan
 * Date: 5/16/2017
 * Time: 11:16 AM
 */
class uploader
{
    private $filename;
    private $filedata;
    private $destination;
    private $errorMessage;
    private $errorCode;

    public function __construct($key)
    {
        $this->filename = $_FILES[$key]['name'];
        $this->filedata = $_FILES[$key]['tmp_name'];
        $this->errorCode = ($_FILES[$key]['error']);
    }

    public function saveIn($folder)
    {
        $this->destination = $folder;
    }


    private function readyToUpload()
    {
        $folderIsWriteAble = is_writable($this->destination);


        if ($folderIsWriteAble === false) {
            $this->errorMessage = "Error: destination folder is ";
            $this->errorMessage .= "not writable, change permissions";
            $canUpload = false;
        } elseif ($this->errorCode === 1) {
            $maxSize = ini_get('upload_max_filesize');
            $this->errorMessage = "Error: File is too big. ";
            $this->errorMessage .= "Max file size is $maxSize";
            $canUpload = false;
        } elseif ($this->errorCode === 4) {
            $this->errorMessage = "Error: Please select an image to upload!";
            $canUpload = false;
        } elseif (file_exists($this->filename && $this->destination)) {
            $this->errorMessage = "Error: Filename exist in database";
            $canUpload = false;
        } else {
            $canUpload = true;
        }
        return $canUpload;
    }

    public function save()
    {
        if ($this->readyToUpload()) {
            move_uploaded_file($this->filedata, "$this->destination/$this->filename");
        } else {
            $exc = new Exception($this->errorMessage);
            throw $exc;
        }
    }
}