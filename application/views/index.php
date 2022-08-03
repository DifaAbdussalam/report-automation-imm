<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo APP_TITLE;?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?php echo asset_url('bootstrap/css/bootstrap.min.css'); ?>"/>
	<link rel="stylesheet" href="<?php echo asset_url('plugins/font-awesome-4.6.3/css/font-awesome.min.css'); ?>"/>
    <!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo asset_url('plugins/ionicons/css/ionicons.min.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo asset_url('plugins/daterangepicker/daterangepicker-bs3.css'); ?>"/>
	<link rel="stylesheet" href="<?php echo asset_url('plugins/iCheck/all.css'); ?>"/>
	<link rel="stylesheet" href="<?php echo asset_url('plugins/colorpicker/bootstrap-colorpicker.min.css'); ?>"/>
	<link rel="stylesheet" href="<?php echo asset_url('plugins/timepicker/bootstrap-timepicker.min.css'); ?>"/>
	<link rel="stylesheet" href="<?php echo asset_url('plugins/select2/select2.min.css'); ?>"/>
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo asset_url('plugins/jvectormap/jquery-jvectormap-1.2.2.css'); ?>"/>
	<link rel="stylesheet" href="<?php echo asset_url('core/css/AdminLTE.min.css'); ?>"/>
	<link rel="stylesheet" href="<?php echo asset_url('core/css/skins/skin-yellow.css'); ?>"/>
	<link rel="stylesheet" href="<?php echo asset_url('plugins/datatables/css/jquery.dataTables.min.css'); ?>"/>
	<link rel="shortcut icon" href="<?php echo asset_url('core/img/favicon.png'); ?>" />

	<script src="<?php echo asset_url('plugins/datatables.tools/jquery-3.3.1.js'); ?>"></script>
	<script src="<?php echo asset_url('bootstrap/js/bootstrap.min.js'); ?>"></script>

	<script src="<?php echo asset_url('plugins/select2/select2.full.min.js'); ?>"></script>
    <script src="<?php echo asset_url('plugins/input-mask/jquery.inputmask.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/input-mask/jquery.inputmask.date.extensions.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/input-mask/jquery.inputmask.extensions.js'); ?>"></script>
	<!-- moment style -->
	<script src="<?php echo asset_url('plugins/moment/min/moment.min.js'); ?>"></script>
    <script src="<?php echo asset_url('plugins/daterangepicker/daterangepicker.js'); ?>"></script>
    <script src="<?php echo asset_url('plugins/colorpicker/bootstrap-colorpicker.min.js'); ?>"></script>

    <script src="<?php echo asset_url('plugins/timepicker/bootstrap-timepicker.min.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/iCheck/icheck.min.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/fastclick/fastclick.min.js'); ?>"></script>
	
	<!--datatable-->
	<script src="<?php echo asset_url('plugins/datatables.tools/jszip.min.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/datatables.tools/pdfmake.min.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/datatables.tools/vfs_fonts.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/datatables.tools/jquery.dataTables.min.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/datatables.tools/dataTables.buttons.min.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/datatables.tools/buttons.bootstrap.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/datatables.tools/buttons.html5.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/datatables.tools/buttons.print.js'); ?>"></script>
	<script src="<?php echo asset_url('core/js/app.min.js'); ?>"></script>
	<!--general-->
	<script src="<?php echo asset_url('plugins/sparkline/jquery.sparkline.min.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/chartjs/Chart.min.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/ckeditor/ckeditor.js'); ?>"></script>
	<script src="<?php echo asset_url('core/js/demo.js'); ?>"></script>
	<script>
	$(document).ready(function() {
		$(".select3").select2();
	});
	</script>	
  </head>
  <body class="hold-transition skin-yellow sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <a href="<?php echo site_url('home');?>" class="logo">
          <span class="logo-mini"><b>ADMIN</b></span>
          <span class="logo-lg"><b><?php echo APP_NAME;?></b></span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo asset_url('upload/admin/'.$this->auth->foto.''); ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $this->auth->nama;?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <img src="<?php echo asset_url('upload/admin/'.$this->auth->foto.''); ?>" class="img-circle" alt="User Image">
                    <p>
                     <?php echo $this->auth->nama;?>  
					<small><i><?php echo $this->auth->username;?></i></small>
					</p>
                  </li>
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo site_url('profile'); ?>" class="btn btn-primary btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo site_url('logout'); ?>" class="btn btn-warning btn-flat">Logout</a>
                    </div>
                  </li>
                </ul>
              </li>
               <li>
                <a href="#" data-toggle="control"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
    </header>
	<?php $this->load->view('navigasi');?>
	<?php $this->load->view($pages);?>
	<div class="modal" style="display: none;  padding-top: 250px;" align="center">
		<div class="center">
			<img src="<?php echo asset_url('core/img/loader.gif');?>" />
		</div>
	</div>
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          Page rendered in <strong>{elapsed_time}</strong> seconds, memory usage : <strong>{memory_usage}</strong>
        </div>
        <strong>Copyright &copy; <?php echo date('Y');?></a></strong> All rights reserved.
      </footer>
    </div>
  </body>
</html>
