<h1>Error al conectarse a MySQL</h1>
<h3>Verifique los parametros de conexión</h3>

<h4>Mensaje del Servidor: </h4>

<?php
    if (isset($_GET['code'])){
        switch($_GET['code']){
            case '1045':
            echo "<h5>Access denied for user 'root'@'localhost' (using password: YES)</h5>";
            break;
            case '1049':
            echo "<h5>Unknown database</h5>";
            break;
            case '1046':
            echo "<h5>No database selected</h5>";
            break;
            default:
            echo "<h5> Can't get hostname for your address</h5>";
            break;

        }
    }

 ?>
 
 <a href="../../index.php">volver a intentar</a>


