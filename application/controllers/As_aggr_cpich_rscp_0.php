<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class As_aggr_cpich_rscp_0 extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();		
		$this->auth->authenticate();
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
	}
	
	function index()
	{
		$data["title"] 		= APP_TITLE;
		$data['pages'] 		= 'data/as_aggr_cpich_rscp_0';
		$data["date"]		= date('Y-m-d');
		$data["mkota"]		= $this->app_model->master("kota");
		$data["mdata"]		= $this->data_model->data_as_aggr_cpich_rscp_0();
		$this->load->view('index',$data);
	}
	
	function filter_kota()
	{
		if($this->input->post('kota')){
			$this->session->set_userdata('filter_kota',$this->input->post('kota'));
			echo json_encode(array("status" => TRUE));
		}else{
			$this->session->unset_userdata('filter_kota');
			echo json_encode(array("status" => FALSE));
		}
	}
	
	function upload()
	{
		if($this->input->post()){
			ini_set('max_execution_time', 3600);
			ini_set('memory_limit', -1);
			$inputDate=$this->input->post('inputDate');
			$kota=$this->input->post('id_kota');
			if (isset($_FILES['userfile']) && $_FILES['userfile']['size'] > 0){
				$this->upload_path='./asset/upload/excel/';
				if (!is_dir($this->upload_path)){
					mkdir($this->upload_path,0777,TRUE);
				}					
				$config['upload_path']	=$this->upload_path;
				$config["file_name"]	=md5('dmyhis').'_upload_param2_'.$_FILES['userfile']['name'];
				$config["allowed_types"]='*';
				$this->load->library('upload', $config);
				if($this->upload->do_upload()){
					$file_data = $this->upload->data();
					$file_path = $this->upload_path.$file_data['file_name'];
					$excelreader= new PHPExcel_Reader_Excel2007();
					$loadexcel 	= $excelreader->load($file_path);
					$sheet 		= $loadexcel->getActiveSheet()->toArray(null, true, true, true);
					$numrow		= 1;
					foreach ($sheet as $row){
						if($numrow > 1){
							$data['inputDate'] 		= $inputDate;
							$data['id_kota']		= $kota;
							$data['UniqueId'] 		= $row['A'];
							$data['CID'] 			= $row['B'];
							$data['LAC'] 			= $row['C'];
							$data['MCC'] 			= $row['D'];
							$data['MNC'] 			= $row['E'];
							$data['CGI'] 			= $row['F'];
							$data['Technology'] 	= $row['G'];
							$data['Lon'] 			= $row['H'];
							$data['Lat'] 			= $row['I'];
							$data['SessionId'] 		= $row['J'];
							$data['TestId'] 		= $row['K'];
							$data['NetworkId'] 		= $row['L'];
							$data['SystemName'] 	= $row['M'];
							$data['ADevice'] 		= $row['N'];
							$data['Time'] 			= $row['O'];
							$data['PosId'] 			= $row['P'];
							$data['FileId'] 		= $row['Q'];
							$data['BTSLon'] 		= $row['R'];
							$data['BTSLat'] 		= $row['S'];
							$data['BTSLonDiff'] 	= $row['T'];
							$data['BTSLatDiff'] 	= $row['U'];
							$data['BTSDist'] 		= $row['V'];
							$data['BTS2LonDiff'] 	= $row['W'];
							$data['BTS2LatDiff'] 	= $row['X'];
							$data['BTS2Dist'] 		= $row['Y'];
							$data['BTS3LonDiff'] 	= $row['Z'];
							$data['BTS3LatDiff'] 	= $row['AA'];
							$data['BTS3Dist'] 		= $row['AB'];
							$data['BTSTech'] 		= $row['AC'];
							$data['FloorPlanName'] 	= $row['AD'];
							$data['FloorPlanLevel'] = $row['AE'];
							$data['SessionIdLP'] 	= $row['AF'];
							$data['TestIdLP'] 		= $row['AG'];
							$data['PosIdLP'] 		= $row['AH'];
							$data['NetworkIdLP'] 	= $row['AI'];
							$data['AvgRSCP'] 		= $row['AJ'];
							$data['numCells'] 		= $row['AK'];
							$data['ChPSC'] 			= $row['AL'];
							$this->app_model->simpan("as_aggr_cpich_rscp_0",$data);
						}
						$numrow++;
					}
					unlink($file_path);
					$this->session->set_flashdata('info','Data berhasil diupload !');
					redirect('as_aggr_cpich_rscp_0');
				}else{
					$this->session->set_flashdata('info',$this->upload->display_errors());
					redirect('as_aggr_cpich_rscp_0');
				}
				
			}else{
				$this->session->set_flashdata('info','Data gagal diupload !');
				redirect('as_aggr_cpich_rscp_0');
			}
		}
	}
	
	
	function export()
	{
		if($this->input->post()){
			
			$start	=$this->input->post('start');
			$end	=$this->input->post('end');
			$kota	=$this->input->post('id_kota');
			
			$this->excel = new PHPExcel();
			$this->excel->setActiveSheetIndex(0);
			$this->excel->getActiveSheet()->setTitle('as_aggr_cpich_rscp_0');
			$this->excel->getActiveSheet()->getCell('A1')->setValue("UniqueId");
			$this->excel->getActiveSheet()->getCell('B1')->setValue("CID");
			$this->excel->getActiveSheet()->getCell('C1')->setValue("LAC");
			$this->excel->getActiveSheet()->getCell('D1')->setValue("MCC");
			$this->excel->getActiveSheet()->getCell('E1')->setValue("MNC");
			$this->excel->getActiveSheet()->getCell('F1')->setValue("CGI");
			$this->excel->getActiveSheet()->getCell('G1')->setValue("Technology");
			$this->excel->getActiveSheet()->getCell('H1')->setValue("Lon");
			$this->excel->getActiveSheet()->getCell('I1')->setValue("Lat");
			$this->excel->getActiveSheet()->getCell('J1')->setValue("SessionId");
			$this->excel->getActiveSheet()->getCell('K1')->setValue("TestId");
			$this->excel->getActiveSheet()->getCell('L1')->setValue("NetworkId");
			$this->excel->getActiveSheet()->getCell('M1')->setValue("SystemName");
			$this->excel->getActiveSheet()->getCell('N1')->setValue("ADevice");
			$this->excel->getActiveSheet()->getCell('O1')->setValue("Time");
			$this->excel->getActiveSheet()->getCell('P1')->setValue("PosId");
			$this->excel->getActiveSheet()->getCell('Q1')->setValue("FileId");
			$this->excel->getActiveSheet()->getCell('R1')->setValue("BTSLon");
			$this->excel->getActiveSheet()->getCell('S1')->setValue("BTSLat");
			$this->excel->getActiveSheet()->getCell('T1')->setValue("BTSLonDiff");
			$this->excel->getActiveSheet()->getCell('U1')->setValue("BTSLatDiff");
			$this->excel->getActiveSheet()->getCell('V1')->setValue("BTSDist");
			$this->excel->getActiveSheet()->getCell('W1')->setValue("BTS2LonDiff");
			$this->excel->getActiveSheet()->getCell('X1')->setValue("BTS2LatDiff");
			$this->excel->getActiveSheet()->getCell('Y1')->setValue("BTS2Dist");
			$this->excel->getActiveSheet()->getCell('Z1')->setValue("BTS3LonDiff");
			$this->excel->getActiveSheet()->getCell('AA1')->setValue("BTS3LatDiff");
			$this->excel->getActiveSheet()->getCell('AB1')->setValue("BTS3Dist");
			$this->excel->getActiveSheet()->getCell('AC1')->setValue("BTSTech");
			$this->excel->getActiveSheet()->getCell('AD1')->setValue("FloorPlanName");
			$this->excel->getActiveSheet()->getCell('AE1')->setValue("FloorPlanLevel");
			$this->excel->getActiveSheet()->getCell('AF1')->setValue("SessionIdLP");
			$this->excel->getActiveSheet()->getCell('AG1')->setValue("TestIdLP");
			$this->excel->getActiveSheet()->getCell('AH1')->setValue("PosIdLP");
			$this->excel->getActiveSheet()->getCell('AI1')->setValue("NetworkIdLP");
			$this->excel->getActiveSheet()->getCell('AJ1')->setValue("AvgRSCP");
			$this->excel->getActiveSheet()->getCell('AK1')->setValue("numCells");
			$this->excel->getActiveSheet()->getCell('AL1')->setValue("ChPSC");
			$this->excel->getActiveSheet()->getCell('AM1')->setValue("inputDate");
			$this->excel->getActiveSheet()->getCell('AN1')->setValue("Kota");
			
			$this->excel->getActiveSheet()->getStyle('A1:AN1')->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle('A1:AN1')->getFont()->setSize(12);
			$this->excel->getActiveSheet()->getStyle('A1:AN1')
										  ->getAlignment()
										  ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		
			$no=2;
			$index=0;
			$mreport=$this->data_model->export_as_aggr_cpich_rscp_0($start,$end,$kota);
			if($mreport->num_rows()>0){
				foreach($mreport->result_array() as $row){
					$this->excel->getActiveSheet()->fromArray(array($row['UniqueId'],
																$row['CID'],
																$row['LAC'],
																$row['MCC'],
																$row['MNC'],
																$row['CGI'],
																$row['Technology'],
																$row['Lon'],
																$row['Lat'],
																$row['SessionId'],
																$row['TestId'],
																$row['NetworkId'],
																$row['SystemName'],
																$row['ADevice'],
																$row['Time'],
																$row['PosId'],
																$row['FileId'],
																$row['BTSLon'],
																$row['BTSLat'],
																$row['BTSLonDiff'],
																$row['BTSLatDiff'],
																$row['BTSDist'],
																$row['BTS2LonDiff'],
																$row['BTS2LatDiff'],
																$row['BTS2Dist'],
																$row['BTS3LonDiff'],
																$row['BTS3LatDiff'],
																$row['BTS3Dist'],
																$row['BTSTech'],
																$row['FloorPlanName'],
																$row['FloorPlanLevel'],
																$row['SessionIdLP'],
																$row['TestIdLP'],
																$row['PosIdLP'],
																$row['NetworkIdLP'],
																$row['AvgRSCP'],
																$row['numCells'],
																$row['ChPSC'],
																$row['inputDate'],
																$row['kota']), null, 'A'.$no);	
					$index++;
					$no++;
				}		
			}
			
			foreach(range('A','AN') as $columnID) {
				$this->excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
			}
			
			$borderArray = array('horizontal' => PHPExcel_Style_Alignment::VERTICAL_TOP,'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN )));
			$this->excel->getActiveSheet()->getStyle("A1:AN".($no))->applyFromArray($borderArray, False);
			
			$filename="export_as_aggr_cpich_rscp_0_".$kota."_".$start."-SD-".$end.".xls";
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'.$filename.'"');
			header('Cache-Control: max-age=0');
			$objWriter = IOFactory::createWriter($this->excel, 'Excel5');
			$objWriter->save('php://output');
		}
	}
}