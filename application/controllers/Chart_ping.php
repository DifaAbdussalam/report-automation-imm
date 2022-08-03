<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Chart_ping extends CI_Controller 
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
		$data['pages'] 		= 'report/chart_ping';
		$data["kota"]		= $kota;
		$data["sdate"]		= $sdate;
		$data["edate"]		= $edate;
		$data["mkota"]		= $this->app_model->master("kota");
		$data["titleList"]	= $this->chart_model->provider_list_title();
		$data["dataavg"]	= $this->chart_model->chart_ping_delay_avg($kota,$sdate,$edate);
		$data["dataloss"]	= $this->chart_model->chart_ping_loss($kota,$sdate,$edate);
		$this->load->view('index',$data);
	}
}