<?php if ($this->session->flashdata('message')) { ?>
    <div class="breadcrumb-line">
        <p class="breadcrumb" style="color: green; font-weight: bold;">
            <?php echo $this->session->flashdata('message'); ?>
        </p>
    </div>
<?php } ?>
<div class="datatable-footer" style="margin-bottom: 10px; ">
    <div class="dataTables_info" id="DataTables_Table_1_info">
        Showing <?php echo count($sighting_dragon) ?> out of <?php echo $count ?> entries
    </div>

    <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
        <div class="paginate">
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title">Dragon Sightings List</h6>
        <h6 class="panel-title pull-right">
            <a data-original-title="Add new dragon sightings" href="<?php echo admin_url('dragon_sightings_management/add'); ?>">
                <!--<i class="icon-plus"></i>-->				
            </a>									 
        </h6>
    </div> 
    <div class="table-responsive"> 
        <table class="table table-striped table-bordered"> 
            <thead> 
                <tr>
                    <th>ID</th> 
                    <th>Dragon Name</th>
                    <th>Contact ID</th>
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
                    <th>Fighting with Contact</th>
                    <th>Fighting with no Contatct</th>
                    <th>Nesting</th>
                    <th>Laying</th>
                    <th>Tasting</th>
                    <th>Resting</th>
                    <th>Dew Lap</th>
                    <th>Body Temp</th>
                    <!-- <th>Created</th> -->
                    

                    <th>Action</th>
                </tr> 
            </thead> 
            <tbody>

                <?php foreach ($sighting_dragon as $o) { ?>
                    <tr> 
                     
                        <td><?= $o->id ?></td> 
                        <td><?= $o->dragon_name ?></td>   

                        <td><?= $o->contact_id ?></td>                 
                        <td><?php if($o->dominance == 0){echo "No";}elseif($o->dominance==1) {echo "Yes";}?> </td>
                        <td><?php if($o->head_bob == 0){echo "No";}elseif($o->head_bob==1) {echo "Yes";}?> </td> 
                        <td><?php if($o->arm_wave == 0){echo "No";}elseif($o->arm_wave==1) {echo "Yes";}?> </td>                        
                        <td><?php if($o->tail_slap == 0){echo "No";}elseif($o->tail_slap==1) {echo "Yes";}?> </td>                     
                        <td><?php if($o->ch == 0){echo "No";}elseif($o->ch==1) {echo "Yes";}?> </td>   
                        <td><?php if($o->fighting == 0){echo "No";}elseif($o->fighting==1) {echo "Yes";}?> </td>                    
                        <td><?php if($o->eating == 0){echo "No";}elseif($o->eating==1) {echo "Yes";}?> </td>  
                        <td><?php if($o->hb_fast == 0){echo "No";}elseif($o->hb_fast==1) {echo "Yes";}?> </td>                    
                        <td><?php if($o->hb_slow == 0){echo "No";}elseif($o->hb_slow==1) {echo "Yes";}?> </td>  
                        <td><?php if($o->aw_left == 0){echo "No";}elseif($o->aw_left==1) {echo "Yes";}?> </td> 
                        <td><?php if($o->aw_right == 0){echo "No";}elseif($o->aw_right==1) {echo "Yes";}?> </td>    
                        <td><?php if($o->fighting_with_contact== 0){echo "No";}elseif($o->fighting_with_contact==1) {echo "Yes";}?> </td>   
                        <td><?php if($o->fighting_with_no_contact== 0){echo "No";}elseif($o->fighting_with_no_contact==1) {echo "Yes";}?> </td>
                        <td><?php if($o->nesting == 0){echo "No";}elseif($o->nesting==1) {echo "Yes";}?> </td>   
                        <td><?php if($o->laying == 0){echo "No";}elseif($o->laying==1) {echo "Yes";}?> </td>  
                        <td><?php if($o->tasting == 0){echo "No";}elseif($o->tasting==1) {echo "Yes";}?> </td>  
                        <td><?php if($o->resting == 0){echo "No";}elseif($o->resting==1) {echo "Yes";}?> </td>      
                        <td><?php if($o->dew_lap == 0){echo "No";}elseif($o->dew_lap==1) {echo "Yes";}?> </td>  
                        <td><?php if($o->body_temp == 0 || $o->body_temp == NULL || !empty($o->body_temp)){
                            echo "";

                        }else{
                            echo ($o->body_temp.' cm');
                            
                        } ?></td>    
                        <!-- <td><?= $o->created; ?> </td> -->
                        <td> 
                               <a class="btn btn-default btn-icon btn-xs tip" href="<?php echo admin_url('dragon_sightings_management/view/' . $o->id) ?>"><i class="icon-eye"></i></a>

                                <a title="Edit" class="btn btn-default btn-icon btn-xs tip" href="<?= admin_url('dragon_contacts_management/edit/' . $o->id .'/'. $o->dragon_id); ?>" data-original-title="Edit User">
                                    <i class="icon-pencil"></i>
                                </a>   
                                <a title="Delete" class="btn btn-default btn-icon btn-xs tip" href="<?= admin_url('dragon_sightings_management/delete/' . $o->id); ?>" data-original-title="Delete Message" onclick="return confirm('Are you sure you want to Delete this data?')">
                                    <i class="icon-remove3"></i>
                                </a> 

                            </td> 
                        </tr> 
                        <?php }?>
            </tbody> 
        </table> 
    </div> 
</div>

<div class="datatable-footer" style="margin-bottom: 10px; ">
    <div class="dataTables_info" id="DataTables_Table_1_info">
    </div>

    <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
        <div class="paginate">
            <?php echo $this->pagination->create_links(); ?>
        </div>
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