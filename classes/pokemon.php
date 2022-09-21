<?php

class Pokemon extends DB{

    private $id;
    private $number;
    private $nombre;
    private $tipo;
    private $description;
    private $file_image;

    public function __construct(){
        parent::__construct();

    }

    
    public function getId()
    {
        return $this->id;
    }

  
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

     
    public function getNumber()
    {
        return $this->number;
    }

    
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    
    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    
    public function getDescription()
    {
        return $this->description;
    }

    
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    
    public function getFile_image()
    {
        return $this->file_image;
    }

   
    public function setFile_image($file_image)
    {
        $this->file_image = $file_image;

        return $this;
    }

    public function All()
    {
        $query_result = $this->connection->query("SELECT * FROM pokemon ORDER BY numero");

        $rows = $query_result->fetch_all(MYSQLI_ASSOC);

        return $rows;
    }

    public function search($id)
    {
        
        $query_result = $this->connection->query("SELECT * FROM pokemon WHERE id = " . $id);

        $rows = $query_result->fetch_assoc();

        if($rows){
            // TODO(Pedro Osnaghi): Terminar
        }

    }
}