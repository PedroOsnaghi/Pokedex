<?php

class File{

    private $name;
    private $type;
    private $size;
    private $tmp_name;
    private $error;

    private $upload_folder;
    private $default_filename;




    public function __construct()
    {
        //abrimos archivo de configuracion
        $conf = parse_ini_file("./config/config.ini");
        $this-> upload_folder = $conf['UPLOAD_FILE_FOLDER'];
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

            if(file_exists($this->upload_folder . $this->name)){
                
                $res = ['message' => ['type' => 'error',
                                      'msg' => 'El fichero que intenta subir ya existe en el servidor'
                                 ]
                         ];
            }else{

                move_uploaded_file($this->tmp_name,  $this->upload_folder . $this->name);

                $res = UPLOAD_ERR_OK;
            }


        }else{
            $res = ['message' => ['type' => 'error',
                                   'msg' => $this->getError($_FILES['archivo']['error'])
                                 ]
                   ]; 
        }

        return $res;
    }

    public function getUploadedFileName()
    {
        return $this->upload_folder . $this->default_filename;
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