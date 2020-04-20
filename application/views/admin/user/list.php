<?php if ($this->session->flashdata('message')) { ?>
    <div class="breadcrumb-line">
        <p class="breadcrumb" style="color: green; font-weight: bold;">
            <?php echo $this->session->flashdata('message'); ?>
        </p>
    </div>
<?php } ?>
<div class="panel panel-default"> 
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-user"></i>User Lists</h6>
       <?php 
            $user_id = $this->session->userdata("admin_user_id");
            
            $user_type = $this->db->get_where("admin", array("id"=> $user_id))->row()->user_type;
            
        ?>
        <?php if($user_type == 1) { ?>
        <h6 class="panel-title pull-right">
            <a href="<?php echo admin_url('admin_user/add_new'); ?>">
                <i class="icon-plus"></i>               
            </a>                                     
        </h6>
        <?php } ?>
    

    </div> 
    <div class="table-responsive"> 
        <table class="table table-striped table-bordered"> 
            <thead> 
                <tr> 
                    <th>ID</th>
                    <th>Name</th> 
                    <th>Initials</th>
                    <th>Email</th> 
                    <th>Username</th> 

                    <th>User Type</th>
                    <th>Active Status</th>
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
                            <td><?php echo $d->initials; ?></td>                     
                            <td><?php echo $d->email; ?></td> 	
                            <td><?php echo $d->username; ?></td>                     
                            <td>
                                <?php 
                                if($d->user_type == 0){ 
                                    echo "Normal User"; 
                                }
                                else{ 
                                    echo "Super User"; 
                                }
                                ?>                               
                            </td>  
                                              
                                <td style="font-weight:bold; color:
                                    <?php
                                        if ($d->status == 0) {
                                            echo 'red';
                                        } elseif ($d->status == 1) {
                                            echo 'green';
                                        }
                                        ?> 
                                ">
                                    <?php
                                    if ($d->status == 0) {
                                        echo 'Inactive';
                                    } elseif ($d->status == 1) {
                                        echo 'Active';
                                    }
                                    ?>
                                    
                                </td>
                        			 
                            <!-- <td><img height="60px" width="65px" src="<?php if ($d->image == '') {
                    // echo admin_img('no-image.jpg');
                // } else {
                    // echo base_url('uploads/admin_user/' . $d->image);
                } ?>" alt=""></td>  -->					 
                            <td>  
                                <?php if($d->user_type == 0) { ?>
                                    <a title="" class="btn btn-default btn-icon btn-xs tip" href="<?php echo admin_url('admin_user/edit/' . $d->id); ?>" data-original-title="Edit user">
                                        <i class="icon-pencil"></i>
                                    </a>
                                <?php }else{ ?>
                                    <?php if($this->session->userdata('admin_user_id') == $d->id){ ?>
                                        <a title="" class="btn btn-default btn-icon btn-xs tip" href="<?php echo admin_url('admin_user/edit/' . $d->id); ?>" data-original-title="Edit user">
                                        <i class="icon-pencil"></i>
                                        </a>
                                    <?php } ?>

                                <?php } ?> 
                                <?php if($d->user_type == 0) { ?>
                                <?php if ($d->status == 0) { ?>
                                    <a onclick="return confirm('Are you sure you want to Activate this user?')" href="<?php echo admin_url('admin_user/change_status/' . $d->id); ?>"><button style="margin-bottom: 5px;" class="btn btn-small btn-success">Activate</button></a>
                                    <?php } elseif ($d->status == 1) { ?>
                                    <a onclick="return confirm('Are you sure you want to deactivate this user?')" href="<?php echo admin_url('admin_user/change_status/' . $d->id); ?>"> <button class="btn btn-small btn-danger">Deactivate</button></a>
                                <?php } ?>
                            <?php }?>

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
