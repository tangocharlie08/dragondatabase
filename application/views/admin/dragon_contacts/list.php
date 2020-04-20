<?php if ($this->session->flashdata('message')) { ?>
    <div class="breadcrumb-line">
        <p class="breadcrumb" style="color: green; font-weight: bold;">
            <?php echo $this->session->flashdata('message'); ?>
        </p>
    </div>
<?php } ?>
<div class="datatable-footer" style="margin-bottom: 10px; ">
    <div class="dataTables_info" id="DataTables_Table_1_info">
        Showing <?php echo count($contact_dragon) ?> out of <?php echo $count ?> entries
    </div>

    <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
        <div class="paginate">
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
<div class="panel panel-default"> 
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-user"></i>Dragon Contacts List</h6>
        <h6 class="panel-title pull-right">
<a href="<?php echo admin_url('dragon_contacts_management/add') ?>">
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
                    <th>Survey Date</th>
                    <th>Time</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Sub Location</th>
                    <th>notes</th>
                    <th>Contact Type</th>
                    <th>Habitat Type</th>
                    <th>Field Record By</th>
                    <th>Data Entry By</th>
                    <th>Diseased</th>
                    <th>Gravid</th>
                    <!-- <th>Created</th> -->
                    <th>Action</th>
                </tr> 
            </thead> 
            <tbody class="sortable">
                <?php foreach ($contact_dragon as $o) { ?>
                    <tr id="item_<?= $o->id ?>"> 
                        <td><?= $o->id ?></td> 
                        
                        <?php $dragon_name = $this->db->get_where('tbl_dragons', array('id'=>$o->dragon_id))->row(); ?>
                        <td><?= $dragon_name->name ?></td>   

                        <td><?php if($o->survey_date == NULL){echo "Unknown";}else{echo$o->survey_date; } ?> </td>
                        <td><?php if($o->time == NULL){echo "Unknown";}else{echo $o->time; } ?> </td>
                        <td><?= $o->lat ?></td> 
                        <td><?= $o->lon ?></td> 
                        <td><?= $o->sub_location ?></td>
                        <td><?= $o->notes; ?> </td>                  
                        <td><?php if($o->contact_type == 0){echo "Sighting";}else if($o->contact_type == 1){echo "Catching";}else{echo "Unknown";} ?></td>

                        <td><?= $o->habitat_type; ?> </td>                     

                        <?php $field_record = $this->db->get_where('admin', array('id'=>$o->field_record_by))->row(); ?>        
                        <td><?php if(!empty($field_record)){echo $field_record->name;} ?> </td>
                        <?php $date_entry = $this->db->get_where('admin', array('id'=>$o->data_entry_by))->row() ?>
                        <td><?php if(!empty($data_entry)){echo $data_entry->name;} ?> </td>

                        <td><?php if($o->diseased == 0){echo "Not diseased";}else if($o->diseased == 1){echo "diseased";} ?> </td>
                        <td><?php if($o->gravid == 0){echo "Not Gravid";}else if($o->gravid == 1){echo "Gravid";} ?> </td>
                        <!-- <td><?= $o->created; ?> </td> -->
                        <td> 
                            <?php if ($o->id == 0) continue; ?>
                            <a class="btn btn-default btn-icon btn-xs tip" href="<?php echo admin_url('dragon_contacts_management/view/' . $o->id) ?>"><i class="icon-eye"></i></a> 

                            <a data-original-title="Edit" href="<?php echo admin_url('dragon_contacts_management/edit/' . $o->id .'/'. $dragon_name->id); ?>" class="btn btn-default btn-icon btn-xs tip" title="">
                                <i class="icon-pencil"></i>
                            </a> 
                            <a onclick="return confirm('Are you sure you want to Delete this dragon type?')" data-original-title="Delete" href="<?php echo admin_url('dragon_contacts_management/delete/' . $o->id); ?>" class="btn btn-default btn-icon btn-xs tip" title="">
                                <i class="icon-remove3"></i>
                            </a> 
                            <a data-original-title="Add Images" href="<?php echo admin_url('dragon_photos_management/add/' . $o->id); ?>" class="btn btn-default btn-icon btn-xs tip" title="">
                                <i class="icon-plus"></i>
                            </a>

                        </td> 
                    </tr>
                <?php } ?>
            </tbody> 
            <tbody>
               
            </tbody> 
        </table> 
    </div> 
</div>
<div class="datatable-footer" style="margin-bottom: 10px; ">
    <div class="dataTables_info" id="DataTables_Table_1_info">
        Showing <?php echo count($contact_dragon) ?> out of <?php echo $count ?> entries
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
