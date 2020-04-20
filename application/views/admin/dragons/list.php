<?php if ($this->session->flashdata('message')) { ?>
    <div class="breadcrumb-line">
        <p class="breadcrumb" style="color: green; font-weight: bold;">
            <?php echo $this->session->flashdata('message'); ?>
        </p>
    </div>
<?php } ?>
<div class="datatable-footer" style="margin-bottom: 10px; ">
    <div class="dataTables_info" id="DataTables_Table_1_info">
        Showing <?php echo count($dragons) ?> out of <?php echo $count ?> entries
    </div>

    <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
        <div class="paginate">
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
<div class="panel panel-default"> 
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-user"></i>Dragon List</h6>
        <h6 class="panel-title pull-right">
            <a href="<?php echo admin_url('dragon_management/add') ?>">
                <i class="icon-plus"></i>				
            </a>									 
        </h6>
    </div> 
   
  <div class="table-responsive"> 
        <table class="table table-striped table-bordered" style="max-width:100%"> 
            <thead> 
                <tr> 
                    <th>ID</th>
                    <th>Name</th>
                    <th>Total Contacts</th>
                    <th>Gender</th>
                    <th>Original ID By</th>
                    <th>Age</th> 
                    <th>General Location</th> 
                    <th>Notes</th>
                    <th>DNA</th>
                    <th>Date Extracted</th>
                    <th>Date Geonotypd</th>
                    <th>Date DNA Taken</th>
                    <th>Date Tagged</th>

                    <!-- <th>Image Type</th> -->
                    <!-- <th>Created</th> -->
                    <th>Action</th>
                </tr> 
            </thead> 
            <tbody class="sortable">
                <?php foreach ($dragons as $o) { ?>
                    <tr id="item_<?= $o->id ?>"> 
                        <td><?= $o->id ?></td> 					 
                        <td><?= $o->name ?></td> 
                        <td><?= $o->total_contacts ?></td>					 
                        <td><?php if($o->gender == 0){echo "Female";}else if($o->gender == 1){echo "Male";}else{echo "Unknown";} ?></td> 
                        <?php $original_id_by = $this->db->get_where('admin', array('id'=>$o->original_id_by))->row(); ?>					 
                        <td><?php if(!empty($original_id_by)){echo $original_id_by->name;} ?> </td>
                        <td><?php if($o->gender == 0){echo "Adult";}else{echo "Juvenile";} ?> </td>
                        <?php $location = $this->db->get_where('tbl_location_dragon', array('id'=>$o->general_location))->row(); ?>
                        <td><?php if(!empty($location)){echo $location->location;} ?> </td>
                        <td><?= $o->notes; ?> </td>

                        <?php if(!empty($o->dna)){ ?>
                            <td><?= $o->dna; ?> </td>
                        <?php }else{ ?>
                            <a href=""><td>Add DNA</td></a>
                        <?php } ?>
                        <td><?php if($o->date_extracted == NULL){echo "Unknown";}else{echo$o->date_extracted; } ?> </td>
                        <td><?php if($o->date_genotyped == NULL){echo "Unknown";}else{echo $o->date_genotyped; } ?> </td>
                        <td><?php if($o->date_dna_taken == NULL){echo "Unknown";}else{echo $o->date_dna_taken; } ?> </td>
                        <td><?php if($o->date_tagged == NULL){echo "Unknown";}else{echo $o->date_tagged; } ?> </td>
                        <!-- <td><?php 
                        
                        $initial_name //= $this->db->get_where('tbl_dragon_photos', array('id' => $o->profile_id))->row();
                        //if(!empty($initial_name)){echo $initial_name->type;}else{echo "Unknown";}
                        ?></td> -->
                        <!-- <td><?= $o->created; ?> </td> -->
                        <td> 
                            <?php if ($o->id == 0) continue; ?>
                            <a class="btn btn-default btn-icon btn-xs tip" href="<?php echo admin_url('dragon_management/view/' . $o->id) ?>"><i class="icon-eye"></i></a> 

                            <a data-original-title="Edit" href="<?php echo admin_url('dragon_management/edit/' . $o->id); ?>" class="btn btn-default btn-icon btn-xs tip" title="">
                                <i class="icon-pencil"></i>
                            </a> 
                            <a onclick="return confirm('Are you sure you want to delete this dragon information?')" data-original-title="Delete" href="<?php echo admin_url('dragon_management/delete/' . $o->id); ?>" class="btn btn-default btn-icon btn-xs tip" title="">
                                <i class="icon-remove3"></i>
                            </a>
                            <a data-original-title="Add" href="<?php echo admin_url('dragon_contacts_management/add/' . $o->id); ?>" class="btn btn-default btn-icon btn-xs tip" title="">
                                <i class="icon-plus"></i>
                            </a>

                        </td> 
                    </tr>
                <?php } ?>
            </tbody> 
        </table> 
    </div> 
</div>
<div class="datatable-footer" style="margin-bottom: 10px; ">
    <div class="dataTables_info" id="DataTables_Table_1_info">
        Showing <?php echo count($dragons) ?> out of <?php echo $count ?> entries
    </div>

    <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
        <div class="paginate">
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
<script>

    $(document).ready(function () {
        var admin_url = '<?= admin_url() ?>';
        $('.sortable').sortable({
            containerSelector: 'table',
            itemPath: 'tbody',
            itemSelector: 'tr',
            placeholder: '<tr class="placeholder"/>',
            activeClass: "table_active",
            hoverClass: "table_hover",
            drop: function (event, ui) {

                $(this).removeClass(".alt-row");
                $(this).addClass('dropped');
            },
            stop: function (event, ui) {
                var data = $(this).sortable('serialize');
                console.log(data);
                // POST to server using $.post or $.ajax
                $.ajax({
                    data: data,
                    type: 'POST',
                    url: admin_url + '/product_management/manage_order',
                    success: function () {
                        window.location.reload();
                    }
                });
            }
        });

        $(".sortable").disableSelection();


    });





</script>

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
