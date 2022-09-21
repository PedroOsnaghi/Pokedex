<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
</head>
<body>
    <header>
        <?php if($this->data['session']){ ?> 
            <!-- SI EXISTE SESSION MOSTRAMOS DATOS ADMIN-->
            <div>
                <h3><?php echo("Hola, " . $this->data['session']);?></h3>
                <a href="./index.php?c=auth&a=logout">Cerrar Sesión</a>
            </div>

        <?php }else{ ?>
            <!-- SI NO EXISTE SESSION MOSTRAMOS FORMULARIO LOGUIN-->
            <div >
                <form action="./index.php?c=auth&a=login" method="post">
                    <input type="text" name="user" id="">
                    <input type="password" name="pass" id="">
                    <input type="submit" value="Ingresar">
                </form>
            </div>
          
         <?php } 
         
         if(isset($this->data['error']))
            echo "<div class='error_msg'>" . $this->data['err_msg'] . "</div>";
          
         ?>    
       
    </header>