
<?php
if (isset($edit)) {
    $path = admin_url('habitat_type_management/update/' . $edit->id);
} else {
    $path = admin_url('habitat_type_management/save');
}
?>


<form method="post" action="<?php echo $path; ?>" role="form" onsubmit="return check_form()" enctype="multipart/form-data"> 
    <div class="panel panel-default"> 
        <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-user"></i>
                <?php
                if (isset($edit)) {
                    echo 'Edit habitat type';
                } else {
                    echo 'Add habitat type';
                }
                ?>


            </h6>
        </div> 
        <div class="panel-body">

            <div class="form-group">                
                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <label>Habitat Type:</label> 
                        <input type="text" id="name" value="<?php echo (isset($edit->type)) ? $edit->type : set_value('habitat_type'); ?>" name="habitat_type" class="form-control" placeholder="Enter habitat type"/>
                        <label for="frame_type" id="frame_typeError" class="error"><?php echo form_error('habitat_type'); ?></label>
                    </div>
                </div>
            </div>

            <div class="form-actions text-right"> 
                <input name="submitForm" type="submit" value="Cancel" class="btn btn-danger"> 
                <input name="submitForm" id="submit" type="submit" value="Submit" class="btn btn-primary"> 
            </div> 
        </div>

    </div>

</form>