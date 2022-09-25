
<?php if($this->msg_type == view::MSG_INFO){ ?>
                <div class='container-lg'>
                    <div class='alert alert-warning d-flex align-items-center' role='alert'>
                        <i class='fa-solid fa-triangle-exclamation me-2'></i>
                        <div><?php echo $this->message ?></div>
                    </div> 
                </div>       
<?php }else{?>
                <div class='container-lg'>
                    <div class='alert alert-danger d-flex align-items-center' role='alert'>
                        <i class='fa-solid fa-triangle-exclamation me-2'></i>
                        <div><?php echo $this->message ?></div>
                    </div>
                </div>    
<?php } ?>    