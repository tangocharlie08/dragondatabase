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
            <!-- <a href="<?php  //echo admin_url('dragon_photo_management/add')  ?>">
                <i class="icon-plus"></i>				
            </a> -->	 								
        </h6>
    </div> 
    <div class="table-responsive"> 
        <table class="table table-striped table-bordered"> 
            <thead> 
                <tr> 
                    <th>ID</th> 
                    <th>Log By</th>
                    <!-- <th>Log To</th> -->
                    <th>Log Description</th>
                    <!-- <th>Created Date</th>   -->
                    <th>Date</th>
                </tr> 
            </thead> 
            <tbody class="sortable">
                <?php if (count($details) != 0) {
                    foreach ($details as $s) {
                        ?>
                        <tr id="item_<?= $s->id ?>"> 
                            <td><?= $s->id; ?></td>

<?php $log_by = $this->db->get_where('admin', array('id'=>$s->logged_by))->row(); ?>
                            <td><?php if(!empty($log_by)){echo $log_by->name;}  ?></td> 					 
                            <td><?php echo $s->log_description; ?></td> 					 				 
                         	<td><?php echo $s->created; ?></td> 				 				 
                            <!-- <td>  -->

                            
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