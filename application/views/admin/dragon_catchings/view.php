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
              <td><?php echo $detail->id; ?></td>
            </tr>
            <tr>
              <th scope="row">Torso</th>
              <td><?php if($detail->torso == 0){echo "False";}else if($detail->torso == 1){echo "True";}else{echo "Unknown";} ?></td>
            </tr>
            <tr>
              <th scope="row">Jaw Width</th>
              <td><?php echo $detail->jaw_width; ?></td>
            </tr>
            <tr>
              <th scope="row">Tail Girth</th>
              <td><?php if(empty($detail->tail_girth)){echo "DNA not available yet.";}else{echo $detail->tail_girth;} ?></td>
            </tr>
            <tr>
              <th scope="row">Lower Fore Leg</th>
              <td><?php echo $detail->lower_fore_leg; ?></td>
              
            </tr>
            <tr>
              <th scope="row">Upper Hind Leg</th>
              <td><?php echo $detail->upper_hind_leg; ?></td>
            </tr>
            <tr>
              <th scope="row">Upper Fore Leg</th>
              <td><?php echo $detail->upper_fore_leg; ?></td>
            </tr>
            <tr>
              <th scope="row">Lower Hind Leg</th>
              <td><?php echo $detail->lower_hind_leg; ?></td>

            </tr>
            <tr>
              <th scope="row">Tail Length</th>
              <td><?php 
            if(empty($detail->tail_length)){
                echo "This dragon has not tail length.";
            }else{
                echo $detail->tail_length;
            }
            ?></td>
            </tr>
            <tr>
              <th scope="row">Jaw Length</th>
              <td><?php 
            if(empty($detail->jaw_length)){
                echo "This dragon has not jaw length.";
            }else{
                echo $detail->jaw_length;
            }
            ?></td>
            </tr>
            <tr>
              <th scope="row">Tail</th>
              <td><?php 
            if(empty($detail->tail)){
                echo "tail sample has not been added yet.";
            }else{
                echo $detail->tail;
            }
            ?></td>
            </tr>

            <tr>
              <th scope="row">Blood</th>
              <td><?php 
            if(empty($detail->blood)){
                echo " blood sample has not been added yet.";
            }else{
                echo $detail->blood;
            }
            ?></td>
            </tr>

            <tr>
              <th scope="row">Faeces</th>
              <td><?php 
            if(empty($detail->faeces)){
                echo "faeces sample has not been added yet.";
            }else{
                echo $detail->faeces;
            }
            ?></td>
            </tr>
            <tr>
              <th scope="row">Skin</th>
              <td><?php 
            if(empty($detail->skin)){
                echo "skin sample has not been added yet.";
            }else{
                echo $detail->skin;
            }
            ?></td>
            </tr>
            <tr>
              <th scope="row">Heamatology</th>
              <td><?php 
            if(empty($detail->heamatology)){
                echo "heamatology sample has not been added yet.";
            }else{
                echo $detail->heamatology;
            }
            ?></td>
            </tr>
            <tr>
              <th scope="row">Swab Skin</th>
              <td><?php 
            if(empty($detail->swab_skin)){
                echo "swab skin sample has not been added yet.";
            }else{
                echo $detail->swab_skin;
            }
            ?></td>
            </tr>
            <tr>
              <th scope="row">Swab Oral</th>
              <td><?php 
            if(empty($detail->swab_oral)){
                echo "swab oral sample has not been added yet.";
            }else{
                echo $detail->swab_oral;
            }
            ?></td>
            </tr>
            <tr>
              <th scope="row">Swab Cloacal</th>
              <td><?php 
            if(empty($detail->swab_cloacal)){
                echo "swab cloacal sample has not been added yet.";
            }else{
                echo $detail->swab_cloacal;
            }
            ?></td>
            </tr>
            <tr>
              <th scope="row">Body Temperature</th>
              <td><?php 
            if(empty($detail->body_temp)){
                echo "not available.";
            }else{
                echo $detail->body_temp;
            }
            ?></td>
            </tr>
             <tr>
              <th scope="row">Created</th>
              <td><?php $detail->created; ?></td>
            </tr>
           
            </tbody>
        </table>


    </section><!-- /.content -->

    <div class="row" style="padding: 20px; margin: 0px; margin-top: -30px;">

    </div>

    <!--<div class="panel panel-default"> 
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-user"></i>Dragon Contacts</h6>
        <h6 class="panel-title pull-right">
