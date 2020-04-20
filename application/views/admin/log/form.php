<?php
if (isset($edit)) {
    $path = admin_url('dragon_profile_management/update/' . $edit->id);
} else {
    $path = admin_url('dragon_profile_management/save');
}
?>


<form enctype="multipart/form-data" method="post" action="<?php echo $path; ?>" role="form"> 
    <div class="panel panel-default"> 
        <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-user"></i>
                <?php
                if (isset($edit)) {
                    echo 'Edit Dragon Profile';
                } else {
                    echo 'Add Dragon Profile';
                }
                ?>           
            </h6>
        </div> 
        <div class="panel-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <label>Profile:</label> 
                        <input type="text" value="<?php echo (isset($edit->type)) ? $edit->type : set_value('type'); ?>" name="type" class="form-control" placeholder="Enter dragon profile"/>
                        <label for="type" class="error"><?php echo form_error('type'); ?></label>
                    </div>
                </div>
                <div class="form-group">
                                        <label>Image :</label>
                                        <input type="file" name="userfile">
                                        <?php echo form_error('userfile'); ?>
                                        <?php if ($image->image != ''): ?>
                                            <img src="<?php echo base_url('uploads/'.$image->image); ?>" width="200px">
                                        <?php endif; ?>
                                    </div>

                

                
                </div> 


            <div class="form-actions text-right"> 
                <input name="submitForm" type="submit" value="Cancel" class="btn btn-danger"> 
                <input name="submitForm" id="submit" type="submit" value="Submit" class="btn btn-primary"> 
            </div> 
        </div>

    </div>

</form>

<script>
<?php if (!isset($edit)) { ?>
        $('#submit').click(function () {
            var i = $('#image_file').val();
            if (i == '') {
                $('.error > p').html('Please select image').show();
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
        if (!rFilter.test(oFile.type)) {
            $('.error > p').html('Please select a valid image file (jpg and png are allowed)').show();
            return;
        }

// check for file size
        if (oFile.size > 5024 * 5024) {
            $('.error > p').html('You have selected too big file, please select a one smaller image file').show();
            return;
        }
        $('#preview').show();
// preview element
        var oImage = document.getElementById('preview');

// prepare HTML5 FileReader
        var oReader = new FileReader();
        oReader.onload = function (e) {

// e.target.result contains the DataURL which we can use as a source of the image
            oImage.src = e.target.result;
            oImage.onload = function () { // onload event handler

// display step 2
                $('.step2').fadeIn(500);

// display some basic image info
                var sResultFileSize = bytesToSize(oFile.size);
                $('#filesize').val(sResultFileSize);
                $('#filetype').val(oFile.type);
                $('#filedim').val(oImage.naturalWidth + ' x ' + oImage.naturalHeight);

// Create variables (in this scope) to hold the Jcrop API and image size
                var jcrop_api, boundx, boundy;

// destroy Jcrop if it is existed
                if (typeof jcrop_api != 'undefined')
                    jcrop_api.destroy();

// initialize Jcrop
                $('#preview').Jcrop({
                    minSize: [32, 32], // min crop size
                    aspectRatio: 1, // keep aspect ratio 1:1
                    bgFade: true, // use fade effect
                    bgOpacity: .3, // fade opacity
                    onChange: updateInfo,
                    onSelect: updateInfo,
                    onRelease: clearInfo
                }, function () {

// use the Jcrop API to get the real image size
                    var bounds = this.getBounds();
                    boundx = bounds[0];
                    boundy = bounds[1];

// Store the Jcrop API in the jcrop_api variable
                    jcrop_api = this;
                });
            };
        };

// read selected file as DataURL
        oReader.readAsDataURL(oFile);
    }

</script>