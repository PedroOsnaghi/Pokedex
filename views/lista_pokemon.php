<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>

    <div id="lista-pokem" class="container">

        <div class="container my-5">
            <div class="row fw-bold text-white text-center bg-primary">
                <div class="col-1 p-2 border border-secondary">Id</div>
                <div class="col-1 p-2 border border-secondary">Numero</div>
                <div class="col-1 p-2 border border-secondary">Nombre</div>
                <div class="col-1 p-2 border border-secondary">Tipo</div>
                <div class="col-4 p-2 border border-secondary">Descripción</div>
                <div class="col-1 p-2 border border-secondary">Imagen</div>
                <div class="col-3 p-2 border border-secondary">Acciones</div>
            </div>
            <div class="row bg-light">
                <div class="col-1 p-2 border d-flex align-content-center justify-content-center flex-wrap">1</div>
                <div class="col-1 p-2 border d-flex align-content-center justify-content-center flex-wrap">94</div>
                <div class="col-1 p-2 border d-flex align-content-center justify-content-center flex-wrap">Gengar</div>
                <div class="col-1 p-2 border d-flex align-content-center justify-content-center flex-wrap">
                    <img src="../public/tipos/fantasma.jpeg" width="50px">
                </div>
                <div class="col-4 p-2 border d-flex align-content-center justify-content-center flex-wrap">Gengar es un Pokémon de tipo fantasma/veneno</div>
                <div class="col-1 p-2 border d-flex align-content-center justify-content-center flex-wrap">
                    <img src="../public/img/Gengar.jpeg" width="50px">
                </div>
                <div class="col-3 p-2 border d-flex align-content-center justify-content-center flex-wrap">
                    <a href="#" class="p-2">
                        <input type='button' name='modificar' id='modificar' value='Modificar'>
                    </a>
                    <a href="#" class="p-2">
                        <input type='button' name='eliminar' id='eliminar' value='Eliminar'>
                    </a>
                </div>
            </div>
        </div>

        <div>
            <a href="#">
                <input type='button' name='nuevoPokemon' id='nuevoPokemon' value='Nuevo pokemon'>
            </a>
        </div>
    </div>


</body>
</html>