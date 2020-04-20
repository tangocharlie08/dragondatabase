
<?php
if (isset($edit)) {
    $path = admin_url('general_location_management/update/' . $edit->id);
} else {
    $path = admin_url('general_location_management/save');
}
?>


<form method="post" action="<?php echo $path; ?>" role="form" onsubmit="return check_form()" enctype="multipart/form-data"> 
    <div class="panel panel-default"> 
        <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-user"></i>
                <?php
                if (isset($edit)) {
                    echo 'Edit General Location';
                } else {
                    echo 'Add New Location';
                }
                ?>


            </h6>
        </div> 
        <div class="panel-body">

            <div class="form-group">                
                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <label>General Location:</label> 
                        <input type="text" id="general_location" value="<?php echo (isset($edit->location)) ? $edit->location : set_value('location'); ?>" name="general_location" class="form-control" placeholder="Enter general location"/>
                        <label for="general_location" id="general_locationError" class="error"><?php echo form_error('location'); ?></label>
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

