    <!--SECCION MAIN -->

    <main>
            <?php
                foreach($this->data['pokemon'] as $row)
                {
                    echo  var_dump($row) . "</br>";
                }
            ?>
    </main>
        
    </body>
    </html>