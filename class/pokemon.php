<?php

class Pokemon extends DB{

    private $id;
    private $number;
    private $name;
    private $type;
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

    public function getName()
    {
        return $this->name;
    }

 
    public function setName($name)
    {
        $this->name = $name;

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

    public function searchByNumber($value)
    {

        $query_result = $this->connection->query("SELECT * FROM pokemon p JOIN tipo t ON p.id_tipo = t.id WHERE p.numero = '" . $value ."'");

        $rows = $query_result->fetch_all(MYSQLI_ASSOC);

            
        return $rows;
        

    }

    public function searchByName($value)
    {
        
        $query_result = $this->connection->query("SELECT * FROM pokemon p JOIN tipo t ON p.id_tipo = t.id WHERE p.nombre = '" . $value ."'");

        $rows = $query_result->fetch_all(MYSQLI_ASSOC);

            
        return $rows;
    }

    public function searchByType($value)
    {
        
        $query_result = $this->connection->query("SELECT * FROM pokemon p JOIN tipo t ON p.id_tipo = t.id WHERE t.tipo = '" . $value ."'");

        $rows = $query_result->fetch_all(MYSQLI_ASSOC);

            
        return $rows;
    }

    public function getByid($id)
    {
        $query_result = $this->connection->query("SELECT * FROM pokemon WHERE id = " . $id);


        $row = $query_result->fetch_assoc();


        if($row)
        {
            $this->id = $row['id'];
            $this->number = $row['numero'];
            $this->name = $row['nombre'];
            $this->description = $row['descripcion'];
            $this->type = $row['tipo'];
            $this->file_image = $row['imagen'];

            return $this;

        }

        return false;

       
    }

    public function delete($id)
    {
        $query_result = $this->connection->query("DELETE FROM pokemon WHERE id = " . $id);

        return $this->connection->affected_rows;
    }

    public function add()
    {
        $query_result = $this->connection->query("INSERT INTO pokemon (numero,nombre,descripcion,imagen,id_tipo) VALUES (" . $this->number . ",'" . $this->name . "','" . $this->description . "','" . $this->file_image . "'," . $this->type . ")");

        return $this->connection->insert_id;
    }
}