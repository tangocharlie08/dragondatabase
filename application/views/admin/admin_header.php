<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= config_item('site_name'); ?></title>
        <link href="<?php echo admin_css('bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo admin_css('londinium-theme.min.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo admin_css('custom_style.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo admin_css('styles.min.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo admin_css('icons.min.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo admin_css('all.css'); ?>" rel="stylesheet" type="text/css">

        <link href="<?php echo admin_css('jquery.guillotine.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">

        <script type="text/javascript" src="<?php echo admin_js('jquery.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('jquery-ui.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/charts/sparkline.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/uniform.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/uniform.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/inputmask.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/autosize.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/inputlimit.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/listbox.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/multiselect.js'); ?>"></script>
<!--        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/validate.min.js'); ?>"></script>-->
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/tags.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/switch.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/uploader/plupload.full.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/uploader/plupload.queue.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/wysihtml5/wysihtml5.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/wysihtml5/toolbar.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/interface/daterangepicker.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/interface/fancybox.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/interface/moment.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/interface/jgrowl.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/interface/datatables.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/interface/colorpicker.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/interface/fullcalendar.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/interface/timepicker.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/interface/collapsible.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('bootstrap.min.js'); ?>"></script>
        <script src="<?php echo admin_js('jquery.guillotine.js'); ?>" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo admin_js('datetime/jquery.datetimepicker.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/slide_image/js/jquery-1.11.3.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/slide_image/js/jssor.slider-27.5.0.min.js'); ?>"></script>
        <script src="<?php echo admin_js('all.js'); ?>" type="text/javascript"></script>
        
        <script src="<?php echo admin_js('custom.js'); ?>" type="text/javascript"></script>

<!--         <script type="text/javascript" src="<?php echo admin_js('application.js'); ?>"></script> -->

    </head>
    <body class="sidebar-wide">
        <!-- Navbar -->
        <div class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo admin_url(); ?>">
                    <?php echo config_item('site_name') ?>
                </a>
                <a class="sidebar-toggle"><i class="icon-paragraph-justify2"></i></a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-icons">
                    <span class="sr-only">Toggle navbar</span><i class="icon-grid3"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar">
                    <span class="sr-only">Toggle navigation</span><i class="icon-paragraph-justify2"></i>
                </button>
                
            </div>
            <ul class="nav navbar-nav navbar-right collapse" id="navbar-icons">

               <!--  <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle"><i class="icon-grid"></i></a>
                    <div class="popup dropdown-menu dropdown-menu-right">
                        <div class="popup-header">
                            <a href="#" class="pull-left"><i class="icon-spinner7"></i></a>
                            <span>Tasks list</span>
                            <a href="#" class="pull-right"><i class="icon-new-tab"></i></a>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th class="text-center">Priority</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <span class="status status-success item-before"></span> 
                                        <a href="#">Frontpage fixes</a>
                                    </td>
                                    <td>
                                        <span class="text-smaller text-semibold">Bugs</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="label label-success">87%</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </li> -->
                <li class="user dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                       <img src="<?php
                        if ($profile->image == '') {
                            echo admin_img('no-image.jpg');
                        } else {
                            echo base_url('uploads/admin_user/' . $profile->image);
                        }
                        ?>" alt="">
                        <span><?= $this->session->userdata('admin_name'); ?></span>
                        <i class="caret"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right icons-right">
                        <li><a href="<?= admin_url('login/logout'); ?>"><i class="icon-exit"></i> Logout</a></li>
                    </ul>
                </li>

        </div>
        <!-- /navbar 