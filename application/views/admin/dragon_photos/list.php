<?php if ($this->session->flashdata('message')) { ?>
    <div class="breadcrumb-line">
        <p class="breadcrumb" style="color: green; font-weight: bold;">
            <?php echo $this->session->flashdata('message'); ?>
        </p>
    </div>
<?php } ?>
<div class="panel panel-default"> 
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-user"></i>Dragon Profile List</h6>
        <h6 class="panel-title pull-right">
            <a href="<?php  echo admin_url('dragon_photo_management/add')  ?>">
                <i class="icon-plus"></i>				
            </a>	 								
        </h6>
    </div> 
    <div class="table-responsive"> 
        <table class="table table-striped table-bordered"> 
            <thead> 
                <tr> 
                    <th>ID</th> 
                    <th>Dragon Profile</th>
                    <th>Contact ID</th>
                    <th>Photo ID By</th>
                    <th>Photo</th>
                    <th>images</th>
                    <th>Photo Quality</th>
                    <!-- <th>Created Date</th>   -->
                    <th>Action</th>
                </tr> 
            </thead> 
            <tbody class="sortable">
                <?php if (count($dragon_profile) != 0) {
                    foreach ($dragon_profile as $s) {
                        ?>
                        <tr id="item_<?= $s->id ?>"> 


                            <td><?php echo $s->id; ?></td> 					 
                            <td><?php echo $s->type; ?></td> 					 				 
                         	<td><?php echo $s->created; ?></td> 				 				 
                            <!-- <td>  -->

                            <td><?= $s->id; ?></td> 					 
                            <td><?php if($s->type == 0){echo "Left";}elseif($s->type==1) {echo "Right";}elseif($s->type==2) {echo "Left&Right";}?> </td>
                            <td><?= $s->contact_id ?></td> 
                            <td><?= $s->photo_id_by ?></td> 
                            <td><?php if($s->photo == 0){echo "No";}elseif($s->photo==1) {echo "Yes";}?> </td>
                            <td><img src="<?php echo(admin_url('uploads/dragon_images/'.$s->image)); ?>"></td>
                            <td><?php if($s->photo_quality == 0){echo "High";}elseif($s->photo_quality==1) {echo "Medium";}elseif($s->type==2) {echo "Poor";}?> </td>


                         	<!-- <td><?php //echo $s->created; ?></td> 				 				  -->
                             <td> 


                                <a data-original-title="Edit Photo" href="<?php //echo admin_url('slider_management/edit/' . $s->id); ?>" class="btn btn-default btn-icon btn-xs tip" title="">
                                    <i class="icon-pencil"></i>
                                </a>  
                                       <a onclick="return confirm('Are you sure you want to Delete Slide ?')" data-original-title="Delete Photo" href="<?php // echo admin_url('slider_management/delete/' . $s->id);  ?>" class="btn btn-default btn-icon btn-xs tip" title="">
                                    <i class="icon-remove3"></i>
                                </a> 

                             </td> 
                        </tr>
                        <?php
                    }
                } else {
                    echo '<tr><td colspan="5"> No Result Found.</td> </tr>';
                }
                ?>

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
                    url: admin_url + '/slider_management/manage_order',
                    success: function () {
//                        window.location.reload();
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