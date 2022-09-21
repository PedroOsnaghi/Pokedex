<?php

class File{

    public function __construct()
    {
        if (isset($_FILES['archivo']))
        {
            $this->name = $_FILES['archivo']['name'];
            $this->type = $_FILES['archivo']['type'];
            $this->size = $_FILES['archivo']['size'];
            $this->tmp_name = $_FILES['archivo']['tmp_name'];
            $this->error = $_FILES['archivo']['error'];
            
        }
    }
}