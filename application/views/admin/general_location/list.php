<?php if ($this->session->flashdata('message')) { ?>
    <div class="breadcrumb-line">
        <p class="breadcrumb" style="color: green; font-weight: bold;">
            <?php echo $this->session->flashdata('message'); ?>
        </p>
    </div>
<?php } ?>
<div class="panel panel-default"> 
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-user"></i>General Locations</h6>
        <?php if($this->session->userdata('admin_type') == 1) { ?>
            <h6 class="panel-title pull-right">
                <a href="<?php echo admin_url('general_location_management/add') ?>">
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
                    <th>Dragon Type</th>
                    <th>Created Date</th>
                    <th>Action</th>
                </tr> 
            </thead> 
            <tbody>
                <?php foreach ($detail as $d) { ?>
                    <tr> 
                        <td><?php echo $d->id; ?></td> 					 
                        <td><?php echo $d->location; ?></td>
                        <td><?php echo date('Y-m-d H:i:s',$d->created); ?></td>

                        <td> 
                            <?php if ($d->id == 0) continue; ?>
                            <a data-original-title="Edit" href="<?php echo admin_url('general_location_management/edit/' . $d->id); ?>" class="btn btn-default btn-icon btn-xs tip" title="">
                                <i class="icon-pencil"></i>
                            </a> 
                            <a onclick="return confirm('Are you sure you want to Delete this location?')" data-original-title="Delete" href="<?php echo admin_url('general_location_management/delete/' . $d->id); ?>" class="btn btn-default btn-icon btn-xs tip" title="">
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
