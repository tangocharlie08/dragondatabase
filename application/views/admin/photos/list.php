<?php if ($this->session->flashdata('message')) { ?>
    <div class="breadcrumb-line">
        <p class="breadcrumb" style="color: green; font-weight: bold;">
            <?php echo $this->session->flashdata('message'); ?>
        </p>
    </div>
<?php } ?>
<div class="datatable-footer" style="margin-bottom: 10px; ">
    <div class="dataTables_info" id="DataTables_Table_1_info">
        Showing <?php echo count($image) ?> out of <?php echo $count ?> entries
    </div>

    <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
        <div class="paginate">
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
<div class="panel panel-default"> 
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-user"></i>Photos List</h6>
        <h6 class="panel-title pull-right">
            <!-- <a href="<?php //echo admin_url('dragon_photos_management/add') ?>">
                <i class="icon-plus"></i>				
            </a> -->									 
        </h6>
    </div> 
    <div class="table-responsive"> 
        <table class="table table-striped table-bordered" style="max-width:100%"> 
            <thead> 
                <tr> 
                    <th>ID</th>
                    <!-- <th>Profile</th> -->
                    <th>Contact ID</th> 
                    <th>Photo ID BY</th>
                    <th>Image</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr> 
            </thead> 
            <tbody class="sortable">
                <?php foreach ($image as $p) { ?>
                    <tr id="item_<?= $p->id ?>"> 
                        <td><?= $p->id ?></td> 					 
                        <!-- <td><?php //if($p->type == 0){echo "Left";}elseif($p->type==1) {echo "Right";}elseif($p->type==2){echo "Left&Right";}?> </td> 					  -->
                        <td><?= $p->contact_id?></td> 	
                        <!-- <?php $photo_id_by = $this->db->get_where('admin', array('id'=>$p->photo_id_by))->row()->name; ?>	
                        			  -->
                        <?php $photo_by = $this->db->get_where('admin', array('id'=>$p->photo_id_by))->row()->name; ?>
                        <td><?= $photo_by; ?> </td>
                        <!-- <td><img class="dragon-image" src="<?php echo $p->image; ?>"></td> -->
                        <!--<td><a href="<?php //echo admin_url('dragon_photos_management/feature_product/' . $p->id); ?>"><?php
                                if ($p->featured == 1) {
                                    echo '<i class="icon-star3"></i>';
                                } else {
                                    echo '<i class="icon-star"></i>';
                                }
                                ?></a>
                        </td>-->
                        <td><img style="width: 200px;" src="<?php echo (base_url('uploads/dragon_images/'.$p->image));?>"></td> 
                        <td><?= $p->created?></td>
                        <td> 
                            <!-- <a data-original-title="Edit" href="<?php //echo admin_url('dragon_photos_management/edit/' . $p->id); ?>" class="btn btn-default btn-icon btn-xs tip" title="">
                                <i class="icon-pencil"></i> -->
                            </a> 
                            <a onclick="return confirm('Are you sure you want to Delete this photo?')" data-original-title="Delete" href="<?php echo admin_url('dragon_photos_management/delete/' . $p->id); ?>" class="btn btn-default btn-icon btn-xs tip" title="">
                                <i class="icon-remove3"></i>
                            </a> 
                            <a onclick="alert('This feature is not available on this version.')" data-original-title="Alert"  class="btn btn-default btn-icon btn-xs tip" title="">
                                <i class="icon-download"></i>
                            </a> 
                           

                        </td> 
                    </tr>
                <?php } ?>
            </tbody> 
        </table> 
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
