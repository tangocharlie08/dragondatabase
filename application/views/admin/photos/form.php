<link href="http://hayageek.github.io/jQuery-Upload-File/uploadfile.min.css" rel="stylesheet">
<script src="http://hayageek.github.io/jQuery-Upload-File/jquery.uploadfile.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.47/jquery.form-validator.min.js"></script>

<?php
if (isset($edit)) {
//    debug($edit);exit;
//    debug($images);exit;
    $path = admin_url('dragon_photos_management/update/' . $edit->id);
    $action = 'Update';
} else {
    $path = admin_url('dragon_photos_management/save/'. $contact_id);
    $action = 'Submit';
}
$url = admin_url();
?>
<style>
    #related_product label {
        width: 150px;
    }
</style>

<form onsubmit="return validate_form()" id="product_form" method="post" action="<?php echo $path; ?>" role="form" enctype="multipart/form-data"> 
    <div class="panel panel-default"> 
        <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-user"></i>
                <?php
                if (isset($edit)) {
                    echo 'Edit Dragons photo';
                } else {
                    echo 'Add Dragons photo';
                }
                ?>
            </h6>
        </div> 
        <div class="panel-body">
            <div class="form-group">

                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <b style="color:red;"><?php echo form_error('contact_id'); ?></b>
                        <label>Contact ID:</label> 
                        <input id="contact_id" disabled type="text" value="<?= $contact_id; ?>" name="contact_id" class="form-control" placeholder=""/>
                    </div>
                </div>

                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <b style="color:red;"><?php echo form_error('photo_id_by'); ?></b>
                        <label>Photo ID By:</label> 
                        <?php $users = $this->db->get('admin')->result(); ?>
                        <select id="photo_id_by" class="manufacture-dropdown" name="photo_id_by">
                            <option value="" selected disabled >Select who first found this dragon.</option>
                            <?php foreach ($users as $c) { ?>
                                <option value="<?php echo $c->id; ?>" <?php if(isset($edit)){
                                    if($edit->photo_id_by == $c->id){ echo 'selected';}
                                }?>><?php echo $c->initials; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>


              

                


               





               
                

                

                
               

                
               

            

            
            </div>
            <?php if (isset($edit)) { ?>
                <b style="color:blue;">Choose an image to change dragon image.</b>
            <?php } ?>
            <b style="color:red;"><?php echo ($this->session->flashdata('error')); ?></b>
            <div id="fileuploader">Upload</div>
            <div id="image_response">
                <input type="file" name="dragon_images[]" multiple id="image_file" class="styled form-control" onChange="fileSelectHandler()"/>
                <label for="image" class="error"><p></p></label>
            </div>

            <div class="col-md-12 selected_images">
            </div>
        </div> 


        <div class="form-actions text-right"> 
            <input name="submitForm" type="submit" value="Cancel" class="btn btn-danger"> 
            <input name="submitForm" id="submit" type="submit" value="<?= $action; ?>" class="btn btn-primary"> 
        </div> 
    </div>


</form>

<div class="row">
    <?php if (isset($edit)) { ?>
         <?php foreach ($images as $i) { ?>
            <div id="pic-<?= $images->id ?>" class="col-md-3">
                <div class="row">
                    <div class="previous_img">
                        <img style="float:left; padding: 20px;" src="<?php echo base_url('uploads/dragon_images/' . $images->image); ?>"/>
                    </div>
                </div>
                <div class="row" style="padding:0px 15px;" >
                    <button type="none" style="float:right;" onclick="delete_pic(<?= $images->id; ?>)">Delete</button>

                </div>
            </div>
        <?php } ?>
    <?php } ?>
</div>
</div>


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



    var imagesPreview = function (input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function (event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#image_file').on('change', function () {
        imagesPreview(this, 'div.selected_images');
    });



    




    function fileSelectHandler() {
        var length = $("#image_file")[0].files.length;

        for (var i = 0; i < length; i++) {
            var oFile = $('#image_file')[0].files[i];

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
            // if (oFile.size > 1024 * 1024) {
            //     $('.error > p').html('You have selected too big file, please select a one smaller image file').show();
            //     return;
            // }

            // preview element
            var element = document.getElementById('selected_images')
            var oImage = document.createElement("img");
            oImage.setAttribute("id", "image" + i);
            element.appendChild(oImage);

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
                    $('#image' + i).Jcrop({
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
    }


    function delete_pic(id) {


        $.ajax({
            type: "POST",
            url: '<?php echo admin_url('product_management/delete_product_pic') ?>',
            dataType: 'json',
            data: {id: id},
            success: function (data) {
                if(data.success == true){
                    $("#pic-"+data.id).css('display', 'none');
                }
            }
        });
    }

</script>
