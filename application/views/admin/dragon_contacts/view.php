<aside class="right-side">                
    <!-- Content Header (Page header) -->
   <?php if ($this->session->flashdata('message')) { ?>
        <div class="breadcrumb-line">
            <p class="breadcrumb" style="color: green; font-weight: bold;">
                <?php echo $this->session->flashdata('message'); ?>
            </p>
        </div>
    <?php } ?>

    <!-- Main content -->
    <section class="content">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Attributes</th>
                <th scope="col">Value</th>
              
              
            </tr>
            </thead>
            <tbody>
            <tr>
              <th scope="row">Id</th>
              <td><?php echo $detail['contact']->id; ?></td>
            </tr>
            <tr>
              <th scope="row">Survey Date</th>
              <td><?php echo $detail['contact']->survey_date; ?></td>
            </tr>
            <tr>
              <th scope="row">Latitude</th>
              <td><?php echo $detail['contact']->lat; ?></td>
            </tr>
            <tr>
              <th scope="row">Longitude</th>
              <td><?php echo $detail['contact']->lon; ?></td>
            </tr>
            <tr>
              <th scope="row">Sub Location</th>
              <td><?php echo $detail['contact']->sub_location; ?></td>
            </tr>
            <tr>
              <th scope="row">Notes</th>
              <td><?php echo $detail['contact']->notes; ?></td>
            </tr>
            <tr>
              <th scope="row">Contact Type</th>
              <td><?php if($detail['contact']->contact_type == 0){echo "Sighting";}else{echo "Catching";} ?></td>
            </tr>
            <tr>
              <th scope="row">Habitat Type</th>
              <td><?php echo $detail['contact']->habitat_type; ?></td>
            </tr>
            <tr>
                <?php $field_record_by = $this->db->get_where('admin', array("id" => $detail['contact']->field_record_by))->row(); ?>
              <th scope="row">Field Record By</th>
              <td><?php if(!empty($field_record_by)){echo $field_record_by->name;} ?></td>
            </tr>
            <tr>
                <?php $data_entry_by = $this->db->get_where('admin', array("id" => $detail['contact']->data_entry_by))->row(); ?>
              <th scope="row">Data Entry By</th>
              <td><?php if(!empty($data_entry_by)){echo $data_entry_by->name;} ?></td>
            </tr>
            <tr>
              <th scope="row">Diseased</th>
              <td><?php if($detail['contact']->diseased == 0){echo "No";}else{echo "Yes";} ?></td>
            </tr>
            <tr>
              <th scope="row">Gravid</th>
              <td><?php if($detail['contact']->gravid == 0){echo "No";}else{echo "Yes";} ?></td>
            </tr>
            <!-- <tr>
              <th scope="row">Created:</th>
              <td><?php //echo  $detail['contact']->created; ?></td>
            </tr> -->
            <?php if($detail['contact']->contact_type == 0) { ?>
            
            <tr>
              <th scope="row">Dominance</th>
              <td><?php if($detail['sightings']->dominance == 0){echo "No";}else{echo "Yes";} ?></td>
            </tr>
            <tr>
              <th scope="row">Head Bob</th>
              <td><?php if($detail['sightings']->head_bob == 0){echo "No";}else{echo "Yes";} ?></td>
            </tr>
            <tr>
              <th scope="row">Arm Wave</th>
              <td><?php if($detail['sightings']->arm_wave == 0){echo "No";}else{echo "Yes";} ?></td>
            </tr>
            <tr>
              <th scope="row">Tail Slap</th>
              <td><?php if($detail['sightings']->tail_slap == 0){echo "No";}else{echo "Yes";} ?></td>
            </tr>
            <tr>
              <th scope="row">CH</th>
              <td><?php if($detail['sightings']->ch == 0){echo "No";}else{echo "Yes";} ?></td>
            </tr>
             <tr>
              <th scope="row">Fighting</th>
              <td><?php if($detail['sightings']->fighting == 0){echo "No";}else{echo "Yes";} ?></td>
            </tr>
             <tr>
              <th scope="row">Eating</th>
              <td><?php if($detail['sightings']->eating == 0){echo "No";}else{echo "Yes";} ?></td>
            </tr>
              <tr>
              <th scope="row">Head Bob Fast</th>
              <td><?php if($detail['sightings']->hb_fast == 0){echo "No";}else{echo "Yes";} ?></td>
            </tr>
             <tr>
              <th scope="row">Head Bob Slow</th>
              <td><?php if($detail['sightings']->hb_slow== 0){echo "No";}else{echo "Yes";} ?></td>
            </tr>
              <tr>
              <th scope="row">Arm Wave Left</th>
              <td><?php if($detail['sightings']->aw_left == 0){echo "No";}else{echo "Yes";} ?></td>
            </tr>
              <tr>
              <th scope="row">Arm Wave Right</th>
              <td><?php if($detail['sightings']->aw_right == 0){echo "No";}else{echo "Yes";} ?></td>
            </tr>
              <tr>
              <th scope="row">Fighting With Contact</th>
              <td><?php if($detail['sightings']->fighting_with_contact == 0){echo "No";}else{echo "Yes";} ?>
              </td>
            </tr>
              <tr>
              <th scope="row">Fighting With No Contact</th>
              <td><?php if($detail['sightings']->fighting_with_no_contact == 0){echo "No";}else{echo "Yes";} ?></td>
            </tr>
              <tr>
              <th scope="row">Nesting</th>
              <td><?php if($detail['sightings']->nesting == 0){echo "No";}else{echo "Yes";} ?></td>
            </tr>
              <tr>
              <th scope="row">Laying</th>
              <td><?php if($detail['sightings']->laying== 0){echo "No";}else{echo "Yes";} ?></td>
            </tr>
             <tr>
              <th scope="row">Tasting</th>
              <td><?php if($detail['sightings']->tasting == 0){echo "No";}else{echo "Yes";} ?></td>
            </tr>
             <tr>
              <th scope="row">Resting</th>
              <td><?php if($detail['sightings']->resting == 0){echo "No";}else{echo "Yes";} ?></td>
            </tr>
             <tr>
              <th scope="row">Dew Lap</th>
              <td><?php if($detail['sightings']->dew_lap == 0){echo "No";}else{echo "Yes";} ?></td>
            </tr>
            <tr>
              <th scope="row">Body Temperature</th>
              <td><?php echo $detail['sightings']->body_temp; ?></td>
            </tr>
            
             
            
             <?php }else{ ?>
            
              <th scope="row">Torso</th>
              <td><?php echo $detail['catchings']->torso; ?></td>
            </tr>
            <tr>
                    <th scope="row">Jaw Width:</th>
                <td><?php echo  $detail['catchings']->jaw_width; ?></td>
            </tr>
             <tr>
                    <th scope="row">Tail Girth:</th>
                <td><?php echo $detail['catchings']->tail_girth ?></td>
            </tr>
             <tr>
              <th scope="row">Lower Fore Leg</th>
              <td><?php if($detail['catchings']->lower_fore_leg == 0){echo "No";}else{echo "Yes";} ?></td>
            </tr>
             <tr>
              <th scope="row">Upper Hind Leg</th>
              <td><?php if($detail['catchings']->upper_hind_leg == 0){echo "No";}else{echo "Yes";} ?></td>
            </tr>
            <tr>
              <th scope="row">Upper Fore Leg</th>
              <td><?php if($detail['catchings']->upper_fore_leg == 0){echo "No";}else{echo "Yes";} ?></td>
            </tr>
            
             <tr>
              <th scope="row">Lowe Hind Leg</th>
              <td><?php if($detail['catchings']->lower_hind_leg == 0){echo "No";}else{echo "Yes";} ?></td>
            </tr>
            <tr>
                    <th scope="row">Tail Length:</th>
                <td><?php echo  $detail['catchings']->tail_length; ?></td>
            </tr>
            <tr>
                    <th scope="row">Jaw Length:</th>
                <td><?php echo  $detail['catchings']->jaw_length; ?></td>
            </tr>
            <tr>
              <th scope="row">Tail</th>
              <td><?php if($detail['catchings']->tail == 0){echo "No";}else{echo "Yes";} ?></td>
            </tr>
            <tr>
              <th scope="row">Blood</th>
              <td><?php if($detail['catchings']->blood == 0){echo "No";}else{echo "Yes";} ?></td>
            </tr>
             <tr>
              <th scope="row">Faeces</th>
              <td><?php if($detail['catchings']->faeces == 0){echo "No";}else{echo "Yes";} ?></td>
            </tr>
            <tr>
              <th scope="row">Skin</th>
              <td><?php if($detail['catchings']->skin == 0){echo "No";}else{echo "Yes";} ?></td>
            </tr>
             <tr>
              <th scope="row">Heamatology</th>
              <td><?php if($detail['catchings']->heamatology == 0){echo "No";}else{echo "Yes";} ?></td>
            </tr>
             <tr>
              <th scope="row">Swab Skin</th>
              <td><?php if($detail['catchings']->swab_skin == 0){echo "No";}else{echo "Yes";} ?></td>
            </tr>
             <tr>
              <th scope="row">Swab Oral</th>
              <td><?php if($detail['catchings']->swab_oral == 0){echo "No";}else{echo "Yes";} ?></td>
            </tr>
             <tr>
              <th scope="row">Swab Cloacal</th>
              <td><?php if($detail['catchings']->swab_cloacal == 0){echo "No";}else{echo "Yes";} ?></td>
            </tr>
            </tr>
             <tr>
              <th scope="row">Photos</th>
              <td>
                <div style="width: 100%;" class="row">
                  <?php foreach ($detail['photos'] as $i) { ?>
                      <div id="pic-<?php echo $i->id; ?>" class="col-md-3">
                          <div style="width: 100%; margin: 0px;" class="row">

                             
                              <div class="previous_img">
                                
                                  <img style="width: 100%;" style="float:left; padding: 20px;" src="<?php echo base_url('uploads/dragon_images/' . $i->image); ?>"/>
                              </div>
                          </div>
                          <div class="row" style="text-align:center; padding:0px;" >

                              <button type="none" style="" onclick="delete_pic(<?php echo $i->id ?>)">Delete</button>

                          </div>
                      </div>
                 <?php } ?>
  </div>
              </td>
            </tr>
            
           

            <?php } ?>
             
            </tbody>
        </table>


    </section><!-- /.content -->

    <div class="row" style="padding: 20px; margin: 0px; margin-top: -30px;">

    </div>

    <!--<div class="panel panel-default"> 
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-user"></i>Dragon Details</h6>
        <h6 class="panel-title pull-right">
