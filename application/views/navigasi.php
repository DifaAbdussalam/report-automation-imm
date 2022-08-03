<aside class="main-sidebar">
<section class="sidebar">
  <div class="user-panel">
	<div class="pull-left image">
	  <img src="<?php echo asset_url('upload/admin/'.$this->auth->foto.''); ?>" class="img-circle" alt="User Image">
	</div>
	<div class="pull-left info">
	 <p><?php echo $this->auth->nama;?></p>
	 <small><i class="fa fa-circle text-success"></i> Online</small>
	</div>
  </div>
  <ul class="sidebar-menu">
	<li class="header">NAVIGATION MENU</li>
	<li class="activetreeview">
	  <a href="<?php echo site_url('home');?>">
		 <i class="fa fa-home"></i><span>Home</span>
	  </a>
	</li>
	<li class="treeview">
	  <a href="#">
		<i class="fa fa-database"></i>
		<span>Data</span>
	  </a>
	  <ul class="treeview-menu">
		<li><a href="<?php echo site_url('ftp_throughput_dl_k_0');?>"><i class="fa fa-file-text"></i> <span>FTP DL</span></a></li>
		<li><a href="<?php echo site_url('ftp_throughput_ul_k_0');?>"><i class="fa fa-file-text"></i> <span>FTP UL</span></a></li>
		<li><a href="<?php echo site_url('http_browser_through_0');?>"><i class="fa fa-file-text"></i> <span>Browsing</span></a></li>
		<li><a href="<?php echo site_url('capacity_test_throug_0');?>"><i class="fa fa-file-text"></i> <span>Capacity DL</span></a></li>
		<li><a href="<?php echo site_url('capacity_test_throug_1');?>"><i class="fa fa-file-text"></i> <span>Capacity UL</span></a></li>
		<li><a href="<?php echo site_url('ping_rtt_ms_0');?>"><i class="fa fa-file-text"></i> <span>Ping Test</a></span></li>
		<li><a href="<?php echo site_url('radio_technology_0');?>"><i class="fa fa-file-text"></i> <span>Radio Technology</a></span></li>
		<li><a href="<?php echo site_url('serving_rs_rp_dbm_0');?>"><i class="fa fa-file-text"></i> <span>RSRP</span></a></li>
		<li><a href="<?php echo site_url('serving_rs_rq_db_0');?>"><i class="fa fa-file-text"></i> <span>RSRQ</span></a></li>
		<li><a href="<?php echo site_url('as_aggr_cpich_rscp_0');?>"><i class="fa fa-file-text"></i> <span>RSCP</span></a></li>
		<li><a href="<?php echo site_url('as_aggr_cpich_ec_Io_0');?>"><i class="fa fa-file-text"></i> <span>ECIO</span></a></li>
		<li><a href="<?php echo site_url('rxlev_dbm_0');?>"><i class="fa fa-file-text"></i> <span>RxLev</a></span></li>
		<li><a href="<?php echo site_url('rxqual_0');?>"><i class="fa fa-file-text"></i> <span>RxQual</a></span></li>
	  </ul>
	</li>
	<li class="treeview">
	  <a href="#">
		<i class="fa fa-pie-chart"></i>
		<span>Report</span>
	  </a>
		<ul class="treeview-menu">
		<li><a href="<?php echo site_url('chart_ftp_dl');?>"><i class="fa fa-file-text"></i> <span>FTP DL</a></span></li>
		<li><a href="<?php echo site_url('chart_ftp_ul');?>"><i class="fa fa-file-text"></i> <span>FTP UL</a></span></li>
		<li><a href="<?php echo site_url('chart_http');?>"><i class="fa fa-file-text"></i> <span>Browsing</a></span></li>
		<li><a href="<?php echo site_url('chart_capacity_dl');?>"><i class="fa fa-file-text"></i> <span>Capacity DL</a></span></li>
		<li><a href="<?php echo site_url('chart_capacity_ul');?>"><i class="fa fa-file-text"></i> <span>Capacity UL</a></span></li>
		<li><a href="<?php echo site_url('chart_radio');?>"><i class="fa fa-file-text"></i> <span>RadioTech</span></a></li>
		<li><a href="<?php echo site_url('chart_ping');?>"><i class="fa fa-file-text"></i> <span>Ping Test</span></a></li>
		<li><a href="<?php echo site_url('chart_rsrp');?>"><i class="fa fa-file-text"></i> <span>RSRP</span></a></li>
		<li><a href="<?php echo site_url('chart_rsrq');?>"><i class="fa fa-file-text"></i> <span>RSRQ</span></a></li>
		<li><a href="<?php echo site_url('chart_rscp');?>"><i class="fa fa-file-text"></i> <span>RSCP</span></a></li>
		<li><a href="<?php echo site_url('chart_ecio');?>"><i class="fa fa-file-text"></i> <span>ECIO</span></a></li>
		<li><a href="<?php echo site_url('chart_rxlev');?>"><i class="fa fa-file-text"></i> <span>RXLEV</span></a></li>
		<li><a href="<?php echo site_url('chart_rxqual');?>"><i class="fa fa-file-text"></i> <span>RXQUAL</span></a></li>
		<li><a href="<?php echo site_url('summary');?>"><i class="fa fa-file-text"></i> <span>Summary Radio</span></a></li>
		</ul>
	</li>
	<li class="treeview">
	  <a href="#">
		<i class="fa fa-folder"></i>
		<span>Master</span>
	  </a>
	  <ul class="treeview-menu">
		<li><a href="<?php echo site_url('provider');?>"><i class="fa fa-file-text"></i> <span> Provider</span></a></li>
		<li><a href="<?php echo site_url('kota');?>"><i class="fa fa-file-text"></i> <span> Kota</span></a></li>
		<li><a href="<?php echo site_url('admin');?>"><i class="fa fa-file-text"></i> <span> Admin</span></a></li>
	  </ul>
	</li>
	<li><a href="<?php echo site_url('profile');?>">
		<i class="fa fa-lock"></i> Profile</a>
	</li>
	<li>
	  <a href="<?php echo site_url('logout');?>">
		 <i class="fa fa-sign-out"></i><span>Logout</span>
	  </a>
	</li>

  </ul>
</section>
</aside>