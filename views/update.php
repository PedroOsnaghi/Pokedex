<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    
</head>
<body>
    <h1>Modificar pokemon</h1>

    <br>

  
   
    <img src="<?php echo DIR_ROOT . $this->data['upload_folder'] . $this->data['pokemon']->getFile_image()?>" alt="" id='preview' />
    <form action="./index.php?c=manage&a=update&id=<?php echo $this->data['pokemon']->getId()?>" method="post" enctype="multipart/form-data" >
        
        <input type="file" name="archivo" id="file" value="<?php echo DIR_ROOT . $this->data['upload_folder'] . $this->data['pokemon']->getFile_image()?>">
        <label for="numero">numero</label>
        <input type="text" name="numero" id="numero" value="<?php echo $this->data['pokemon']->getNumber()?>">
        <label for="nombre">nombre</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $this->data['pokemon']->getName()?>">
        <label for="desc">descripcion</label>
        <input type="text" name="descripcion" id="desc" value="<?php echo $this->data['pokemon']->getDescription()?>">
        <label for="tipo">tipo</label>
        <input type="text" name="tipo" id="tipo" value="<?php echo $this->data['pokemon']->getType()?>">
        <input type="hidden" name="file-image" value="<?php echo $this->data['pokemon']->getFile_image()?>">
        <input type="submit" value="Guardar Pokemon">
    </form>

    <!-- MENSAJES -->
    <?php
                
                if(isset($this->data['message']) && $this->data['message']['from'] == 'manage')
                    echo "<div class='" . $this->data['message']['type'] . "'>" . $this->data['message']['msg'] . "</div>";
    ?>  
     

</body>


</html>