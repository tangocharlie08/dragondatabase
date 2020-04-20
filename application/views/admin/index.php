<?php include('admin_header.php'); ?>

<!-- Page container --> 
<div class="page-container">


    <?php include('side_bar.php'); ?>



    <!-- Page content --> 
    <div class="page-content">
        <!-- Page header -->
        <div class="page-header">
            <div class="page-title">
                <h3>Dashboard <small>Welcome <?= $this->session->userdata('admin_name'); ?></small></h3>
                
                
            <div class="page-container">
              
    </div>
            </div>
        </div>
        <!-- /page header -->

        <!-- Breadcrumbs line -->
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?php echo admin_url(); ?>">Home</a></li>
                <?php if(isset($sub_title)) { ?>
                    <li><a href="<?php echo admin_url($sub_link); ?>"><?php echo $title; ?></a></li>
                    <li class="active"><?php echo $sub_title; ?></li>
                <?php }else{ ?>
                    <li class="active"><?php echo $title; ?></li>
                <?php } ?>
            </ul>

            <div class="visible-xs breadcrumb-toggle">
                <a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons">
                    <i class="icon-menu2"></i>
                </a>
            </div>
            <ul class="breadcrumb-buttons collapse">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-accessibility"></i> 
                        <span><?php echo date('Y/M/D') ?></span> 
                        
                    </a>

                    <!--                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                             <i class="icon-search3"></i> 
                                             <span>Search</span> 
                                             <b class="caret"></b>
                                         </a>
                                         <div class="popup dropdown-menu dropdown-menu-right">
                                             <div class="popup-header">
                                                 <span>Quick search</span>
                                             </div>
                                             <form action="#" class="breadcrumb-search">
                                                 <input type="text" placeholder="Type and hit enter..." name="search" class="form-control autocomplete">
                                                 <div class="row">
                                                     <div class="col-xs-6">
                                                         <label class="radio">
                                                             <input type="radio" name="search-option" class="styled">Content
                                                         </label>
                                                     </div>
                                                     <div class="col-xs-6">
                                                         <label class="radio">
                                                             <input type="radio" name="search-option" class="styled">Users
                                                         </label>
                                                     </div>
                                                 </div>
                                                 <input type="submit" class="btn btn-block btn-success" value="Search">
                                             </form>
                                         </div>-->
                </li>

            </ul>
            
        </div>
        <!-- /breadcrumbs line --> 
         <div>
            <!-- <center><img src="images/dragon.jpg" width="500" height="300" alt="dragon" /></center> -->
        </div>
        <!-- <center><h1>Eastern Water Dragon</h1></center> -->


        <?php
        if (isset($main)) {
            $this->load->view('admin/' . $main);
        }
        ?>



<?php include('admin_footer.php'); ?>