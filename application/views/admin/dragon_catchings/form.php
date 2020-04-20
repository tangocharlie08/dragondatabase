<?php
if (isset($edit)) {
    $path = admin_url('dragon_catchings_management/update/' . $edit->id);
} else {
    $path = admin_url('dragon_catchings_management/save');
}
?>


<form method="post" action="<?php echo $path; ?>" role="form" onsubmit="return check_form()" enctype="multipart/form-data"> 
    <div class="panel panel-default"> 
        <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-user"></i>
                <?php
                if (isset($edit)) {
                    echo 'Edit contact id';
                } else {
                    echo 'Add catchings';
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
                        <input type="text" id="id" value="<?php echo (isset($edit->contact_id)) ? $edit->contact_id : set_value('id'); ?>" name="id" class="form-control" placeholder="Enter contact id"/>
                        <label for="id" id="contact_idError" class="error"><?php echo form_error('contact_id'); ?></label>

                         <label>Torso:</label> 
                        <input type="text" id="torso" value="<?php echo (isset($edit->torso)) ? $edit->torso : set_value('torso'); ?>" name="torso" class="form-control" placeholder="Enter Torso in cms"/>
                        <label for="jaw_width" id="jaw_widthError" class="error"><?php echo form_error('jaw_width'); ?></label>
                        <label>Jaw Width:</label> 
                        <input type="text" id="jaw_width" value="<?php echo (isset($edit->jaw_width)) ? $edit->jaw_width : set_value('jaw_width'); ?>" name="jaw_width" class="form-control" placeholder="Enter jaw width"/>
                        <label for="jaw_width" id="jaw_widthError" class="error"><?php echo form_error('jaw_width'); ?></label>
                        <label>Tail Girth:</label> 
                        <input type="text" id="tail_girth" value="<?php echo (isset($edit->tail_girth)) ? $edit->tail_girth : set_value('tail_girth'); ?>" name="tail_girth" class="form-control" placeholder="Enter tail girth"/>
                        <label for="contact_id" id="tail_girthError" class="error"><?php echo form_error('contatctid'); ?></label>
                        <label>Lower Fore Leg:</label> 
                        <select class="manufacture-dropdown" name="lower_fore_leg" >
                                <option value="" selected disabled >Select</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->lower_fore_leg == 1){ echo 'selected';}
                                }?> >Yes</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->lower_fore_leg == 0){ echo 'selected';}
                                }?> >No</option></select>
                        <label>Upper Hind Leg:</label> 
                        <select class="manufacture-dropdown" name="upper_hind_leg" >
                                <option value="" selected disabled >Select</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->upper_hind_leg == 1){ echo 'selected';}
                                }?> >Yes</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->upper_hind_leg == 0){ echo 'selected';}
                                }?> >No</option></select>
                        <label>Upper Fore Leg:</label> 
                        <select class="manufacture-dropdown" name="upper_fore_legupper_fore_leg" >
                                <option value="" selected disabled >Select</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->upper_fore_leg == 1){ echo 'selected';}
                                }?> >Yes</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->upper_fore_leg == 0){ echo 'selected';}
                                }?> >No</option></select>
                        <label>Lower Hind Leg:</label> 
                        <select class="manufacture-dropdown" name="lower_hind_leg" >
                                <option value="" selected disabled >Select</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->lower_hind_leg == 1){ echo 'selected';}
                                }?> >Yes</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->lower_hind_leg == 0){ echo 'selected';}
                                }?> >No</option></select>
                        
                        <label>Tail Length:</label> 
                        <input type="text" id="tail_length" value="<?php echo (isset($edit->tail_length)) ? $edit->tail_length : set_value('tail_length'); ?>" name="tail_length" class="form-control" placeholder="Enter tail length"/>
                        <label for="tail_length" id="tail_lengthError" class="error"><?php echo form_error('tail_length'); ?></label>
                        <label>Jaw Length:</label> 
                        <input type="text" id="Jaw_length" value="<?php echo (isset($edit->jaw_length)) ? $edit->jaw_length : set_value('Jaw_length'); ?>" name="jaw_length" class="form-control" placeholder="Enter jaw length"/>
                        <label for="jaw_length" id="jaw_lengthError" class="error"><?php echo form_error('jaw_length'); ?></label>
                        <label>Tail:</label> 
                        <select class="manufacture-dropdown" name="tail" >
                                <option value="" selected disabled >Select</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->torso == 1){ echo 'selected';}
                                }?> >Yes</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->torso == 0){ echo 'selected';}
                                }?> >No</option></select>
                        <label>Blood:</label> 
                         <select class="manufacture-dropdown" name="blood" >
                                <option value="" selected disabled >Select</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->blood == 1){ echo 'selected';}
                                }?> >Yes</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->blood == 0){ echo 'selected';}
                                }?> >No</option></select>
                        <label>Faeces:</label> 
                        <select class="manufacture-dropdown" name="faeces" >
                                <option value="" selected disabled >Select</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->faeces == 1){ echo 'selected';}
                                }?> >Yes</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->faeces == 0){ echo 'selected';}
                                }?> >No</option></select>
                        <label>Skin:</label> 
                        <select class="manufacture-dropdown" name="skin" >
                                <option value="" selected disabled >Select</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->skin == 1){ echo 'selected';}
                                }?> >Yes</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->skin == 0){ echo 'selected';}
                                }?> >No</option></select>
                        <label>Haematology :</label> 
                        <select class="manufacture-dropdown" name="haematology " >
                                <option value="" selected disabled >Select</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->haematology  == 1){ echo 'selected';}
                                }?> >Yes</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->haematology == 0){ echo 'selected';}
                                }?> >No</option></select>
                        <label>Swab Skin:</label> 
                        <select class="manufacture-dropdown" name="swab_skin" >
                                <option value="" selected disabled >Select</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->swab_skin == 1){ echo 'selected';}
                                }?> >Yes</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->swab_skin == 0){ echo 'selected';}
                                }?> >No</option></select>
                        <label>Swab Oral:</label> 
                        <select class="manufacture-dropdown" name="swab_oral" >
                                <option value="" selected disabled >Select</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->swab_oral == 1){ echo 'selected';}
                                }?> >Yes</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->swab_oral == 0){ echo 'selected';}
                                }?> >No</option></select>
                        <label>Swab Cloacal:</label> 
                        <select class="manufacture-dropdown" name="swab_cloacal" >
                                <option value="" selected disabled >Select</option>
                                <option value="1" <?php if(isset($edit)){
                                    if($edit->swab_cloacal == 1){ echo 'selected';}
                                }?> >Yes</option>
                                <option value="0" <?php if(isset($edit)){
                                    if($edit->swab_cloacal == 0){ echo 'selected';}
                                }?> >No</option></select>
                        
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

