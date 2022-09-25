 <!-- HEADER -->

<?php include_once('./views/header/header.php') ?>

<!-- CONTENT -->
 
    <div class="container-lg">
        <div class="d-flex align-items-center">
            <a href="<?php echo DIR_ROOT ?>" class="btn btn-success me-4">
                <i class="fa-regular fa-circle-left"></i>
                volver   
            </a>
            <h2><?php echo $this->data['pokemon']->getName()?></h2>
        </div>
        
        <hr>
       

        <div class="container-fluid d-block">
                

                <!-- DATOS -->
                <div class="container-fluid ">
                    <div class="d-flex flex-column flex-md-row" >
                            <!-- IMAGEN -->    
                            <div class="col-md-4 col px-3 center">
                                 <img class="rounded mx-auto img-thumbnail mb-3 d-block" src="<?php echo DIR_ROOT . $this->data['upload_folder'] . $this->data['pokemon']->getFile_image(); ?>" alt="" width="300px"/>
                            </div>
                           
                            <div class="col-md-8 col px-3">
                                
                                <h5>Número</h5>
                                <p><?php echo $this->data['pokemon']->getNumber(); ?></p>
                            
                            
                                <h5>Descripcion</h5>
                                <p><?php echo  $this->data['pokemon']->getDescription(); ?></p>
                                
                                <h5>Tipo</h5>
                                <div class="d-flex px-3 center">
                                     <img class="rounded img-thumbnail me-3 mb-3 " src="<?php echo DIR_ROOT . $this->data['tipo_folder'] . $this->data['pokemon']->getFile_type(); ?>" alt="" />
                                     <p><?php echo  $this->data['pokemon']->getType_name(); ?></p>
                                </div>

                                
                            </div>            
                            
                     </div>
                </div>    
        </div>
        
            

    </div>

  
    
    

    
    

   

</body>

<script src="<?php echo DIR_ROOT ?>public/js/preview.js"></script>


</html>



