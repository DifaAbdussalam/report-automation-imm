<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Chart_http extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();		
		$this->auth->authenticate();
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
	}
	
	function index()
	{
		if($this->input->get()){
			$kota=$this->input->get('kota');
			$sdate=$this->input->get('sdate');
			$edate=$this->input->get('edate');
		}else{
			$kota='ALL';
			$sdate=date("Y-m-d",strtotime("-1 Month"));
			$edate=date('Y-m-d');
		}
		$data["title"] 		= APP_TITLE;
		$data['pages'] 		= 'report/chart_http';
		$data["kota"]		= $kota;
		$data["sdate"]		= $sdate;
		$data["edate"]		= $edate;
		$data["mkota"]		= $this->app_model->master("kota");
		$data["titleList"]	= $this->chart_model->provider_list_title();
		$data["datamin"]	= $this->chart_model->chart_http_min($kota,$sdate,$edate);
		$data["datamax"]	= $this->chart_model->chart_http_max($kota,$sdate,$edate);
		$data["dataavg"]	= $this->chart_model->chart_http_avg($kota,$sdate,$edate);
		$data["dataok"]		= $this->chart_model->chart_http_success($kota,$sdate,$edate);
		$this->load->view('index',$data);
	}
}