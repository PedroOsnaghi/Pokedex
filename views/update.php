<!-- HEADER -->

<?php include_once('./views/header/header.php') ?>

<!-- CONTENT -->

    <div class="container-lg">
        <div class="d-flex align-items-center">
            <a href="<?php echo DIR_ROOT ?>" class="btn btn-success me-4">
                <i class="fa-regular fa-circle-left"></i>
                volver   
            </a>
            <h2>Modificar pokemon</h2>
        </div>
        
        <hr>
        <!-- MENSAJES -->
        <?php
            /**
             * Si llego algun mensaje desde el Manage se muestra aca
             */
            if(isset($this->data['message']) && $this->data['message']['from'] == 'manage'){ ?>
                <div class='container-lg'>
                    <div class='alert alert-warning d-flex align-items-center' role='alert'>
                        <i class='fa-solid fa-triangle-exclamation me-2'></i>
                        <div><?php echo $this->data['message']['msg'] ?></div>
                    </div> 
                  </div>       
        <?php } ?>

        <div class="container-fluid d-block">
                

                <!-- FORMULARIO -->
                <div class="container-fluid ">
                    <form class="d-flex flex-column flex-md-row" action="./index.php?c=manage&a=update&id=<?php echo $this->data['pokemon']->getId()?>" method="post" enctype="multipart/form-data" >
                            <!-- IMAGEN -->    
                            <div class="col-md-4 col px-3 center">
                                <img class="rounded mx-auto img-thumbnail mb-3 d-block" src="<?php echo DIR_ROOT . $this->data['upload_folder'] . $this->data['pokemon']->getFile_image()?>" alt="" id='preview' max-width="300px"/>
                                
                                <input class="form-control" type="file" name="archivo" id="file" value="Cambiar Imagen" >
                            </div>
                            <div class="col-md-8 col px-3">
                                
                                <label for="numero">Número</label>
                                <input class="form-control mb-2" type="number" name="numero" id="numero" value="<?php echo $this->data['pokemon']->getNumber()?>" required>
                            
                                <label for="nombre">Nombre</label>
                                <input class="form-control mb-2"  type="text" name="nombre" id="nombre" value="<?php echo $this->data['pokemon']->getName()?>" required>
                                <div class="md-2">
                                   <label for="desc">Descripcion</label>
                                    <textarea class="form-control"  name="descripcion" id="desc" rows="5"  required><?php echo $this->data['pokemon']->getDescription()?></textarea> 
                                </div>
                                
                                <label for="tipo">Tipo</label>

                                <select class="form-select mb-4" name="tipo" id='tipo' required>
                                    <option  value="0" selected hidden disabled>Seleccione un Tipo de Pokemón</option>
                                    <?php if (isset($this->data['list-type'])){
                                           foreach ($this->data['list-type'] as $t){?>
                                                <option value="<?php echo $t['id_tipo']?>" <?php echo ($t['id_tipo']==$this->data['pokemon']->getType()) ? 'selected' : '' ?>> <?php echo $t['tipo'] ?> </option>
                                     <?php } 
                                    }?>
                                    
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


