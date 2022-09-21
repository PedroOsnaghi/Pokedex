<?php


include_once('./views/header/header.php');

?>

<main>

    <h1>Modificar Pokémon</h1>

    <form action="" method="post" enctype="multipart/form-data">

        <ul>
            <li>
                <label for="id">Id</label>
                <input type="text" id="id" name="id">
            </li>

            <li>
                <label for="numero">Número</label>
                <input type="text" id="numero" name="numero">
            </li>

            <li>
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre">
            </li>

            <li>
                <label for="tipo-1">Tipo 1</label>
                <input type="text" id="tipo-1" name="tipo-1">
            </li>

            <li>
                <label for="tipo-2">Tipo 2</label>
                <input type="text" id="tipo-2" name="tipo-2">
            </li>

            <li>
                <label for="descripcion">Descripción</label>
                <input type="text" id="descripcion" name="descripcion">
            </li>

            <li>
                <label for="img">Imagen</label>
                <input type="file" id="img" name="img">
            </li>

        </ul>
        <input type="submit" name="guardar" value="Guardar cambios">
    </form>

</main>
</body>
</html>