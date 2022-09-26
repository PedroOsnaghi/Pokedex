<?php

include_once('views/header/header.php');

?>
<!--HTML:LISTA DE POKEMON -->

    <main style="min-height: 700px;">
       

       <!-- BUSQUEDA -->
        <div class="container-lg">
             <form action="index.php?c=manage&a=search" method="post">
                <div  class="input-group mb-3">
                    <input class="form-control" type="text" name="toSearch" id="" placeholder="Ingrese número, nombre o tipo de Pokemón" value="<?php echo isset($this->data['value'])? $this->data['value'] : '' ?>">
                    <input class="btn btn-primary" type="submit" style="font-family: fontawesome" value=""  >
                </div>   
            </form>
        </div>
       

        <!-- MENSAJES -->
        
        <div class='container-lg'>
            <?php $this->showAlertFrom('Manage'); ?>  
        </div>  


        <!-- LISTADO -->

        <div id="lista-pokem" class="container-lg">
            <div class="container-lg my-4 ">
                <div class="row fw-bold text-white text-center bg-primary">
                    <div class="col-md-1 <?php echo $this->session_admin? 'd-none d-md-block' : 'col-3' ?> p-2 fs-6 border border-secondary ">Numero</div>
                    <div class="col-md-1 col-3 p-2 border border-secondary">Nombre</div>
                    <div class="col-md-1 col-3 p-2 border border-secondary">Tipo</div>
                    <div class="col-md-7 p-2 border border-secondary d-none d-md-block">Descripción</div>
                    <div class="<?php echo $this->session_admin? 'col-md-1' : 'col-md-2' ?> col-3 p-2 border border-secondary">Imagen</div>
                    <?php if ($this->session_admin) echo "<div class='col-md-1 col-3 p-2 border border-secondary'>Acciones</div>" ?>
                </div>
                
                <div class="row bg-light ">


        <?php  foreach($this->list as $row){ ?>       
 
                        <div class="col-md-1 <?php echo $this->session_admin? 'd-none d-md-block' : 'col-3' ?> p-2 border d-flex align-content-center justify-content-center flex-wrap"><?php echo $row['numero'] ?></div>
                        <div class="col-md-1 col-3 p-2 border d-flex align-content-center justify-content-center flex-wrap">
                            <a href="<?php DIR_ROOT ?>index.php?c=manage&a=get&id=<?php echo $row['id'] ?>" class="text-danger" title="Ver Detalles">
                                 <?php echo $row['nombre'] ?>
                            </a>     
                        </div>
                        <div class="col-md-1 col-3 p-2 border d-flex align-content-center justify-content-center flex-wrap">
                            <img src="<?php echo DIR_ROOT . TYPE_FILE_FOLDER . $row['tipo_imagen'] ?>" width="50px">
                        </div>
                        <div class="col-md-7 p-2 border d-flex align-content-center justify-content-center flex-wrap d-none d-md-block"><?php echo $row['descripcion'] ?></div>
                        <div class="<?php echo $this->session_admin? 'col-md-1' : 'col-md-2' ?> col-3 p-2 border d-flex align-content-center justify-content-center flex-wrap">
                            <img src="<?php echo DIR_ROOT . UPLOAD_FILE_FOLDER . $row['imagen'] ?>" width="50px">
                        </div>
                        
                        <?php if ($this->session_admin){ 
                            /**
                             * Mostramos u ocultamos los controles de administrador EDITAR | BORRAR
                             *  
                             */    
                        ?>
                            
                                    <div class='col-md-1 col-3 p-2 border d-flex align-content-center justify-content-center flex-wrap'>
                                        <a href="<?php echo DIR_ROOT ?>index.php?c=manage&a=modify&id=<?php echo $row['id'] ?>" class='p-md-2 p-1 m-1 btn btn-secondary' title='Modificar Pokemon'>
                                        <i class='fa-solid fa-pen-to-square'></i>
                                        </a>
                                        <a href="<?php echo DIR_ROOT ?>index.php?c=manage&a=delete&id=<?php echo $row['id'] ?>" app_tag="btn-delete" class='p-md-2 p-1 m-1 btn btn-secondary' title='Eliminar Pokemon' data-bs-toggle='modal' data-bs-target='#confirm'>
                                        <i class='fa-solid fa-trash'></i> 
                                        </a>    
                                    </div>
                        <?php } ?>
                    
                    

              
        <?php } ?>
  
                </div>
            </div>

            <?php if ($this->session_admin){ 
                /**
                 *   mostramos u ocultamos el boton de AGREGAR POKEMON
                 */    
            ?>
                <div>
                    <a href="<?php echo DIR_ROOT ?>index.php?c=manage&a=add" class="btn btn-primary d-block d-md-inline">
                        <i class="p-1 fa-solid fa-plus"></i>Nuevo Pokemón
                    </a>
                </div>
            <?php } ?>    
        </div>

        <!-- DIALOGO MODAL DE CONFIRMACION-->
        <div class="modal fade" id="confirm" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Atención</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Estás a punto de eliminar un Pokemón. 

                Estás seguro?
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-secondary" data-bs-dismiss="modal" >Cancelar</a>
                <a href="" id="btn-confirm" class="btn btn-primary">Si, quiero eliminarlo</a>
            </div>
            </div>
        </div>
        </div>

         
        
    </main>

 <!-- FOOTER --> 
<?php

include_once('views/footer/footer.php');

?> 





