<?php

class Pokemon extends DB{

    private $id;
    private $number;
    private $name;
    private $type;
    private $type_name;
    private $description;
    private $file_image;
    private $file_type;

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

    
    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    public function getType_name()
    {
        return $this->type_name;
    }

    public function setType_name($type)
    {
        $this->type_name = $type;

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

    public function getFile_type()
    {
        return $this->file_type;
    }

   
    public function setFile_type($file_type)
    {
        $this->file_type = $file_type;

        return $this;
    }



    public function All()
    {
        $query_result = $this->connection->query("SELECT * FROM pokemon p JOIN tipo t ON p.id_tipo = t.id_tipo ORDER BY numero");

        $rows = $query_result->fetch_all(MYSQLI_ASSOC);

        return $rows;
    }

    public function typeAll()
    {
        $query_result = $this->connection->query("SELECT id_tipo, tipo FROM tipo  ORDER BY tipo");

        $rows = $query_result->fetch_all(MYSQLI_ASSOC);

        return $rows;
    }

    public function searchByAll($value)
    {

        $query_result = $this->connection->query("SELECT * FROM pokemon p JOIN tipo t ON p.id_tipo = t.id_tipo WHERE p.numero='" . $value . "' OR p.nombre='" . $value . "' OR t.tipo='" . $value . "'");

        $rows = $query_result->fetch_all(MYSQLI_ASSOC);

            
        return $rows;
        

    }


    public function getById($id)
    {
        $query_result = $this->connection->query("SELECT * FROM pokemon p JOIN tipo t ON p.id_tipo = t.id_tipo WHERE id = " . $id);


        $row = $query_result->fetch_assoc();


        if($row)
        {
            $this->id = $row['id'];
            $this->number = $row['numero'];
            $this->name = $row['nombre'];
            $this->description = $row['descripcion'];
            $this->type = $row['id_tipo'];
            $this->file_image = $row['imagen'];
            $this->file_type = $row['tipo_imagen'];
            $this->type_name = $row['tipo'];

            return $this;

        }

        return false;

       
    }

    public function delete($id)
    {
        echo "DELETE FROM pokemon WHERE id =" . $id;
        $query_result = $this->connection->query("DELETE FROM pokemon WHERE id =" . $id);

        return $this->connection->affected_rows;
    }

    public function save()
    {
        $query_result = $this->connection->query("INSERT INTO pokemon (numero,nombre,descripcion,imagen,id_tipo) VALUES (" . $this->number . ",'" . $this->name . "','" . $this->description . "','" . $this->file_image . "'," . $this->type . ")");

        return $this->connection->insert_id;
    }

    public function update()
    {
        $query_result = $this->connection->query("UPDATE pokemon SET numero=" . $this->number . " ,nombre='" . $this->name . "' ,descripcion= '" . $this->description . "',imagen='" . $this->file_image . "' ,id_tipo=" . $this->type . " WHERE id=" . $this->id);
       
        return $this->connection->affected_rows;
    }
}