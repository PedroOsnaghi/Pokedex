
<?php switch($this->msg->getType()){

        case AppMsg::MSG_INFO:?>

                            <div class='container-lg'>
                                <div class='alert alert-warning d-flex align-items-center' role='alert'>
                                    <i class='fa-solid fa-triangle-exclamation me-2'></i>
                                    <div><?php echo $this->msg->getMessage() ?></div>
                                </div> 
                            </div>   


        <?php break; 
        case AppMsg::MSG_DANGER:?>
               
                            <div class='container-lg'>
                                <div class='alert alert-danger d-flex align-items-center' role='alert'>
                                    <i class='fa-solid fa-triangle-exclamation me-2'></i>
                                    <div><?php echo $this->msg->getMessage() ?></div>
                                </div>
                            </div>    
        <?php break; 
        case AppMsg::MSG_SUCCESS:?>
                             <div class='container-lg'>
                                <div class='alert alert-success d-flex align-items-center' role='alert'>
                                    <i class="fa-solid fa-circle-check me-2"></i>
                                    <div><?php echo $this->msg->getMessage() ?></div>
                                </div>
                            </div>    

        <?php break;
        default:?>
                            <div class='container-lg'>
                                <div class='alert alert-secondary d-flex align-items-center' role='alert'>
                                    <i class="fa-solid fa-circle-check me-2"></i>
                                    <div><?php echo $this->msg->message ?></div>
                                </div>
                            </div>   

<?php } ?>