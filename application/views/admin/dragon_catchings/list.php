<?php if ($this->session->flashdata('message')) { ?>
    <div class="breadcrumb-line">
        <p class="breadcrumb" style="color: green; font-weight: bold;">
            <?php echo $this->session->flashdata('message'); ?>
        </p>
    </div>
<?php } ?>
<div class="datatable-footer" style="margin-bottom: 10px; ">
    <div class="dataTables_info" id="DataTables_Table_1_info">
        Showing <?php echo count($catching_dragon) ?> out of <?php echo $count ?> entries
    </div>

    <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
        <div class="paginate">
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
<div class="panel panel-default"> 
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-user"></i>Dragon Catchings List</h6>
        <?php if($this->session->userdata('admin_type') == 1) { ?>
            <h6 class="panel-title pull-right">
                <a href="<?php echo admin_url('dragon_catchings_management/add') ?>">
                   <!-- <i class="icon-plus"></i> -->              
                </a>                                     
            </h6>
        <?php } ?>
    </div> 
    <div class="table-responsive"> 
        <table class="table table-striped table-bordered"> 
            <thead> 
                <tr> 
                    <th>ID</th>
                    <th>Dragon Name</th>
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
                    <!-- <th>Created</th> -->
                    <th>Action</th>
                </tr> 
            </thead> 
            <tbody>
                <?php foreach ($catching_dragon as $o) { ?>
                    <tr> 
                        <td><?= $o->id ?></td>
                        <td><?= $o->dragon_name ?></td>
                        <td><?= $o->contact_id ?></td>  

                        <td><?php if($o->torso == 0 || $o->torso == NULL || !empty($o->torso)){
                            echo "";

                        }else{
                            echo ($o->torso.' cm');

                        } ?></td>                   
                        <td><?php if($o->jaw_width == 0 || $o->jaw_width == NULL || !empty($o->jaw_width)){
                            echo "";
                            

                        }else{
                            echo ($o->jaw_width.' mm');
                        } ?></td> 
                        <td><?php if($o->tail_girth == 0 || $o->tail_girth == NULL || !empty($o->tail_girth)){
                            echo "";

                        }else{
                            echo ($o->tail_girth.' cm');

                        } ?></td> 
                        <td><?php if($o->lower_fore_leg == 0){echo "No";}elseif($o->lower_fore_leg==1) {echo "Yes";}?> </td>
                        <td><?php if($o->upper_hind_leg == 0){echo "No";}elseif($o->upper_hind_leg==1) {echo "Yes";}?> </td>                  
                        <td><?php if($o->upper_fore_leg == 0){echo "No";}elseif($o->upper_fore_leg==1) {echo "Yes";}?> </td>                   
                        <td><?php if($o->lower_hind_leg == 0){echo "No";}elseif($o->lower_hind_leg==1) {echo "Yes";}?> </td>                
                        <td><?php if($o->tail_length == 0 || $o->tail_length == NULL || !empty($o->tail_length)){
                            echo "";

                        }else{
                            echo ($o->tail_length.' cm');
                            
                        } ?></td>
                        <td><?php if($o->jaw_length == 0 || $o->jaw_length == NULL || !empty($o->jaw_length)){
                            echo "";

                        }else{
                            echo ($o->jaw_length.' cm');
                            
                        } ?></td>                   
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
                        <!-- <td><?= $o->created; ?> </td> -->
                        <td> 
                            
                             <a class="btn btn-default btn-icon btn-xs tip" href="<?php echo admin_url('dragon_catchings_management/view/' . $o->id) ?>"><i class="icon-eye"></i></a>
                            <a data-original-title="Edit" href="<?php echo admin_url('dragon_contacts_management/edit/' . $o->id .'/'. $o->dragon_id); ?>" class="btn btn-default btn-icon btn-xs tip" title="">
                                <i class="icon-pencil"></i>
                            </a> 
                            <a onclick="return confirm('Are you sure you want to Delete this data?')" data-original-title="Delete" href="<?php echo admin_url('dragon_catchings_management/delete/' . $o->id); ?>" class="btn btn-default btn-icon btn-xs tip" title="">
                                <i class="icon-remove3"></i>
                            </a> 

                        </td> 
                    </tr>

                <?php } ?>

            </tbody> 
        </table> 
    </div> 
</div>






<style>

    .paginate strong{
        background-color: #32434D;
        color: #FFFFFF;
        outline: 0 none;
        font-size: 12px;
        font-weight: 600;
        margin-left: 1px;
        padding: 5px 10px;
        border-radius: 2px;
    }

    .paginate a{
        color: #505050;
        outline: 0 none;
        font-size: 12px;
        font-weight: 600;
        margin-left: 1px;
        padding: 5px 10px;
        border-radius: 2px;
    }
    .paginate a:hover{
        background-color: #65B688;
        color: #ffffff;
        outline: 0 none;
        font-size: 12px;
        font-weight: 600;
        margin-left: 1px;
        padding: 5px 10px;
        border-radius: 2px;
    }

</style>
