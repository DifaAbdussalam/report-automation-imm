<?php
class Periode
{
    var $CI='';
	public function __construct() {
		$this->CI =&get_instance();
	}

	public function get_month(){
		$data=array('1'=>'Januari','2'=>'Februari','3'=>'Maret','4'=>'April','5'=>'Mei','6'=>'Juni','7'=>'Juli','8'=>'Agustus','9'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember');
		return $data;
	}
	
	public function get_year(){
		$data		= array();
		$firstYear 	= (int)date('Y') - 5;
		$lastYear 	= (int)date('Y');
		for($tahun=$lastYear;$tahun>=$firstYear;$tahun--){
			 $data[] = $tahun;
		}
		return $data;
	}
}
