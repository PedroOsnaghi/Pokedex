    <!--SECCION MAIN -->

    <main>
        <form action="index.php?c=manage&a=search" method="post">
            <input type="text" name="toSearch" id="">
            <input type="submit" value="Buscar">
        </form>

            <?php
                if(isset($this->data['notFound']))
                    echo "<div>Pokemon no encotnrado.</div>";
                foreach($this->data['pokemon'] as $row)
                {
                    echo  var_dump($row) . "</br>";
                }
            ?>
    </main>
        
    </body>
    </html>