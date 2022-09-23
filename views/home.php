<?php

include_once('./views/header/header.php');

?>
<!--LISTA DE POKEMON -->

    <main>

       

        <form action="index.php?c=manage&a=search" method="post">
            <input type="text" name="toSearch" id="">
            <input type="submit" value="Buscar">
        </form>

        
         
        <!-- MENSAJES -->
         <?php
            if(isset($this->data['message']))
            echo "<div class='" . $this->data['message']['type'] . "'>" . $this->data['message']['msg'] . "</div>";
         
            foreach($this->data['pokemon'] as $row)
            {
                echo  var_dump($row) . "</br>";
            }

            echo "<img src='". $this->data['imagen'] ."' alt=''>";
            ?>
    </main>
        
</body>
</html>