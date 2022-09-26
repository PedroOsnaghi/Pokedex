<?php include("../../config/config.php")?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404</title>
     <!-- Fontawesome -->
     <link rel="stylesheet" href="<?php echo DIR_ROOT ?>/public/css/All.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo DIR_ROOT ?>/public/css/bootstrap.css">
</head>
<body>
    <div class="d-flex flex-column align-items-center justify-content-center vh-100 bg-dark">
        <i class="fs-1 text-warning fa-solid fa-triangle-exclamation"></i>
        <h1 class="display-1 fw-bold text-light">404</h1>
        <h3 class="text-white">El recurso no existe</h3>
        <a class="btn btn-danger" href="../../index.php">volver</a>
    </div>
   
   
</body>
</html>