<a href="<?php echo admin_url('dragon_contacts_management/add/'.$detail->id) ?>">
                <i class="icon-plus"></i>               
            </a>                                
        </h6>
    </div> 
    <div class="table-responsive"> 
        <?php if($detail->contact_type == 0) {?>
        <table class="table table-striped table-bordered"> 
            <thead> 
                <tr> 
                    <th>ID</th>
                    <th>Dominance</th> 
                    
                    <th>Head Bob</th>
                    <th>Arm Wave</th>
                    <th>Tail Slap</th>
                    <th>CH</th>
                    <th>Fighting</th>
                    <th>Eating</th>
                    <th>HB Fast</th>
                    <th>HB Slow</th>
                    <th>AW Left</th>
                    <th>AW Right</th>
                    <th>Fighting With Contact</th>
                    <th>Fighting With No Contact</th>
                    <th>Nesting</th>
                    <th>Laying</th>
                    <th>Teasing</th>
                    <th>Resting</th>
                    <th>Dew Lap</th>
                    <th>Created</th>

                    <th>Action</th>
                </tr> 
            </thead> 
            <tbody>
                <?php
                if (count($sighting) != 0) {
                    foreach ($sighting as $d) {
                        ?>
                        <tr> 
                            <td><?php echo $d->id ?></td>                    
                            <td><?php echo $d->dragon_name; ?></td>         
                            <td><?php echo date('Y-m-d h:i a', $d->survey_date); ?></td> 
                            <td><?php echo $d->lat; ?></td>                 
                            <td><?php echo $d->lon; ?></td> 
                            <td><?php echo $d->sub_location; ?></td>                   
                            <td><?php echo $d->notes; ?></td>
                            <td><?php if($d->contact_type == 1){echo "Catching";}else{echo "Sighting";} ?></td>                    
                            <td><?php echo $d->habitat; ?></td>
                            <td><?php echo $d->field_recorded_by; ?></td>
                            <td><?php echo $d->data_entred_by; ?></td>
                            <td><?php if($d->diseased == 1){echo "Yes";}else{echo "No";} ?></td>
                            <td><?php if($d->gravid == 1){echo "Yes";}else{echo "No";} ?></td>
                            <td><?php echo date('Y-m-d h:i a', $d->created); ?></td>                     
                                                 
                            <td> 
                                <a class="btn btn-default btn-icon btn-xs tip" href="<?php echo admin_url('dragon_contacts_management/view/' . $d->id) ?>"><i class="icon-eye"></i></a> 

                                <a data-original-title="Edit" href="<?php echo admin_url('dragon_contacts_management/edit/' . $d->id .'/'. $d->dragon_id); ?>" class="btn btn-default btn-icon btn-xs tip" title="">
                                    <i class="icon-pencil"></i>
                                </a> 

        <!--                                <a onclick="return confirm('Are you sure you want to Delete App ?')" data-original-title="Delete" href="<?php //echo admin_url('content_management/delete/' . $d->id);                    ?>" class="btn btn-default btn-icon btn-xs tip" title="">
                                    <i class="icon-remove3"></i>
                                </a> 

                            </td> 
                        </tr>

                        <?php
                    }
                } else {
                    echo '<tr><td colspan="10">No Result Found</td></tr>';
                }
                ?>
            </tbody> 
        </table>
    <?php }else{ ?>
        <table class="table table-striped table-bordered"> 
            <thead> 
                <tr> 
                    <th>ID</th>
                    <th>Contact ID</th> 
                    
                    <th>Torso</th>
                    <th>Jaw Width</th>
                    <th>Tail Gridth</th>
                    <th>Lower Fore Leg</th>
                    <th>Upper Hind Leg</th>
                    <th>L. Hind Leg</th>
                    <th>U. Fore Leg</th>
                    <th>Tail Length</th>
                    <th>Jaw Length</th>
                    <th>AW Right</th>
                    <th>Tail</th>
                    <th>Blood</th>
                    <th>Face</th>
                    <th>Skin</th>
                    <th>Haematology</th>
                    <th>Swab Skin</th>
                    <th>Swab Oral</th>
                    <th>Swab Cloacal</th>
                    <th>Created</th>


                    <th>Action</th>
                </tr> 
            </thead> 
            <tbody>
                <?php
                if (count($catching) != 0) {
                    foreach ($catching as $d) {
                        ?>
                        <tr> 
                            <td><?php echo $d->id ?></td>                    
                            <td><?php echo $d->dragon_name; ?></td>         
                            <td><?php echo date('Y-m-d h:i a', $d->survey_date); ?></td> 
                            <td><?php echo $d->lat; ?></td>                 
                            <td><?php echo $d->lon; ?></td> 
                            <td><?php echo $d->sub_location; ?></td>                   
                            <td><?php echo $d->notes; ?></td>
                            <td><?php if($d->contact_type == 1){echo "Catching";}else{echo "Sighting";} ?></td>                    
                            <td><?php echo $d->habitat; ?></td>
                            <td><?php echo $d->field_recorded_by; ?></td>
                            <td><?php echo $d->data_entred_by; ?></td>
                            <td><?php if($d->diseased == 1){echo "Yes";}else{echo "No";} ?></td>
                            <td><?php if($d->gravid == 1){echo "Yes";}else{echo "No";} ?></td>
                            <td><?php echo date('Y-m-d h:i a', $d->created); ?></td>                     
                                                 
                            <td> 
                                <a class="btn btn-default btn-icon btn-xs tip" href="<?php echo admin_url('dragon_contacts_management/view/' . $d->id) ?>"><i class="icon-eye"></i></a> 

                                <a data-original-title="Edit" href="<?php echo admin_url('dragon_contacts_management/edit/' . $d->id .'/'. $d->dragon_id); ?>" class="btn btn-default btn-icon btn-xs tip" title="">
                                    <i class="icon-pencil"></i>
                                </a> 

        <!--                                <a onclick="return confirm('Are you sure you want to Delete App ?')" data-original-title="Delete" href="<?php //echo admin_url('content_management/delete/' . $d->id);                    ?>" class="btn btn-default btn-icon btn-xs tip" title="">
                                    <i class="icon-remove3"></i>
                                </a> 

                            </td> 
                        </tr>

                        <?php
                    }
                } else {
                    echo '<tr><td colspan="10">No Result Found</td></tr>';
                }
                ?>
            </tbody> 
    <?php } ?>
    </div> 
</div>
<div class="datatable-footer" style="margin-bottom: 10px; ">
    <div class="dataTables_info" id="DataTables_Table_1_info">
        Showing <?php //echo count($detail) ?> out of <?php //echo $count ?> entries
    </div>

    <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
        <div class="paginate">
            <?php //echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>-->



</aside>
<script type="text/javascript">
  function delete_pic(id) {


        $.ajax({
            type: "POST",
            url: '<?php echo admin_url('dragon_photos_management/delete_photo') ?>',
            dataType: 'json',
            data: {id: id},
            success: function (data) {
                console.log(data);
                if(data.success == true){
                    $("#pic-"+data.id).css('display', 'none');
                }
            }
        });
    }
</script>
