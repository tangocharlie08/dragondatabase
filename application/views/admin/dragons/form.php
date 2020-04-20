<link href="http://hayageek.github.io/jQuery-Upload-File/uploadfile.min.css" rel="stylesheet">
<script src="http://hayageek.github.io/jQuery-Upload-File/jquery.uploadfile.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.47/jquery.form-validator.min.js"></script>
<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<?php
if (isset($edit)) {
//    debug($edit);exit;
//    debug($images);exit;
    $path = admin_url('dragon_management/update/' . $edit->id);
    $action = 'Update';
} else {
    $path = admin_url('dragon_management/save');
    $action = 'Submit';
}
?>
<style>
    #related_product label {
        width: 150px;
    }
</style>

<form  id="product_form" method="post"  role="form" enctype="multipart/form-data" action="<?php echo $path; ?>"> 
    <div class="panel panel-default"> 
        <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-user"></i>
                <?php
                if (isset($edit)) {
                    echo 'Edit dragon details';
                } else {
                    echo 'Add dragon';
                }
                ?>
            </h6>
        </div> 
        <div class="panel-body">

            <div class="form-group">
                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <b id="name_error"  style="color:red;"><?php echo form_error('name'); ?></b>
                        <label>Dragon Name:</label> 
                        <input id="name" type="text" value="<?php  echo (isset($edit)) ? $edit->name : set_value('name'); ?>" name="name" class="form-control" placeholder="Enter name"/>
                    </div>
                </div>



             
                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <b id="gender_error" style="color:red;"><?php echo form_error('gender'); ?></b>
                        <label>Gender:</label> 
                        <select id="gender" class="manufacture-dropdown" name="gender" >
                                <option value="" selected disabled >Select Gender</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->gender == 0){ echo 'selected';}
                                }?> >Female</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->gender == 1){ echo 'selected';}
                                }?> >Male</option>
                                <option value="3" <?php if(isset($edit)){
                                    if($edit->gender == 2){ echo 'selected';}
                                }?> >Unknown</option>

                        </select>
                    </div>
                </div>

                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <b id="original_id_by_error" style="color:red;"><?php echo form_error('originated_by'); ?></b>
                        <label>Original ID By:</label> 
                        <?php $users = $this->db->get('admin')->result(); ?>
                        <select id="original_id_by" class="manufacture-dropdown" name="original_id_by">
                            <option value="" selected disabled >Select who first found this dragon.</option>
                            <?php foreach ($users as $c) { ?>
                                <option value="<?php echo $c->id; ?>" <?php if(isset($edit)){
                                    if($edit->original_id_by == $c->id){ echo 'selected';}
                                }?>><?php echo $c->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div> 


                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <b id="general_location_error" style="color:red;"><?php echo form_error('general_location'); ?></b>
                        <label>General Location of Dragon:</label> 
                        <?php $locations = $this->db->get('tbl_location_dragon')->result(); ?>
                        <select id="general_location" class="manufacture-dropdown" name="general_location">
                            <option value="" selected disabled >Select the general location of dragon.</option>
                            <?php foreach ($locations as $c) { ?>
                                <option value="<?php echo $c->id; ?>" <?php if(isset($edit)){
                                    if($edit->general_location == $c->id){ echo 'selected';}
                                }?>><?php echo $c->location; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div> 

               

                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <b id="age_error" style="color:red;"><?php echo form_error('age'); ?></b>
                        <label>Age:</label> 
                        
                        <select id="age" class="manufacture-dropdown" name="age">
                            
                            <option value="" selected disabled >Select age of dragon</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->age == 1){ echo 'selected';}
                                }?> >Adult</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->age == 0){ echo 'selected';}
                                }?> >Juvenile</option>
                                
                        </select>
                    </div>
                </div> 

                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <b id="dna_error"  style="color:red;"><?php echo form_error('dna'); ?></b>
                        <label>DNA:</label> 
                        <input id="name" type="text" value="<?php  echo (isset($edit)) ? $edit->dna : set_value('dna'); ?>" name="dna" class="form-control" placeholder="Enter dna"/>
                    </div>
                </div>

                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <b id="sub_location"  style="color:red;"><?php echo form_error('sub_location'); ?></b>
                        <label>Sub Location:</label> 
                        <input id="name" type="text" value="<?php  echo (isset($edit)) ? $edit->sub_location : set_value('sub_location'); ?>" name="sub_location" class="form-control" placeholder="Enter sub_location"/>
                    </div>
                </div>

                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <b id="pit_tag"  style="color:red;"><?php echo form_error('pit_tag'); ?></b>
                        <label>PIT Tag:</label> 
                        <input id="name" type="text" value="<?php  echo (isset($edit)) ? $edit->pit_tag : set_value('pit_tag'); ?>" name="pit_tag" class="form-control" placeholder="Enter pit_tag"/>
                    </div>
                </div>

                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <b id="genotyped_sample_no"  style="color:red;"><?php echo form_error('genotyped_sample_no'); ?></b>
                        <label>Genotyped Sample No.:</label> 
                        <input id="genotyped_sample_no" type="text" value="<?php  echo (isset($edit)) ? $edit->genotyped_sample_no : set_value('genotyped_sample_no'); ?>" name="genotyped_sample_no" class="form-control" placeholder="Enter genotyped sample no"/>
                    </div>
                </div>

                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <label>Date Extracted:</label> 
                        <input id="date_extracted" type="text" value="<?php
                            if(isset($edit)){
                                if($edit->date_extracted != NULL || $edit->date_extracted != ""){

                                    echo $edit->date_extracted;
                                }
                            }else{
                                set_value('date_extracted');
                            }?>" name="date_extracted" class="form-control" placeholder="Select extracted date from calendar"/>
                        <label for="date_extracted" class="error"><?php echo form_error('date_extracted'); ?></label>
                    </div>
                </div>
                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <label>Date Genotyped:</label> 
                        <input id="date_genotyped" type="text" value="<?php
                            if(isset($edit)){
                                if($edit->date_genotyped != NULL || $edit->date_genotyped != ""){
                                    echo $edit->date_genotyped;
                                }
                            }else{
                                set_value('date_genotyped');
                            }?>" name="date_genotyped" class="form-control" placeholder="Select genotyped date from calendar"/>
                        <label for="date_genotyped" class="error"><?php echo form_error('date_genotyped'); ?></label>
                        
                    </div>
                </div>
                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <label>Date Tagged:</label> 
                        <input id="date_tagged" type="text" value="<?php
                            if(isset($edit)){
                                if($edit->date_tagged != NULL || $edit->date_tagged != ""){
                                    echo $edit->date_tagged;
                                }
                            }else{
                                set_value('date_tagged');
                            }?>" name="date_tagged" class="form-control" placeholder="Select tagged date from calendar"/>
                        <label for="date_tagged" class="error"><?php echo form_error('date_tagged'); ?></label>
                    </div>
                </div>
                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <label>Date DNA taken:</label> 
                        <input id="date_dna_taken" type="text" value="<?php
                            if(isset($edit)){
                                if($edit->date_dna_taken != NULL || $edit->date_dna_taken != ""){
                                    echo $edit->date_dna_taken;
                                }
                            }else{
                                set_value('date_dna_taken');
                            }?>" name="date_dna_taken" class="form-control" placeholder="Select DNA taken date from calendar"/>
                        <label for="date_dna_taken" class="error"><?php echo form_error('date_dna_taken'); ?></label>
                    </div>
                </div>

                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <label>Notes:</label> 
                        <textarea id="notes" name="notes" class="editor"><?php  echo (isset($edit->notes)) ? $edit->notes : set_value('notes'); ?></textarea>
                        <label for="notes" class="error"><?php echo form_error('notes'); ?></label>
                    </div>
                </div>




            </div> 


            <div class="form-actions text-right"> 
                <input name="submitForm" type="submit" value="Cancel" class="btn btn-danger"> 
                <input name="submitForm" id="submit" type="submit" value="Submit" class="btn btn-primary"> 
                <!-- <input name="submitForm" type="submit" value="Cancel" class="btn btn-danger">  -->
                <!-- <a href="" class="btn btn-success">Back</a>
                <a onclick="return validate_form()" href="#" class="btn btn-primary">Next</a> -->

            </div> 
        </div>

    </div>

