<?php
if (isset($edit)) {
    $path = admin_url('admin_user/update/' . $edit->id);
} else {
    $path = admin_url('admin_user/save');
}
?>

<form role="form" action="<?= $path; ?>" method="post" enctype="multipart/form-data"> 

    <div class="panel panel-default"> 
        <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-user"></i>
                <?php
                if (isset($edit)) {
                    echo $edit->username;
                } else {
                    echo 'Add New User';
                }
                ?>
            </h6>
        </div> 
        <div class="panel-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Name:</label> 
                        <input type="text" placeholder="Enter Name" class="form-control" name="name" value="<?php echo (isset($edit->name)) ? $edit->name : set_value('name') ?>">
                        <label for="name" class="error"><?= form_error('name'); ?></label>
                    </div>

                    <div class="col-md-6">
                        <label>Email:</label> 
                        <input type="text" placeholder="your@email.com" class="form-control" name="email" value="<?php echo (isset($edit->email)) ? $edit->email : set_value('email') ?>">
                        <label for="email" class="error"><?= form_error('email'); ?></label>
                    </div>
                </div>
            </div> 
            <div class="form-group">
                <div class="row">
                    
                    <div class="col-md-6">
                        <?php { ?>
                            <label>Initials:</label> 

                            <input type="text" placeholder="Enter initials" class="form-control" name="initials" value="<?php echo (isset($edit->initials)) ? $edit->initials : set_value('initials')  ?>">
                            <label for="initials" class="error"><?= form_error('initials'); ?></label>
                        <?php }
                        ?>
                    </div>
                    <div class="col-md-6">
                       
                        <label>Username:</label> 

                        <input type="text" placeholder="Eg. John" class="form-control" name="username" value="<?php echo (isset($edit->username)) ? $edit->username : set_value('username')  ?>">
                        <label for="username" class="error"><?= form_error('username'); ?></label>
                       
                    </div>

                </div>
            </div> 
            <?php if($this->session->userdata('admin_type') == 1) { ?>
                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-6">
                        <b style="color:red;"><?php echo form_error('user_type'); ?></b>
                        <label>User Type:</label> 
                        <select class="manufacture-dropdown" name="user_type" >
                                <option value="" selected disabled >Select User Type</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->user_type == 0){ echo 'selected';}
                                }?> >Normal User</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->user_type == 1){ echo 'selected';}
                                }?> >Super User</option>
                        </select>
                    </div>
                </div>
            <?php } ?>
            <div class="form-group" >
                <div class="row" style="margin-top: 15px;">
                    <?php if (isset($edit)) { ?>
                        <div class="col-md-6">
                            <label>Password:</label> 
                            <input type="password" placeholder="password" class="form-control" name="password">
                            <label for="password" class="error">leave it blank, if you do not want to change it</label>
                        </div>
                    <?php } else { ?>

                        <div class="col-md-6">
                            <label>Password:</label> 
                            <input type="password" placeholder="password" class="form-control" name="password">
                            <label for="password" class="error"><?= form_error('password'); ?></label>
                        </div>
                        <div class="col-md-6">
                            <label>Repeat Password:</label>
                            <input type="password" placeholder="password" class="form-control" name="repeat_password">
                            <label for="password" class="error"><?= form_error('repeat_password'); ?></label>
                        </div>

                    <?php } ?>
                </div>
            </div> 
            <div class="form-actions text-right"> 
                <input type="reset" class="btn btn-danger" value="Cancel"> 
                <input id="submit" type="submit" class="btn btn-primary" value="Submit"> 
            </div> 
        </div>

    </div>

</form>

<script>
<?php if (!isset($edit)) { ?>
        $('#submit').click(function(){
            var i = $('#image_file') . val();
            if (i == '') {
                $('.error > p') . html('Please select image') . show();
                return false;
            }

        });
<?php } ?>
    
    
    
    function fileSelectHandler() {
        
        var oFile = $('#image_file')[0].files[0];

        // hide all errors
        $('.error >p').hide();
        $('.previous_img').hide();

        // check for image type (jpg and png are allowed)
        var rFilter = /^(image\/jpeg|image\/png)$/i;
        if (! rFilter.test(oFile.type)) {
            $('.error > p').html('Please select a valid image file (jpg and png are allowed)').show();
            return;
        }

        // check for file size
        if (oFile.size > 1024 * 1024) {
            $('.error > p').html('You have selected too big file, please select a one smaller image file').show();
            return;
        }

        // preview element
        var oImage = document.getElementById('preview');

        // prepare HTML5 FileReader
        var oReader = new FileReader();
        oReader.onload = function(e) {

            // e.target.result contains the DataURL which we can use as a source of the image
            oImage.src = e.target.result;
            oImage.onload = function () { // onload event handler

                // display step 2
                //                $('.step2').fadeIn(500);
                //
                //                // display some basic image info
                //                var sResultFileSize = bytesToSize(oFile.size);
                //                $('#filesize').val(sResultFileSize);
                //                $('#filetype').val(oFile.type);
                //                $('#filedim').val(oImage.naturalWidth + ' x ' + oImage.naturalHeight);
                //
                //                // Create variables (in this scope) to hold the Jcrop API and image size
                //                var jcrop_api, boundx, boundy;
                //
                //                // destroy Jcrop if it is existed
                //                if (typeof jcrop_api != 'undefined') 
                //                    jcrop_api.destroy();
                //
                //                // initialize Jcrop
                //                $('#preview').Jcrop({
                //                    minSize: [32, 32], // min crop size
                //                    aspectRatio : 1, // keep aspect ratio 1:1
                //                    bgFade: true, // use fade effect
                //                    bgOpacity: .3, // fade opacity
                //                    onChange: updateInfo,
                //                    onSelect: updateInfo,
                //                    onRelease: clearInfo
                //                }, function(){
                //
                //                    // use the Jcrop API to get the real image size
                //                    var bounds = this.getBounds();
                //                    boundx = bounds[0];
                //                    boundy = bounds[1];
                //
                //                    // Store the Jcrop API in the jcrop_api variable
                //                    jcrop_api = this;
                //                });
            };
        };

        // read selected file as DataURL
        oReader.readAsDataURL(oFile);
    }

</script>
