<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?=config_item('site_name');?></title>
        <link href="<?php echo admin_css('bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo admin_css('londinium-theme.min.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo admin_css('styles.min.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo admin_css('icons.min.css'); ?>" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="<?php echo admin_js('jquery.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('jquery-ui.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/charts/sparkline.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/uniform.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/select2.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/inputmask.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/autosize.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/inputlimit.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/listbox.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/multiselect.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo admin_js('plugins/forms/validate.min.js'); ?>"></script>
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
        <script type="text/javascript" src="<?php echo admin_js('application.js'); ?>"></script>

    </head>
    <body class="full-width page-condensed">
        <!-- Navbar -->
        <div class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-right">
                    <span class="sr-only">Toggle navbar</span>
                    <i class="icon-grid3"></i>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>">Dragon Database Management</a>
            </div>
        </div>
        <!-- /navbar --><!-- Login wrapper -->
        <div class="login-wrapper"> 
            <form action="<?=admin_url('login/process');?>" role="form" method="post">
                <div class="popup-header">
                    <a href="#" class="pull-left"><i class="icon-user-plus"></i></a>
                    <span class="text-semibold">Admin Login</span>
                    <div class="btn-group pull-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cogs"></i></a>
                        <ul class="dropdown-menu icons-right dropdown-menu-right">
                            <li><a href="#"><i class="icon-info"></i> Forgot password?</a></li> 
                        </ul>
                    </div>
                </div>

                <div class="well">
                	<b style="color:red;"><?=$this->session->flashdata('message');?></b>
                    <div class="form-group has-feedback">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Username" name="username"><i class="icon-users form-control-feedback"></i>
                    </div>
                    <div class="form-group has-feedback"><label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password"><i class="icon-lock form-control-feedback"></i>
                    </div>
                    <div class="row form-actions">
                        <div class="col-xs-6">
                            <div class="checkbox checkbox-success">
                                <label>
                                    <input type="checkbox" class="styled">Remember me</label>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <button type="submit" class="btn btn-warning pull-right"><i class="icon-menu2"></i> Sign in</button>
                        </div>
                    </div>
                </div> 
            </form>
        </div>
        <!-- /login wrapper --> <!-- Footer --> 
        <div class="footer clearfix"> 
            <div class="pull-left">&copy; 2014. <?=base_url();?></a> <a href="http://themeforest.net/user/Kopyov">Admin Panel</a></div> 
            <div class="pull-right icons-group"> 
                <a href="#"><i class="icon-screen2"></i></a> 
                <a href="#"><i class="icon-balance"></i></a> 
                <a href="#"><i class="icon-cog3"></i></a> 
            </div> 
        </div> 
        <!-- /footer -->
    </body>
</html>