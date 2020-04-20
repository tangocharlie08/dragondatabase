
<div class="sidebar collapse">
    <div class="sidebar-content">
        <!-- User dropdown -->
        <div class="user-menu dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php
                if ($profile->image == '') {
                    echo admin_img('no-image.jpg');
                } else {
                    echo base_url('uploads/admin_user/' . $profile->image);
                }
                ?>" alt="">
                <div class="user-info"><?= $this->session->userdata('admin_name'); ?><span><?php if($this->session->userdata('admin_type') == 1){echo "Super User";}else{echo "Normal user";} ?></span>
                </div>
            </a>
            <div class="popup dropdown-menu dropdown-menu-right"> 
                <div class="thumbnail"> 
                    <div class="thumb"><img alt="" src="
                        <?php
                        if ($profile->image == '') {
                            echo admin_img('no-image.jpg');
                        } else {
                            echo base_url('uploads/admin_user/' . $profile->image);
                        }
                        ?>">
                        <div class="thumb-options">
                            <span>
                                <a href="<?php echo admin_url('admin_user/edit/' . $this->session->userdata('admin_user_id')) ?>" class="btn btn-icon btn-success"><i class="icon-pencil"></i></a>
                            </span>
                        </div> 
                    </div> 
                    <div class="caption text-center"> 
                        <h6><?= $this->session->userdata('admin_name'); ?> <small>Content Creator</small></h6> 
                    </div> 
                </div> 
            </div>
        </div>
        <!-- /user dropdown 

        <!-- Main navigation -->
        <ul class="navigation">
            <li class="<?php
            if ($title == 'Dashboard')
                echo "active";
            ?>"><a class="sidebar-link" href="<?php echo admin_url(); ?>"><span>Dragon Dashboard</span> <i class="icon-screen2"></i></a></li>
            <li class="<?php
            if ($title == 'Admin user')
                echo "active";
            ?>"><a class="sidebar-link" href="<?php echo admin_url('admin_user'); ?>"><span>Users Management</span> <i class="fa fa-users sidbar-icons"></i></a></li>

            <li class="<?php
            if ($title == 'Individual Dragon Management') {
                echo "active";
            }
            ?>"><a class="sidebar-link" href="<?php echo admin_url('dragon_management'); ?>"><span>Individual Dragon Management</span><i class="fa fa-dragon sidbar-icons"></i></a></li>

            <li class="<?php
            if ($title == 'Dragon Contacts Management') {
                echo "active";
            }
            ?>"><a class="sidebar-link" href="<?php echo admin_url('dragon_contacts_management'); ?>"><span> Dragon Contacts Management</span> <i class="fa fa-clock sidbar-icons"></i></a></li> 


            <li class="<?php
            if ($title == 'Dragon Catchings Management') {
                echo "active";
            }
            ?>"><a class="sidebar-link" href="<?php echo admin_url('dragon_catchings_management'); ?>"><span>Dragon Catchings Management</span><i class="fa fa-hand-rock sidbar-icons"></i></a></li> 

            <li class="<?php
            if ($title == 'Dragon Sightings Management') {
                echo "active";
            }
            ?>"><a class="sidebar-link" href="<?php echo admin_url('dragon_sightings_management'); ?>"><span>Dragon Sightings Management</span><i class="fa fa-eye sidbar-icons"></i></a></li> 




             <li class="<?php
            if ($title == 'Dragon Photo Management') {
                echo "active";
            }
            ?>"><a class="sidebar-link" href="<?php echo admin_url('dragon_photos_management'); ?>"><span>Dragons Photo Management</span> <i class="fa fa-image sidbar-icons"></i></a></li> 
              
            
            <li class="<?php
            if ($title == 'General Location Management') {
                echo "active";
            }
            ?>"><a class="sidebar-link" href="<?php echo admin_url('general_location_management'); ?>"><span>General Location Management</span> <i class=" fas fa-location-arrow sidbar-icons"></i></a></li>        
                            
            
             
            
            

            <li class="<?php
            if ($title == 'Habitat Type Management') {
                echo "active";
            }
            ?>"><a class="sidebar-link" href="<?php echo admin_url('habitat_type_management'); ?>"><span>Habitat Type Management</span> <i class="fa fa-igloo sidbar-icons"></i></a></li>

            <?php if($this->session->userdata('admin_type')) { ?>
            <li class="<?php
            if ($title == 'Log Management') {
                echo "active";
            }
            ?>"><a class="sidebar-link" href="<?php echo admin_url('log_management'); ?>"><span> Log Management</span> <i class=" fas fa-list sidbar-icons"></i></a></li>
        <?php } ?>

            <li class=""><a style="opacity: 0.5;" class="sidebar-link" onclick="return alert('This feature is not available on this verison.')"><span>Deleted Dragons Data</span> <i class="fa fa-trash-alt sidbar-icons"></i></a></li>  

            <li class=""><a style="opacity: 0.5;" class="sidebar-link" onclick="return alert('This feature is not available on this verison.')"><span>History Data</span> <i class="fa fa-history sidbar-icons"></i></a></li> 
            <li class=""><a style="opacity: 0.5;" class="sidebar-link" onclick="return alert('This feature is not available on this verison.')"><span>Advanced Query</span> <i class="fa fa-search sidbar-icons"></i></a></li>   

            <li class=""><a style="opacity: 0.5;" class="sidebar-link" onclick="return alert('This feature is not available on this verison.')"><span>Graphs and Charts</span> <i class="fa fa-chart-line sidbar-icons"></i></a></li>   
            <li class=""><a style="opacity: 0.5;" class="sidebar-link" onclick="return alert('This feature is not available on this verison.')"><span>Facial Recognation</span> <i class="fa fa-id-badge sidbar-icons"></i></a></li>     
           
            

            

            
            
            
            
            


        </ul>
        <!-- /main navigation -->
    </div>
</div><!-- /sidebar