</form>

<script type="text/javascript">
     $(document).ready(function () {


        $("#date_extracted").datepicker({
            dateFormat: "yy-mm-dd"               
        });

        $("#date_extracted").on('change', function () {
            var selectedDate = new Date($(this).val()).getTime();
            var todaysDate = new Date().getTime();
            if (selectedDate > todaysDate) {
                alert('Selected date must be before than today date');
                $(this).val('');
            }
        });

        $("#date_genotyped").datepicker({
            dateFormat: "yy-mm-dd",                 
            
        });
        $("#date_genotyped").on('change', function () {
            var selectedDate = new Date($(this).val()).getTime();
            var todaysDate = new Date().getTime();
            if (selectedDate > todaysDate) {
                alert('Selected date must be before than today date');
                $(this).val('');
            }
        });

        $("#date_tagged").datepicker({
            dateFormat: "yy-mm-dd",                 
            
        });
        $("#date_tagged").on('change', function () {
            var selectedDate = new Date($(this).val()).getTime();
            var todaysDate = new Date().getTime();
            if (selectedDate > todaysDate) {
                alert('Selected date must be before than today date');
                $(this).val('');
            }
        });

        $("#date_dna_taken").datepicker({
            dateFormat: "yy-mm-dd",                 
            
        });
        $("#date_dna_taken").on('change', function () {
            var selectedDate = new Date($(this).val()).getTime();
            var todaysDate = new Date().getTime();
            if (selectedDate > todaysDate) {
                alert('Selected date must be before than today date');
                $(this).val('');
            }
        });
        //var editor = new wysihtml5.Editor("wysihtml5-textarea");
    });
    
    
    // function validate_form(){
        
    //     var name = $('#name').val();
    //     var gender = $('#gender').val();
    //     var original_id_by = $('#original_id_by').val();
    //     var general_location = $('#general_location').val();
    //     var dragon_profile = $('#dragon_profile').val();
    //     var age = $('#age').val();
    //     var notes = $('#notes').val();
    //     if(name == ""){
    //         $('#name_error').html("Pleaser enter dragon name.")
    //     }else{
    //         $('#name_error').html("")
    //     }
    //     if(gender == null){
    //         $('#gender_error').html("Pleaser select dragon gender.")

    //     }else{
    //         $('#gender_error').html("")
    //     }
    //     if(original_id_by == null){
    //         $('#original_id_by_error').html("Pleaser select original ID by.")

    //     }else{
    //         $('#original_id_by_error').html("")
    //     }
    //     if(general_location == null){
    //         $('#general_location_error').html("Pleaser select general location.")

    //     }else{
    //         $('#general_location_error').html("")
    //     }
    //     if(dragon_profile == null){
    //         $('#dragon_profile_error').html("Pleaser select dragon profile.")

    //     }else{
    //         $('#dragon_profile_error').html("")
    //     }
    //     if(age == null){
    //         $('#age_error').html("Pleaser select dragon age.")

    //     }else{
    //         $('#age_error').html("")
    //     }




    // }

</script>
<style type="text/css">
b{
    display: block !important;
}   

</style>

