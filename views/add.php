<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    
</head>
<body>
    <h1>Nuevo pokemon</h1>

    <br>

  
    

    <img src="<?php echo DIR_ROOT ?>uploads/default/default.jpg" alt="" id='preview' />
    <form action="./index.php?c=manage&a=save" method="post" enctype="multipart/form-data" >
        
        <input type="file" name="archivo" id="file" >
        <label for="numero">numero</label>
        <input type="text" name="numero" id="numero" value="<?php echo isset($this->data['values']) ? $this->data['values']['numero'] : ''?>">
        <label for="nombre">nombre</label>
        <input type="text" name="nombre" id="nombre">
        <label for="desc">descripcion</label>
        <input type="text" name="descripcion" id="desc">
        <label for="tipo">tipo</label>
        <input type="text" name="tipo" id="tipo">
        <input type="submit" value="Guardar Pokemon">
    </form>

     <!-- MENSAJES -->
     <?php
            if(isset($this->data['message']))
                echo "<div class='" . $this->data['message']['type'] . "'>" . $this->data['message']['msg'] . "</div>";
     ?>       
</body>

<script>

var f = document.getElementById('file');
var reader = new FileReader();



f.addEventListener('change', function(){
    console.log('change');
    filePreview(this);
});

function filePreview(input) {

    console.log(input.files);

    if (input.files && input.files[0]) {

        

        reader.readAsDataURL(input.files[0]);

        

        reader.addEventListener('load', function(e){

            var img = document.getElementById('preview');
            img.src = e.target.result;
            console.log(e.target.result);

        });

   

}

}
</script>
</html>