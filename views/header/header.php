<?php
    // capturamos el valor de la session de administrador para controlar lo que se debe mostrar en las vistas
    $session_admin = $this->data['session'] ? true : false;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
   
    <!-- Fontawesome -->
    <link rel="stylesheet" href="<?php echo DIR_ROOT ?>/public/css/All.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo DIR_ROOT ?>/public/css/bootstrap.css">
    
</head>
<body>
    <header>
        <nav class="navbar navbar-dark bg-dark mb-3">
            <div class="container-lg">
                <a class="navbar-brand  ">Pokedex</a>
                <?php if($session_admin){ ?> 
                            <!-- SI EXISTE SESSION MOSTRAMOS DATOS ADMIN-->
                            <div class="d-flex align-items-center">
                                <h5 class="navbar-brand"><?php echo"Hola, " . $this->data['session'];?></h5>
                                <a href="./index.php?c=auth&a=logout" class="p-1 px-3 btn btn-info" title="Cerrar Sesíon">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                </a>
                            </div>

                <?php }else{ ?>
                            <!-- SI NO EXISTE SESSION MOSTRAMOS FORMULARIO LOGUIN-->
                           <div class="d-flex">
                                <form class="d-flex" action="./index.php?c=auth&a=login" method="post">
                                    <input class="form-control me-2" type="text" name="user" id="" placeholder="Usuario">
                                    <input class="form-control me-2" type="password" name="pass" id="" placeholder="Contraseña">
                                    <input class="btn btn-primary" type="submit" value="Ingresar">
                                </form>
                                                  
                           </div> 
                <?php }  ?>                 
                        
                        
            </div>
        </nav>

        <!-- MENSAJES DE ERROR  DE LOGIN -->

        <?php if(isset($this->data['message']) && $this->data['message']['from'] == 'login'){ 
            /**
             * Si hay mensaje en viado del loguin lo mostramos aca
             */
            ?>
            <div class='container-lg'>
                    <div class='alert alert-danger d-flex align-items-center' role='alert'>
                        <i class='fa-solid fa-triangle-exclamation me-2'></i>
                        <div><?php echo $this->data['message']['msg'] ?></div>
                    </div>
                </div>                    
        <?php } ?>                
       
    </header>