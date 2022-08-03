<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->auth->authenticate();
	}
		
	function index()
	{	
		$data=array();
		$data["title"] 					= APP_TITLE;
		$data["pages"] 					= 'home';
		$data["as_aggr_cpich_ec_io_0"]	= $this->app_model->total('as_aggr_cpich_ec_io_0');
		$data["as_aggr_cpich_rscp_0"] 	= $this->app_model->total('as_aggr_cpich_rscp_0');
		$data["capacity_test_throug_0"] = $this->app_model->total('capacity_test_throug_0');
		$data["capacity_test_throug_1"] = $this->app_model->total('capacity_test_throug_1');
		$data["ftp_throughput_dl_k_0"] 	= $this->app_model->total('ftp_throughput_dl_k_0');
		$data["ftp_throughput_ul_k_0"] 	= $this->app_model->total('ftp_throughput_ul_k_0');
		$data["http_browser_through_0"] = $this->app_model->total('http_browser_through_0');
		$data["ping_rtt_ms_0"] 			= $this->app_model->total('ping_rtt_ms_0');
		$data["radio_technology_0"] 	= $this->app_model->total('radio_technology_0');
		$data["rxlev_dbm_0"] 			= $this->app_model->total('rxlev_dbm_0');
		$data["rxqual_0"] 				= $this->app_model->total('rxqual_0');
		$data["serving_rs_rp_dbm_0"] 	= $this->app_model->total('serving_rs_rp_dbm_0');
		$data["serving_rs_rq_db_0"] 	= $this->app_model->total('serving_rs_rq_db_0');
		$this->load->view('index',$data);
		
		
		
		














	}
}
