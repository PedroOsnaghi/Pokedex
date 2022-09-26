<?php

class File{

    private $name;
    private $type;
    private $size;
    private $tmp_name;
    private $error;

    private $default_filename;




    public function __construct()
    {
        $this-> default_filename = 'default/default.jpg';
        
    }

 

    public function upload()
    {
        
        if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] == UPLOAD_ERR_OK)
        {
            
            $this->name = $_FILES['archivo']['name'];
            $this->type = $_FILES['archivo']['type'];
            $this->size = $_FILES['archivo']['size'];
            $this->tmp_name = $_FILES['archivo']['tmp_name'];
            $this->error = $_FILES['archivo']['error'];
           
            if(file_exists(UPLOAD_FILE_FOLDER . $this->name))
                    unlink(UPLOAD_FILE_FOLDER . $this->name);
                         
            move_uploaded_file($this->tmp_name,  UPLOAD_FILE_FOLDER . $this->name);

            $res = UPLOAD_ERR_OK;
            
          

        }else{

            $this->name = $this->default_filename;

            if($this->error && $this->error != 4){
                
                $res =  $this->getError($this->error);
                         
            }else{

                $res = UPLOAD_ERR_OK;
            } 
            
        }

        return $res;
    }

    public function verifyUpload()
    {
        return (isset($_FILES['archivo']) && $_FILES['archivo']['error'] != 4) ? true : false;
    }

    public function getUploadedFileName()
    {
        return  $this->name;
    }

    private function getError($err_code){
        switch ($err_code) {
            case UPLOAD_ERR_INI_SIZE:
                $msg = "El archivo exede el tamaño maximo de subida permitido";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                $mdg = "El archivo exede el tamaño maximo de subida indicado";
                break;
            case UPLOAD_ERR_PARTIAL:
                $msg = "El archivo se subió de forma parcial";
                break;
            case UPLOAD_ERR_NO_FILE:
                $msg = "No se subió ningun archivo";
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                $msg = "No se encontró la carpeta temporal";
                break;
            case UPLOAD_ERR_CANT_WRITE:
                $msg = "No se pudo escribir el archivo en disco";
                break;
            case UPLOAD_ERR_EXTENSION:
                $msg = "Un error en el servidor detuvo la subida del archivo";
                break;
            
            default:
                $msg = "ha ocurrido un error inesperado al subir el archivo";
                break;
        }
      return $msg;  
    }
}