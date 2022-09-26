<!-- HEADER -->

<?php include_once('./views/header/header.php') ?>

<!-- CONTENT -->

    <div class="container-lg">
        <div class="d-flex align-items-center">
            <a href="<?php echo DIR_ROOT ?>" class="btn btn-success me-4">
                <i class="fa-regular fa-circle-left"></i>
                volver   
            </a>
            <h2>Nuevo pokemon</h2>
        </div>
        
        <hr>
        
        <!-- MENSAJES -->
        
        <div class='container-lg'>
            <?php $this->showAlertFrom('Manage'); ?>  
        </div>  

        <div class="container-fluid d-block">
                

                <!-- FORMULARIO -->
                <div class="container-fluid ">
                    <form class="d-flex flex-column flex-md-row" action="./index.php?c=manage&a=save" method="post" enctype="multipart/form-data">
                            <!-- IMAGEN -->    
                            <div class="col-md-4 col px-3 center">
                                <img class="rounded mx-auto img-thumbnail mb-3 d-block" src="<?php echo DIR_ROOT . UPLOAD_FILE_FOLDER . "default/default.jpg"?>" alt="" id='preview' max-width="300px"/>
                                <input class="form-control" type="file" name="archivo" id="file" >
                            </div>
                            <div class="col-md-8 col px-3">
                                
                                <label for="numero">Número</label>
                                <input class="form-control mb-2" type="number" name="numero" id="numero" value="<?php echo isset($this->value_list['values']) ? $this->value_list['values']['numero'] : ''?>" required>
                            
                                <label for="nombre">Nombre</label>
                                <input class="form-control mb-2"  type="text" name="nombre" id="nombre" value="<?php echo isset($this->value_list['values']) ? $this->value_list['values']['nombre'] : ''?>" required>
                                <label for="desc">Descripcion</label>
                                <input class="form-control mb-2"  type="text" name="descripcion" id="desc" value="<?php echo isset($this->value_list['values']) ? $this->value_list['values']['desc'] : ''?>" required>
                                <label for="tipo">Tipo</label>

                                <select class="form-select mb-4" name="tipo" id='tipo' required>
                                    <option  value="0" selected disabled>Seleccione un Tipo de Pokemón</option>
                                    <?php  foreach ($this->list as $t){?>
                                                <option value="<?php echo $t['id_tipo'] ?>" <?php echo (isset($this->value_list['values']) && ($t['id_tipo'] == $this->value_list['values']['tipo'])) ? 'selected' : ''?> > <?php echo $t['tipo'] ?> </option>
                                     <?php } ?>
                                    
                                </select>
                                
                                <input class="btn btn-primary d-block" type="submit" value="Guardar Pokemon">
                            </div>            
                            
                    </form>
                </div>    
        </div>
        
            

    </div>

  
    
    

    
    

   

</body>

<script src="<?php echo DIR_ROOT ?>public/js/preview.js"></script>


</html>