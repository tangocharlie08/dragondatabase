<?php
if (isset($edit)) {
    $path = admin_url('dragon_sightings_management/update/' . $edit->id);
} else {
    $path = admin_url('dragon_sightings_management/save');
}
?>


<form enctype="multipart/form-data" method="post" action="<?php echo $path; ?>" role="form"> 
    <div class="panel panel-default"> 
        <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-user"></i>
                <?php
                if (isset($edit)) {
                    echo 'Edit sightings';
                } else {
                    echo 'Add sightings';
                }
                ?>


            </h6>
        </div> 
        <div class="panel-body">
           <div class="form-group">                
                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <label>ID:</label> 
                        <input type="text" id="id" value="<?php echo (isset($edit->id)) ? $edit->id : set_value('id'); ?>" name="id" class="form-control" placeholder="Enter id"/>
                        <label for="id" id="idError" class="error"><?php echo form_error('id'); ?></label>
                        <label>Contact ID:</label> 
                        <input type="text" id="contact_id" value="<?php echo (isset($edit->contact_id)) ? $edit->contact_id : set_value('contact_id'); ?>" name="contact_id" class="form-control" placeholder="Enter contact id"/>
                        <label for="contact_id" id="contact_idError" class="error"><?php echo form_error('contact_id'); ?></label>
                        <label>Dominance:</label> 
                        <select class="manufacture-dropdown" name="dominance" >
                                <option value="" selected disabled >Select</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->dominance == 1){ echo 'selected';}
                                }?> >Yes</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->dominance == 0){ echo 'selected';}
                                }?> >No</option></select>
                        <label>Head Bob:</label> 
                        <select class="manufacture-dropdown" name="head_bob" >
                                <option value="" selected disabled >Select</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->head_bob == 1){ echo 'selected';}
                                }?> >Yes</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->head_bob == 0){ echo 'selected';}
                                }?> >No</option></select>
                        <label>Arm Wave:</label> 
                        <select class="manufacture-dropdown" name="arm_wave" >
                                <option value="" selected disabled >Select</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->arm_wave == 1){ echo 'selected';}
                                }?> >Yes</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->arm_wave == 0){ echo 'selected';}
                                }?> >No</option></select>
                        <label>Tail Slap:</label> 
                        <select class="manufacture-dropdown" name="tail_slap" >
                                <option value="" selected disabled >Select</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->tail_slap == 1){ echo 'selected';}
                                }?> >Yes</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->tail_slap == 0){ echo 'selected';}
                                }?> >No</option></select>
                                <label>CH:</label> 
                        <select class="manufacture-dropdown" name="ch" >
                                <option value="" selected disabled >Select</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->ch == 1){ echo 'selected';}
                                }?> >Yes</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->ch == 0){ echo 'selected';}
                                }?> >No</option></select>
                        <label>Fighting:</label> 
                        <select class="manufacture-dropdown" name="fighting" >
                                <option value="" selected disabled >Select</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->fighting == 1){ echo 'selected';}
                                }?> >Yes</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->fighting == 0){ echo 'selected';}
                                }?> >No</option></select>
                        <label>Eating:</label> 
                        <select class="manufacture-dropdown" name="eating" >
                                <option value="" selected disabled >Select</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->eating == 1){ echo 'selected';}
                                }?> >Yes</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->eating == 0){ echo 'selected';}
                                }?> >No</option></select>
                        <label>HB Fast:</label> 
                        <select class="manufacture-dropdown" name="hb_fast" >
                                <option value="" selected disabled >Select</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->hb_fast == 1){ echo 'selected';}
                                }?> >Yes</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->hb_fast == 0){ echo 'selected';}
                                }?> >No</option></select>
                        <label>HB Slow:</label> 
                        <select class="manufacture-dropdown" name="hb_fast" >
                                <option value="" selected disabled >Select</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->hb_slow == 1){ echo 'selected';}
                                }?> >Yes</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->hb_slow == 0){ echo 'selected';}
                                }?> >No</option></select>
                        <label>AW Left:</label> 
                        <select class="manufacture-dropdown" name="aw_left" >
                                <option value="" selected disabled >Select</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->aw_left == 1){ echo 'selected';}
                                }?> >Yes</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->aw_left == 0){ echo 'selected';}
                                }?> >No</option></select>
                        <label>AW Right:</label> 
                        <select class="manufacture-dropdown" name="aw_right" >
                                <option value="" selected disabled >Select</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->aw_right == 1){ echo 'selected';}
                                }?> >Yes</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->aw_right == 0){ echo 'selected';}
                                }?> >No</option></select>

                       <label>Fighting With Contact:</label> 
                        <select class="manufacture-dropdown" name="nesting" >
                                <option value="" selected disabled >Select</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->fighting_with_contact == 1){ echo 'selected';}
                                }?> >Yes</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->fighting_with_contact == 0){ echo 'selected';}
                                }?> >No</option></select>
                       <label>Fighting With No Contatct:</label> 
                        <select class="manufacture-dropdown" name="nesting" >
                                <option value="" selected disabled >Select</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->fighting_with_no_contact == 1){ echo 'selected';}
                                }?> >Yes</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->fighting_with_no_contact == 0){ echo 'selected';}
                                }?> >No</option></select>
                        <label>Nesting:</label> 
                        <select class="manufacture-dropdown" name="nesting" >
                                <option value="" selected disabled >Select</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->nesting == 1){ echo 'selected';}
                                }?> >Yes</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->nesting == 0){ echo 'selected';}
                                }?> >No</option></select>
                        <label>Laying:</label> 
                        <select class="manufacture-dropdown" name="laying" >
                                <option value="" selected disabled >Select</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->laying == 1){ echo 'selected';}
                                }?> >Yes</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->laying == 0){ echo 'selected';}
                                }?> >No</option></select>
                        <label>Tasting:</label> 
                        <select class="manufacture-dropdown" name="teasing" >
                                <option value="" selected disabled >Select</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->tasting == 1){ echo 'selected';}
                                }?> >Yes</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->tasting == 0){ echo 'selected';}
                                }?> >No</option></select>
                        <label>Resting:</label> 
                        <select class="manufacture-dropdown" name="resting" >
                                <option value="" selected disabled >Select</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->resting == 1){ echo 'selected';}
                                }?> >Yes</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->resting == 0){ echo 'selected';}
                                }?> >No</option></select>
                        <label>Dew Lap:</label> 
                        <select class="manufacture-dropdown" name="dew_lap" >
                                <option value="" selected disabled >Select</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->Dew_lap == 1){ echo 'selected';}
                                }?> >Yes</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->Dew_lap == 0){ echo 'selected';}
                                }?> >No</option></select>
                         <label>Body Temperature:</label> 
                        <input type="text" id="body_temp" value="<?php echo (isset($edit->body_temp)) ? $edit->body_temp : set_value('body_temp'); ?>" name="body_temp" class="form-control" placeholder="Enter body temperature in celcius"/>
                        <label for="body_temp" id="body_tempError" class="error"><?php echo form_error('body_temp'); ?></label>
                       
                       
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


    $("#preview").hide();
    function fileSelectHandler() {

        var oFile = $('#image_file')[0].files[0];

        // hide all errors
        $('.error >p').hide();
        $('.previous_img').hide();
         $("#preview").show();

        // check for image type (jpg and png are allowed)
        var rFilter = /^(image\/jpeg|image\/png)$/i;
        if (!rFilter.test(oFile.type)) {
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