<a href="<?php echo admin_url('dragon_contacts_management/add/'.$detail->id) ?>">
                <i class="icon-plus"></i>               
            </a>                                
        </h6>
    </div> 
    <div class="table-responsive"> 
        <table class="table table-striped table-bordered"> 
            <thead> 
                <tr> 
                    <th>ID</th> 
                    <th>Contact ID</th>
                    <th>Torso</th>
                    <th>Jaw Width</th>
                    <th>Tail Girth</th>
                    <th>Lower Fore Leg</th>
                    <th>Upper Hind Leg</th>
                    <th>Upper Fore Leg</th>
                    <th>Lower Hind Leg</th>
                    <th>Tail Length</th>
                    <th>Jaw Length</th>
                    <th>Tail</th>
                    <th>Blood</th>
                    <th>Faeces</th>
                    <th>Skin</th>
                    <th>Heamatology</th>
                    <th>Swab SKin</th>
                    <th>Swab Oral</th>
                    <th>Swab Cloacal</th>
                    <th>Body Temp</th>
                    <th>Created</th>
                    
                </tr> 
            </thead> 
            <tbody>
                <?php foreach ($contacts as $o) { ?>
                    <tr> 
                        <td><?= $o->id ?></td>                   
                        <td><?= $o->contact_id ?></td> 
                        <td><?= $o->torso ?></td>                   
                        <td><?= $o->jaw_width ?></td> 
                        <td><?= $o->tail_girth?></td>
                                           
                       <td><?php if($o->lower_fore_leg == 0){echo "No";}elseif($o->lower_fore_leg==1) {echo "Yes";}?> </td>
                        <td><?php if($o->upper_hind_leg == 0){echo "No";}elseif($o->upper_hind_leg==1) {echo "Yes";}?> </td>                  
                        <td><?php if($o->upper_fore_leg == 0){echo "No";}elseif($o->upper_fore_leg==1) {echo "Yes";}?> </td>                   
                        <td><?php if($o->lower_hind_leg == 0){echo "No";}elseif($o->lower_hind_leg==1) {echo "Yes";}?> </td>                 
                        <td><?= $o->tail_length?></td>
                        <td><?= $o->jaw_length ?></td>                   
                         <td><?php if($o->tail == 0){echo "No";}elseif($o->tail==1) {echo "Yes";}?> </td>
                         <td><?php if($o->blood == 0){echo "No";}elseif($o->blood==1) {echo "Yes";}?> </td>  
                        
                        <td><?php if($o->faeces == 0){echo "No";}elseif($o->faeces==1) {echo "Yes";}?> </td>                   
                       <td><?php if($o->skin == 0){echo "No";}elseif($o->skin==1) {echo "Yes";}?> </td> 
                        <td><?php if($o->heamatology == 0){echo "No";}elseif($o->heamatology==1) {echo "Yes";}?> </td>                    
                        <td><?php if($o->swab_skin == 0){echo "No";}elseif($o->swab_skin==1) {echo 
                            "Yes";}?> </td>      
                        <td><?php if($o->swab_oral == 0){echo "No";}elseif($o->swab_oral==1) {echo 
                            "Yes";}?> </td>
                        <td><?php if($o->swab_cloacal == 0){echo "No";}elseif($o->swab_cloacal==1) {echo "Yes";}?> </td>                          
                        <td><?= $o->body_temp ?></td>
                        <td><?= $o->created; ?> </td>
                        <td> 
                            <!--<?php if ($o->id == 0) continue; ?>
                             <a class="btn btn-default btn-icon btn-xs tip" href="<?php echo admin_url('dragon_catchings_management/view/' . $o->id) ?>"><i class="icon-eye"></i></a>
                            <a data-original-title="Edit" href="<?php echo admin_url('dragon_catchings_management/edit/' . $o->id); ?>" class="btn btn-default btn-icon btn-xs tip" title="">
                                <i class="icon-pencil"></i>
                            </a> 
                            <a onclick="return confirm('Are you sure you want to Delete this location?')" data-original-title="Delete" href="<?php echo admin_url('dragon_catchings_management/delete/' . $o->id); ?>" class="btn btn-default btn-icon btn-xs tip" title="">
                                <i class="icon-remove3"></i>
                            </a> 

                        </td> 
                    </tr>

                <?php } ?>

            </tbody> 
        </table> 
    </div> 
</div>-->
<div class="datatable-footer" style="margin-bottom: 10px; ">
    <!--<div class="dataTables_info" id="DataTables_Table_1_info">
        Showing <?php //echo count($detail) ?> out of <?php //echo $count ?> entries
    </div>

    <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
        <div class="paginate">
            <?php //echo $this->pagination->create_links(); ?>
        </div>
    </div>-->
</div>



</aside>
