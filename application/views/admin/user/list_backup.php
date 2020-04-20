<?php if ($this->session->flashdata('message')) { ?>
    <div class="breadcrumb-line">
        <p class="breadcrumb" style="color: green; font-weight: bold;">
            <?php echo $this->session->flashdata('message'); ?>
        </p>
    </div>
<?php } ?>
<div class="panel panel-default"> 
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-user"></i>User's</h6>
        <h6 class="panel-title pull-right">
            <a data-original-title="Add admin user" href="<?php echo admin_url('admin_user/add_new'); ?>" >
                <i class="icon-plus"></i>				
            </a>									 
        </h6>
    </div> 
    <div class="table-responsive"> 
        <table class="table table-striped table-bordered"> 
            <thead> 
                <tr> 
                    <th>ID</th>
                    <th>Name</th> 
                    <th>Email</th> 
                    <th>Image</th>
                    <th>Modify</th> 
                </tr> 
            </thead> 
            <tbody>
                <?php if (count($detail) != 0) {
                    foreach ($detail as $d) {
                        ?>
                        <tr> 
                            <td><?php echo $d->id ?></td> 					 
                            <td><?php echo $d->name; ?></td> 					 
                            <td><?php echo $d->email; ?></td> 					 
                            <td><img height="60px" width="65px" src="<?php if ($d->image == '') {
                    echo admin_img('no-image.jpg');
                } else {
                    echo base_url('uploads/admin_user/' . $d->image);
                } ?>" alt=""></td> 					 
                            <td> 

                                <a title="" class="btn btn-default btn-icon btn-xs tip" href="<?php echo admin_url('admin_user/edit/' . $d->id); ?>" data-original-title="Edit user">
                                    <i class="icon-pencil"></i>
                                </a> 
                                <a title="" class="btn btn-default btn-icon btn-xs tip" href="<?php echo admin_url('admin_user/delete/' . $d->id); ?>" data-original-title="Delete user" onclick="return confirm('Are you sure you want to Delete App ?')">
                                    <i class="icon-remove3"></i>
                                </a> 

                            </td> 
                        </tr> 
    <?php
    }
} else {
    echo '<tr><td colspan="5">No Result Found</td></tr>';
}
?>

            </tbody> 
        </table> 
    </div> 
</div>
