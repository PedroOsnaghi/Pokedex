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
                <h3><?php echo("Hola, " . $this->data['user']);?></h3>
                <a href="">Cerrar Sesión</a>
            </div>

        <?php }else{ ?>
            <!-- SI NO EXISTE SESSION MOSTRAMOS FORMULARIO LOGUIN-->
            <div>
                <form action="./index.php?c=user&a=login" method="post">
                    <input type="text" name="user" id="">
                    <input type="password" name="pass" id="">
                    <input type="submit" value="Ingresar">
                </form>
            </div>
          
         <?php } ?>    
       
    </header>