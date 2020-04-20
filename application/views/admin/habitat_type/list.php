<?php if ($this->session->flashdata('message')) { ?>
    <div class="breadcrumb-line">
        <p class="breadcrumb" style="color: green; font-weight: bold;">
            <?php echo $this->session->flashdata('message'); ?>
        </p>
    </div>
<?php } ?>
<div class="panel panel-default"> 
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-user"></i>Habitat Type List</h6>
        <h6 class="panel-title pull-right">
            <a href="<?php echo admin_url('habitat_type_management/add') ?>">
                <i class="icon-plus"></i>				
            </a>									 
        </h6>
    </div> 
    <div class="table-responsive"> 
        <table class="table table-striped table-bordered"> 
            <thead> 
                <tr> 
                    <th>ID</th>
                    <!-- <th>Parent</th> -->
                    <th>Habitat</th> 
                    <th>Action</th>
                </tr> 
            </thead> 
            <tbody>
                <?php if (count($detail) != 0) { ?>
                    <?php foreach ($detail as $d) { ?>


                        <tr> 
                            <td><?php echo $d->id; ?></td> 					 
                            <!-- <td>
                            <?php
                            /* $parent=$this->db->get_where('category_management',array('id'=> $d->parent_id))->row();
                              if($d->parent_id == 0){
                              echo "N/A";
                              }else{
                              echo $parent->name;
                              } */
                            ?>
                            </td> 	 -->				 
                            <td><?php echo $d->type; ?></td> 					 


                            <td> 
                                <?php if ($d->id == 0) continue; ?>
                                <a data-original-title="Edit" href="<?php echo admin_url('habitat_type_management/edit/' . $d->id); ?>" class="btn btn-default btn-icon btn-xs tip" title="">
                                    <i class="icon-pencil"></i>
                                </a> 
                                <a onclick="return confirm('Are you sure you want to Delete this Habitat Type?')" data-original-title="Delete" href="<?php echo admin_url('habitat_type_management/delete/' . $d->id); ?>" class="btn btn-default btn-icon btn-xs tip" title="">
                                    <i class="icon-remove3"></i>
                                </a>

                            </td> 
                        </tr>

                    <?php } ?>
                <?php }else{ ?>
                    <?php echo '<tr><td colspan="10">No Result Found</td></tr>'; ?>
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
