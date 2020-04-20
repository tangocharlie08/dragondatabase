<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?php
if (isset($edit)) {
    $path = admin_url('dragon_contacts_management/update/' . $edit['contact']->id);
} else {
    $path = admin_url('dragon_contacts_management/save');
}
?>


<form method="post" action="<?php echo $path; ?>" role="form"> 
    <div class="panel panel-default"> 
        <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-user"></i>
                <?php
                if (isset($edit)) {
                    echo 'Edit Dragon Contact';
                } else {
                    echo 'Add Dragon Contact';
                }
                ?>


            </h6>
        </div> 
        <div class="panel-body">
            <div class="form-group">
                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <label>Dragon Name:</label> 
                        <?php $dragon_name = $this->db->get_where('tbl_dragons', array('id'=>$edit['contact']->dragon_id))->row()->name; ?>
                        <input disabled="true" type="text" value="<?php echo $dragon_name; ?>" name="title" class="form-control" />
                        <input name="dragon_id" type="hidden" value="<?php echo $edit['contact']->dragon_id; ?>">
                    </div>
                </div>
                


                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <label>Survey Date:</label> 
                        <input id="survey_date" type="text" value="<?php echo (isset($edit['contact']->survey_date)) ? date($edit['contact']->survey_date) : set_value('survey_date'); ?>" name="survey_date" class="form-control" placeholder="Select survey date from calendar"/>
                        
                        <label for="survey_date" class="error"></label>
                        

                    </div>
                </div>
                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <label>Time:</label> 
                        <input id="time" value="<?php echo (isset($edit['contact']->time)) ? $edit['contact']->time : set_value('time'); ?>" name="time" class="form-control" placeholder="Enter time" />
                        <label for="time" class="error"><?php echo form_error('time'); ?></label>
                    </div>
                </div>
                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <label>Latitude:</label> 
                        <input id="lat" value="<?php echo (isset($edit['contact']->lat)) ? $edit['contact']->lat : set_value('lat'); ?>" name="lat" class="form-control" placeholder="Enter latitude" min="-90" max="90" step="any"/>
                        <label for="lat" class="error"><?php echo form_error('lat'); ?></label>
                    </div>
                </div>
                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <label>Longituted:</label> 
                        <input id="lon" value="<?php echo (isset($edit['contact']->lon)) ? $edit['contact']->lon : set_value('lon'); ?>" name="lon" class="form-control" placeholder="Enter longitude" min="-180" max="180" step="any"/>
                        <label for="lon" class="error"><?php echo form_error('lon'); ?></label>
                    </div>
                </div>
                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <label>Sub Location:</label> 
                        <input type="text" value="<?php echo (isset($edit['contact']->sub_location)) ? $edit['contact']->sub_location : set_value('sub_location'); ?>" name="sub_location" class="form-control" placeholder="Enter sub location"/>
                        <label for="sub_location" class="error"><?php echo form_error('sub_location'); ?></label>
                    </div>
                </div>
                <?php if(!isset($edit)){ ?>

                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-12">
                            <b style="color:red;"><?php echo form_error('contact_type'); ?></b>
                            <label>Contact Type:</label> 
                            <select id="contact_type" class="manufacture-dropdown" name="contact_type" >
                                    <option value="" selected="selected" disabled >Select Contact Type</option>
                                    <option value="0" <?php echo set_select('contact_type', 0); ?> >Sighting</option>
                                    <option value="1" <?php echo set_select('contact_type', 1); ?>>Catching</option>
                                    

                            </select>
                        </div>
                    </div>
                <?php }else{ ?>
                    <input type="hidden" name="contact_type" value="<?php echo $edit['contact']->contact_type; ?>">

                <?php } ?>

                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <b style="color:red;"><?php echo form_error('habitat_type'); ?></b>
                        <label>Habitat Type:</label> 
                        <select class="manufacture-dropdown" name="habitat_type" >
                                <option value="" selected disabled >Select Habitat Type</option>
                                <?php if(!empty($habitat_types)) { ?>
                                    <?php foreach($habitat_types as $h) { ?>
                                        <option value="<?php echo $h->id; ?>" <?php if(isset($edit['contact'])){
                                            if($edit['contact']->habitat_type == $h->id){ echo 'selected';}
                                        }else{echo set_select('habitat_type', $h->id, TRUE);}?> ><?php echo $h->type; ?></option>
                                    <?php } ?>
                                <?php } ?>
                               
                                

                        </select>
                    </div>
                </div>

                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <b style="color:red;"><?php echo form_error('field_record_by'); ?></b>
                        <label>Field Record By:</label> 
                        <select class="manufacture-dropdown" name="field_record_by" >
                                <option value="" selected disabled >Select Field Record By</option>
                                <?php if(!empty($users)) { ?>
                                    <?php foreach($users as $h) { ?>
                                        <option value="<?php echo $h->id; ?>" <?php if(isset($edit['contact'])){
                                            if($edit['contact']->field_record_by == $h->id){ echo 'selected';}
                                        }else{echo set_select('field_record_by', $h->id, TRUE); }?> ><?php echo $h->name; ?></option>
                                    <?php } ?>
                                <?php } ?>
                               
                                

                        </select>
                    </div>
                </div>

                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <b style="color:red;"><?php echo form_error('diseased'); ?></b>
                        <label>Diseased:</label> 
                        <select class="manufacture-dropdown" name="diseased" >
                                <option value="" selected disabled >Select Yes or No</option>
                                <option value="1" <?php if(isset($edit['contact'])){
                                    if($edit['contact']->diseased == 1){ echo 'selected';}
                                }else{echo set_select('diseased', '1', TRUE);}?> >Yes</option>
                                <option value="0" <?php if(isset($edit['contact'])){
                                    if($edit['contact']->diseased == 0){ echo 'selected';}
                                }else{echo set_select('diseased', '0', TRUE); }?> >No</option>
                                

                        </select>
                    </div>
                </div>


                <?php  { ?>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-12">
                            <b style="color:red;"><?php echo form_error('gravid'); ?></b>
                            <label>Gravid:</label> 
                            <select class="manufacture-dropdown" name="gravid" >
                                    <option value="" selected disabled >Select Yes or No</option>
                                    <option value="1" <?php if(isset($edit['contact'])){
                                        if($edit['contact']->gravid == 1){ echo 'selected';}
                                    }else{echo set_select('gravid', '1', TRUE); } ?> >Yes</option>
                                    <option value="0" <?php if(isset($edit['contact'])){
                                        if($edit['contact']->gravid == 0){ echo 'selected';}
                                    }else{echo set_select('gravid', '0', TRUE); }?> >No</option>
                                    

                            </select>
                        </div>
                    </div>
                <?php } ?>



                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <label>Notes:</label> 
                        <div class="block-inner">
                            <textarea class="editor" name="notes"><?php echo (isset($edit['contact']->notes)) ? $edit['contact']->notes : set_value('notes'); ?></textarea>
                        </div>
                        <label for="notes" class="error"><?php echo form_error('notes'); ?></label>
                    </div>

                </div>
                <?php if(isset($edit)) { ?>
                    <?php if($edit['contact']->contact_type == 1) { ?>

                        <div class="cathings">
                            <input type="hidden" name="catching_id" value="<?php echo $edit['catchings']->id; ?>">

                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Jaw Width:</label> 
                                    <input type="text" id="jaw_width" value="<?php echo (isset($edit['catchings']->jaw_width)) ? $edit['catchings']->jaw_width : set_value('jaw_width'); ?>" name="jaw_width" class="form-control" placeholder="Enter jaw width"/>
                                    <label for="jaw_width" id="jaw_widthError" class="error"><?php echo form_error('jaw_width'); ?></label>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Tail Girth:</label> 
                                    <input type="text" id="tail_girth" value="<?php echo (isset($edit['catchings']->tail_girth)) ? $edit['catchings']->tail_girth : set_value('tail_girth'); ?>" name="tail_girth" class="form-control" placeholder="Enter tail girth"/>
                                    <label for="contact_id" id="tail_girthError" class="error"><?php echo form_error('contatctid'); ?></label>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Lower Fore Leg:</label> 
                                    <select class="manufacture-dropdown" name="lower_fore_leg" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($edit['catchings'])){
                                                if($edit['catchings']->lower_fore_leg == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit['catchings'])){
                                                if($edit['catchings']->lower_fore_leg == 0){ echo 'selected';}
                                            }?> >No</option>
                                    </select>
                                </div>
                            </div>
                             <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Upper Hind Leg:</label> 
                                    <select class="manufacture-dropdown" name="upper_hind_leg" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($edit['catchings'])){
                                                if($edit['catchings']->upper_hind_leg == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit['catchings'])){
                                                if($edit['catchings']->upper_hind_leg == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            
                             <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Upper Fore Leg:</label> 
                                    <select class="manufacture-dropdown" name="upper_fore_leg" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($edit['catchings'])){
                                                if($edit['catchings']->upper_fore_leg == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit['catchings'])){
                                                if($edit['catchings']->upper_fore_leg == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                             <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Lower Hind Leg:</label> 
                                    <select class="manufacture-dropdown" name="lower_hind_leg" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($edit['catching'])){
                                                if($edit['catching']->lower_hind_leg == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit['catching'])){
                                                if($edit['catching']->lower_hind_leg == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Tail Length:</label> 
                                    <input type="text" id="tail_length" value="<?php echo (isset($edit['catching']->tail_length)) ? $edit['catching']->tail_length : set_value('tail_length'); ?>" name="tail_length" class="form-control" placeholder="Enter tail length"/>
                                    <label for="tail_length" id="tail_lengthError" class="error"><?php echo form_error('tail_length'); ?></label>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Jaw Length:</label> 
                                    <input type="text" id="Jaw_length" value="<?php echo (isset($edit['catching']->jaw_length)) ? $edit['catching']->jaw_length : set_value('Jaw_length'); ?>" name="jaw_length" class="form-control" placeholder="Enter jaw length"/>
                                    <label for="jaw_length" id="jaw_lengthError" class="error"><?php echo form_error('jaw_length'); ?></label>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Tail:</label> 
                                    <select class="manufacture-dropdown" name="tail" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($edit['catching'])){
                                                if($edit['catching']->tail == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit['catching'])){
                                                if($edit['catching']->tail == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                             <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Blood:</label> 
                                    <select class="manufacture-dropdown" name="blood" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($edit['catching'])){
                                                if($edit['catching']->blood == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit['catching'])){
                                                if($edit['catching']->blood == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Faeces:</label> 
                                    <select class="manufacture-dropdown" name="face" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($edit['catching'])){
                                                if($edit['catching']->faeces== 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit['catching'])){
                                                if($edit['catching']->faeces == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Skin:</label> 
                                    <select class="manufacture-dropdown" name="skin" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($edit['catching'])){
                                                if($edit['catching']->skin == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit['catching'])){
                                                if($edit['catching']->skin == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Heamatology :</label> 
                                    <select class="manufacture-dropdown" name="heamatology " >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($edit['catching'])){
                                                if($edit['catching']->heamatology  == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit['catching'])){
                                                if($edit['catching']->heamatology == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Swab Skin:</label> 
                                    <select class="manufacture-dropdown" name="swab_skin" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($edit['catching'])){
                                                if($edit['catching']->swab_skin == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit['catching'])){
                                                if($edit['catching']->swab_skin == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Swab Oral:</label> 
                                    <select class="manufacture-dropdown" name="swab_oral" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($edit['catching'])){
                                                if($edit['catching']->swab_oral == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit['catching'])){
                                                if($edit['catching']->swab_oral == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Swab Cloacal:</label> 
                                    <select class="manufacture-dropdown" name="swab_cloacal" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($edit['catching'])){
                                                if($edit['catching']->swab_cloacal == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit['catching'])){
                                                if($edit['catching']->swab_cloacal == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                <?php }else{ ?>
                       <!--  <input type="hidden" name="sighting_id" value="<?php //echo $edit['sighting']->id; ?>">
 -->
                        <div class="sightings">
                           <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Dominance:</label> 
                                    <select class="manufacture-dropdown" name="dominance" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->dominance == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->dominance == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Head Bob :</label> 
                                    <select class="manufacture-dropdown" name="head_bob" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->head_bob == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->head_bob== 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Arm Wave:</label> 
                                    <select class="manufacture-dropdown" name="arm_wave" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->arm_wave == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->arm_wave == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Tail Slap:</label> 
                                    <select class="manufacture-dropdown" name="tail_slap" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->tail_slap == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->tail_slap == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>CH:</label> 
                                    <select class="manufacture-dropdown" name="ch" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->ch == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->ch == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Fighting:</label> 
                                    <select class="manufacture-dropdown" name="fighting" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->fighting == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->fighting == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Eating:</label> 
                                    <select class="manufacture-dropdown" name="eating" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->eating == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->eating == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Head Bob Fast:</label> 
                                    <select class="manufacture-dropdown" name="hb_fast" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->hb_fast == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->hb_fast == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Head Bob Slow:</label> 
                                    <select class="manufacture-dropdown" name="hb_slow" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->hb_slow == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->hb_slow == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Arm Wave Left:</label> 
                                    <select class="manufacture-dropdown" name="aw_left" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->aw_left == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->aw_left == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Arm Wave Right:</label> 
                                    <select class="manufacture-dropdown" name="aw_right" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->aw_right == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->aw_right == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Fighting With Contact:</label> 
                                    <select class="manufacture-dropdown" name="fighting_with_contact" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->fighting_with_contact == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->fighting_with_contact == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Fighting With No Contact:</label> 
                                    <select class="manufacture-dropdown" name="fighting_with_no_contact" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->fighting_with_no_contact == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->fighting_with_no_contact == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Nesting:</label> 
                                    <select class="manufacture-dropdown" name="nesting" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->nesting== 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->nesting == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Laying:</label> 
                                    <select class="manufacture-dropdown" name="laying" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->laying == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->laying == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Tasting:</label> 
                                    <select class="manufacture-dropdown" name="tasting" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->tasting == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->tasting == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Resting:</label> 
                                    <select class="manufacture-dropdown" name="resting" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->dominance == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->dominance == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Dew Lap:</label> 
                                    <select class="manufacture-dropdown" name="dew_lap" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->dew_lap == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit['sighting'])){
                                                if($edit['sighting']->dew_lap == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                             <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Body Temp:</label> 
                                    <input type="text" id="body_temp" value="<?php echo (isset($edit['sighting']->body_temp)) ?
                                     $edit['sighting']->body_temp : set_value('body_temp'); ?>" name="body_temp" class="form-control" placeholder="Enter body temperature"/>
                                    <label for="body_temp" id="body_tempError" class="error"><?php echo form_error('body_temp'); ?></label>
                                </div>
                            </div>
                        </div>                                      
                    <?php } ?>
                <?php }else{ ?>
                        <div style="display: none;" class="add-cathings">
                      

                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Jaw Width:</label> 
                                    <input type="text" id="jaw_width" value="<?php echo (isset($catching->jaw_width)) ? $catching->jaw_width : set_value('jaw_width'); ?>" name="jaw_width" class="form-control" placeholder="Enter jaw width"/>
                                    <label for="jaw_width" id="jaw_widthError" class="error"><?php echo form_error('jaw_width'); ?></label>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Tail Girth:</label> 
                                    <input type="text" id="tail_girth" value="<?php echo (isset($edit->tail_girth)) ? $edit->tail_girth : set_value('tail_girth'); ?>" name="tail_girth" class="form-control" placeholder="Enter tail girth"/>
                                    <label for="contact_id" id="tail_girthError" class="error"><?php echo form_error('contatctid'); ?></label>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Lower Fore Leg:</label> 
                                    <select class="manufacture-dropdown" name="lower_fore_leg" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($catching)){
                                                if($catching->lower_fore_leg == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($catching)){
                                                if($catching->lower_fore_leg == 0){ echo 'selected';}
                                            }?> >No</option>
                                    </select>
                                </div>
                            </div>
                             <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Upper Hind Leg:</label> 
                                    <select class="manufacture-dropdown" name="upper_hind_leg" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($catching)){
                                                if($catching->upper_hind_leg == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit)){
                                                if($catching->upper_hind_leg == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            
                             <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Upper Fore Leg:</label> 
                                    <select class="manufacture-dropdown" name="upper_fore_leg" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($catching)){
                                                if($catching->upper_fore_leg == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($catching)){
                                                if($catching->upper_fore_leg == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                             <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Lower Hind Leg:</label> 
                                    <select class="manufacture-dropdown" name="lower_hind_leg" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($catching)){
                                                if($catching->lower_hind_leg == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($edit)){
                                                if($catching->lower_hind_leg == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Tail Length:</label> 
                                    <input type="text" id="tail_length" value="<?php echo (isset($edit->tail_length)) ? $edit->tail_length : set_value('tail_length'); ?>" name="tail_length" class="form-control" placeholder="Enter tail length"/>
                                    <label for="tail_length" id="tail_lengthError" class="error"><?php echo form_error('tail_length'); ?></label>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Jaw Length:</label> 
                                    <input type="text" id="Jaw_length" value="<?php echo (isset($catching->jaw_length)) ? $catching->jaw_length : set_value('Jaw_length'); ?>" name="jaw_length" class="form-control" placeholder="Enter jaw length"/>
                                    <label for="jaw_length" id="jaw_lengthError" class="error"><?php echo form_error('jaw_length'); ?></label>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Tail:</label> 
                                    <select class="manufacture-dropdown" name="tail" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($catching)){
                                                if($catching->tail == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($catching)){
                                                if($catching->tail == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                             <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Blood:</label> 
                                    <select class="manufacture-dropdown" name="blood" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($catching)){
                                                if($catching->blood == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($catching)){
                                                if($catching->blood == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Faeces:</label> 
                                    <select class="manufacture-dropdown" name="face" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($catching)){
                                                if($catching->faeces== 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($catching)){
                                                if($catching->faeces == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Skin:</label> 
                                    <select class="manufacture-dropdown" name="skin" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($catching)){
                                                if($catching->skin == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($catching)){
                                                if($catching->skin == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Heamatology :</label> 
                                    <select class="manufacture-dropdown" name="heamatology " >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($catching)){
                                                if($catching->heamatology  == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($catching)){
                                                if($catching->heamatology == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Swab Skin:</label> 
                                    <select class="manufacture-dropdown" name="swab_skin" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($catching)){
                                                if($catching->swab_skin == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($catching)){
                                                if($catching->swab_skin == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Swab Oral:</label> 
                                    <select class="manufacture-dropdown" name="swab_oral" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($catching)){
                                                if($catching->swab_oral == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($catching)){
                                                if($catching->swab_oral == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Swab Cloacal:</label> 
                                    <select class="manufacture-dropdown" name="swab_cloacal" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($catching)){
                                                if($catching->swab_cloacal == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($catching)){
                                                if($catching->swab_cloacal == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div style="display: none;" class="add-sightings">
                           <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Dominance:</label> 
                                    <select class="manufacture-dropdown" name="dominance" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($sighting)){
                                                if($sighting->dominance == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($sighting)){
                                                if($sighting->dominance == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Head Bob :</label> 
                                    <select class="manufacture-dropdown" name="head_bob" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($sighting)){
                                                if($sighting->head_bob == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($sighting)){
                                                if($sighting->head_bob== 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Arm Wave:</label> 
                                    <select class="manufacture-dropdown" name="arm_wave" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($sighting)){
                                                if($sighting->arm_wave == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($sighting)){
                                                if($sighting->arm_wave == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Tail Slap:</label> 
                                    <select class="manufacture-dropdown" name="tail_slap" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($sighting)){
                                                if($sighting->tail_slap == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($sighting)){
                                                if($sighting->tail_slap == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>CH:</label> 
                                    <select class="manufacture-dropdown" name="ch" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($sighting)){
                                                if($sighting->ch == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($sighting)){
                                                if($sighting->ch == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Fighting:</label> 
                                    <select class="manufacture-dropdown" name="fighting" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($sighting)){
                                                if($sighting->fighting == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($sighting)){
                                                if($sighting->fighting == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Eating:</label> 
                                    <select class="manufacture-dropdown" name="eating" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($sighting)){
                                                if($sighting->eating == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($sighting)){
                                                if($sighting->eating == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Head Bob Fast:</label> 
                                    <select class="manufacture-dropdown" name="hb_fast" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($sighting)){
                                                if($sighting->hb_fast == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($sighting)){
                                                if($sighting->hb_fast == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Head Bob Slow:</label> 
                                    <select class="manufacture-dropdown" name="hb_slow" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($sighting)){
                                                if($sighting->hb_slow == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($sighting)){
                                                if($sighting->hb_slow == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Arm Wave Left:</label> 
                                    <select class="manufacture-dropdown" name="aw_left" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($sighting)){
                                                if($sighting->aw_left == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($sighting)){
                                                if($sighting->aw_left == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Arm Wave Right:</label> 
                                    <select class="manufacture-dropdown" name="aw_right" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($sighting)){
                                                if($sighting->aw_right == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($sighting)){
                                                if($sighting->aw_right == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Fighting With Contact:</label> 
                                    <select class="manufacture-dropdown" name="fighting_with_contact" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($sighting)){
                                                if($sighting->fighting_with_contact == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($sighting)){
                                                if($sighting->fighting_with_contact == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Fighting With No Contact:</label> 
                                    <select class="manufacture-dropdown" name="fighting_with_no_contact" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($sighting)){
                                                if($sighting->fighting_with_no_contact == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($sighting)){
                                                if($sighting->fighting_with_no_contact == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Nesting:</label> 
                                    <select class="manufacture-dropdown" name="nesting" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($sighting)){
                                                if($sighting->nesting== 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($sighting)){
                                                if($sighting->nesting == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Laying:</label> 
                                    <select class="manufacture-dropdown" name="laying" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($sighting)){
                                                if($sighting->laying == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($sighting)){
                                                if($sighting->laying == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Tasting:</label> 
                                    <select class="manufacture-dropdown" name="tasting" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($sighting)){
                                                if($sighting->tasting == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($sighting)){
                                                if($sighting->tasting == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Resting:</label> 
                                    <select class="manufacture-dropdown" name="resting" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($sighting)){
                                                if($sighting->dominance == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($sighting)){
                                                if($sighting->dominance == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Dew Lap:</label> 
                                    <select class="manufacture-dropdown" name="Dew_lap" >
                                            <option value="" selected disabled >Select</option>
                                            <option value="1" <?php if(isset($sighting)){
                                                if($sighting->Dew_lap == 1){ echo 'selected';}
                                            }?> >Yes</option>
                                            <option value="0" <?php if(isset($sighting)){
                                                if($sighting->Dew_lap == 0){ echo 'selected';}
                                            }?> >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                             <div class="row" style="margin-top: 15px;">
                                <div class="col-md-12">
                                    <label>Body Temp:</label> 
                                    <input type="text" id="body_temp" value="<?php echo (isset($sighting->body_temp)) ?
                                     $sighting->body_temp : set_value('body_temp'); ?>" name="body_temp" class="form-control" placeholder="Enter body temperature"/>
                                    <label for="body_temp" id="body_tempError" class="error"><?php echo form_error('body_temp'); ?></label>
                                </div>
                            </div>
                        </div> 

                <?php } ?>
            </div>
                                   

            <div class="form-actions text-right"> 
                <input name="submitForm" type="submit" value="Cancel" class="btn btn-danger"> 
                <input name="submitForm" id="submit" type="submit" value="Submit" class="btn btn-primary"> 
            </div> 
        <!-- </div> -->

    </div>

</form>

<script>
    $(document).ready(function () {
        $("#survey_date").datepicker({
            dateFormat: "yy-mm-dd",                 
            
        });
        $("#survey_date").on('change', function () {
            var selectedDate = new Date($(this).val()).getTime();
            var todaysDate = new Date().getTime();
            if (selectedDate > todaysDate) {
                alert('Selected date must be before than today date');
                $(this).val('');
            }
        });

        

        //var editor = new wysihtml5.Editor("wysihtml5-textarea");
    });

    $('#contact_type').change(function() {
        if($(this).val()  == 0){
            $(".add-cathings").css('display','none');
            $(".add-sightings").css('display','block');
        }else{
            $(".add-cathings").css('display','block');
            $(".add-sightings").css('display','none');
        }
     });

</script>

