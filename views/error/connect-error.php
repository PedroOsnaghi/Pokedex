<?php include("../../config/config.php")?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Mysql</title>
     <!-- Fontawesome -->
     <link rel="stylesheet" href="<?php echo DIR_ROOT ?>/public/css/All.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo DIR_ROOT ?>/public/css/bootstrap.css">
</head>
<body>
    <div class="d-flex flex-column align-items-center justify-content-center vh-100 bg-dark">
            <h1 class="display-3 fw-bold text-light">Error al conectarse a MySQL</h1>
            <h3 class="display-6 text-white">Verifique los parametros de conexión</h3>

            <h4 class="text-white">Mensaje del Servidor: </h4>

            <?php
                if (isset($_GET['code'])){
                    switch($_GET['code']){
                        case '1045':
                        echo "<h5 class='text-white'>Access denied for user 'root'@'localhost' (using password: YES)</h5>";
                        break;
                        case '1049':
                        echo "<h5 class='text-white'>Unknown database</h5>";
                        break;
                        case '1046':
                        echo "<h5 class='text-white'>No database selected</h5>";
                        break;
                        default:
                        echo "<h5 class='text-white'> Can't get hostname for your address</h5>";
                        break;

                    }
                }

            ?>
            
            <a class="btn btn-danger" href="../../index.php">volver a intentar</a>


    </div>
   
   
</body>
</html>


