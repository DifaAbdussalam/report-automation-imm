<?php
Class Chart_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function manualQuery($q)
	{
		return $this->db->query($q);
	}	
	function master($master)
	{
		$q=$this->db->query("select * from $master");
		return $q;
	}
	function total($tabel)
	{
		$q=$this->db->query("select * from $tabel");
		return $q;
	}
	
	function view_data($tabel,$id)
	{
		$q=$this->db->query("select * from ".$tabel." order by ".$id." ASC");
		return $q;
	}
	
	function simpan($tabel,$data)
	{
		$s=$this->db->insert($tabel,$data);
		return $s;
	}
	function edit($tabel,$seleksi)
	{
		$query=$this->db->query("select * from $tabel where $seleksi");
		return $query;
	}
	function update($tabel,$isi,$seleksi)
	{
		$this->db->where($seleksi,$isi[$seleksi]);
		$this->db->update($tabel,$isi);
	}
	function hapus($id,$seleksi,$tabel)
	{
		$this->db->where($seleksi,$id);
		$this->db->delete($tabel);
	}
	
	function provider_list()
	{
		$q=$this->db->query("SELECT distinct provider FROM provider ORDER BY provider");
		return $q;
		
	}
	
	function provider_list_title()
	{
		$titleList='';
		$q=$this->db->query("SELECT distinct provider FROM provider ORDER BY provider");		
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$titleList.="'".$row->provider."',";
			}
			$titleList=substr($titleList,0,-1);
		}
		return $titleList;
		
	}
	
	function chart_ecio($mnc=null,$kota=null,$start=null,$end=null)
	{
		$seriesList="";
		$AND_MNC=" AND b.provider='".$mnc."' ";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT t.quality,COUNT(t.id) AS qty
								FROM(
									SELECT b.provider,a.id,
									CASE
										WHEN a.AvgEcIo < -16 THEN 'Kurang'
										WHEN a.AvgEcIo < -13 AND a.AvgEcIo <= -16 THEN 'Cukup'
										WHEN a.AvgEcIo < -10 AND a.AvgEcIo <= -13 THEN 'Baik'
										ELSE 'Baik Sekali'
									END AS quality
									FROM as_aggr_cpich_ec_io_0 a
									LEFT JOIN provider b ON b.id_mnc=a.MNC
									WHERE 1=1
									".$AND_MNC."
									".$AND_KOTA."
									".$AND_PERIODE."
								) t GROUP BY t.quality
							");
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$seriesList.="{ name : '".$row->quality."', y : ".$row->qty."},";
			}
			$seriesList=substr($seriesList,0,-1);
		}
		return $seriesList;
		
	}
	
	function chart_rscp($mnc=null,$kota=null,$start=null,$end=null)
	{
		$seriesList="";
		$AND_MNC=" AND b.provider='".$mnc."' ";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT t.quality,COUNT(t.id) AS qty
								FROM(
									SELECT b.provider,a.id,
									CASE
										WHEN a.AvgRSCP < -105 THEN 'Kurang'
										WHEN a.AvgRSCP < -95 AND a.AvgRSCP >= -105 THEN 'Cukup'
										WHEN a.AvgRSCP < -85 AND a.AvgRSCP >= -95 THEN 'Baik'
										ELSE 'Baik Sekali'
									END AS quality
									FROM as_aggr_cpich_rscp_0 a
									LEFT JOIN provider b ON b.id_mnc=a.MNC
									WHERE 1=1
									".$AND_MNC."
									".$AND_KOTA."
									".$AND_PERIODE."
								) t GROUP BY t.quality
							");
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$seriesList.="{ name : '".$row->quality."', y : ".$row->qty."},";
			}
			$seriesList=substr($seriesList,0,-1);
		}
		return $seriesList;
		
	}
	
	function chart_rxlev($mnc=null,$kota=null,$start=null,$end=null)
	{
		$seriesList="";
		$AND_MNC=" AND b.provider='".$mnc."' ";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT t.quality,COUNT(t.id) AS qty
								FROM(
									SELECT b.provider,a.id,
									CASE
										WHEN a.RxLev < -102 THEN 'Kurang'
										WHEN a.RxLev < -92 AND a.RxLev >= -102 THEN 'Cukup'
										WHEN a.RxLev < -82 AND a.RxLev >= -92 THEN 'Baik'
										ELSE 'Baik Sekali'
									END AS quality
									FROM rxlev_dbm_0 a
									LEFT JOIN provider b ON b.id_mnc=a.MNC
									WHERE 1=1
									".$AND_MNC."
									".$AND_KOTA."
									".$AND_PERIODE."
								) t GROUP BY t.quality
							");
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$seriesList.="{ name : '".$row->quality."', y : ".$row->qty."},";
			}
			$seriesList=substr($seriesList,0,-1);
		}
		return $seriesList;
		
	}
	
	function chart_rxqual($mnc=null,$kota=null,$start=null,$end=null)
	{
		$seriesList="";
		$AND_MNC=" AND b.provider='".$mnc."' ";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT t.quality,COUNT(t.id) AS qty
								FROM(
									SELECT b.provider,a.id,
									CASE
										WHEN a.RxQual > 6 AND a.RxQual <= 7 THEN 'Kurang'
										WHEN a.RxQual > 4 AND a.RxQual <= 6 THEN 'Cukup'
										WHEN a.RxQual > 2 AND a.RxQual <= 4 THEN 'Baik'
										ELSE 'Baik Sekali'
									END AS quality
									FROM rxqual_0 a
									LEFT JOIN provider b ON b.id_mnc=a.MNC
									WHERE 1=1
									".$AND_MNC."
									".$AND_KOTA."
									".$AND_PERIODE."
								) t GROUP BY t.quality
							");
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$seriesList.="{ name : '".$row->quality."', y : ".$row->qty."},";
			}
			$seriesList=substr($seriesList,0,-1);
		}
		return $seriesList;
		
	}
	
	function chart_rsrp($mnc=null,$kota=null,$start=null,$end=null)
	{
		$seriesList="";
		$AND_MNC=" AND b.provider='".$mnc."' ";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT t.quality,COUNT(t.id) AS qty
								FROM(
									SELECT b.provider,a.id,
									CASE
										WHEN a.RSRP < -110 THEN 'Kurang'
										WHEN a.RSRP < -102 AND a.RSRP >= -110 THEN 'Cukup'
										WHEN a.RSRP < -92 AND a.RSRP >= -102 THEN 'Baik'
										ELSE 'Baik Sekali'
									END AS quality
									FROM serving_rs_rp_dbm_0 a
									LEFT JOIN provider b ON b.id_mnc=a.MNC
									WHERE 1=1
									".$AND_MNC."
									".$AND_KOTA."
									".$AND_PERIODE."
								) t GROUP BY t.quality
							");
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$seriesList.="{ name : '".$row->quality."', y : ".$row->qty."},";
			}
			$seriesList=substr($seriesList,0,-1);
		}
		return $seriesList;
		
	}
	
	function chart_rsrq($mnc=null,$kota=null,$start=null,$end=null)
	{
		$seriesList="";
		$AND_MNC=" AND b.provider='".$mnc."' ";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT t.quality,COUNT(t.id) AS qty
								FROM(
									SELECT b.provider,a.id,
									CASE
										WHEN a.RSRQ < -16 THEN 'Kurang'
										WHEN a.RSRQ < -12 AND a.RSRQ >= -16 THEN 'Cukup'
										WHEN a.RSRQ < -10 AND a.RSRQ >= -12 THEN 'Baik'
										ELSE 'Baik Sekali'
									END AS quality
									FROM serving_rs_rq_db_0 a
									LEFT JOIN provider b ON b.id_mnc=a.MNC
									WHERE 1=1
									".$AND_MNC."
									".$AND_KOTA."
									".$AND_PERIODE."
								) t GROUP BY t.quality
							");
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$seriesList.="{ name : '".$row->quality."', y : ".$row->qty."},";
			}
			$seriesList=substr($seriesList,0,-1);
		}
		return $seriesList;
		
	}
	
	function chart_radio($mnc=null,$kota=null,$start=null,$end=null)
	{
		$seriesList="";
		$AND_MNC=" AND b.provider='".$mnc."' ";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT t.quality,COUNT(t.id) AS qty
								FROM(
									SELECT b.provider,a.id,
									CASE
										WHEN a.Technology LIKE '%LTE%' THEN '4G'
										WHEN a.Technology LIKE '%UMTS%' THEN '3G'
										ELSE 'GSM'
									END AS quality
									FROM radio_technology_0 a
									LEFT JOIN provider b ON b.id_mnc=a.MNC
									WHERE 1=1
									".$AND_MNC."
									".$AND_KOTA."
									".$AND_PERIODE."
								) t GROUP BY t.quality
							");
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$seriesList.="{ name : '".$row->quality."', y : ".$row->qty."},";
			}
			$seriesList=substr($seriesList,0,-1);
		}
		return $seriesList;
		
	}
	
	/*chart ftp download */
	function chart_ftp_dl_min($kota=null,$start=null,$end=null)
	{
		$seriesList="";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT b.provider,MIN(a.Throughput) AS val
								FROM provider b 
								LEFT JOIN ftp_throughput_dl_k_0 a ON a.MNC=b.id_mnc
								WHERE 1=1
								".$AND_KOTA."
								".$AND_PERIODE."
								GROUP BY b.provider");
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$seriesList.=(int)$row->val.",";
			}
			$seriesList=substr($seriesList,0,-1);
		}
		return $seriesList;
		
	}
	
	function chart_ftp_dl_max($kota=null,$start=null,$end=null)
	{
		$seriesList="";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT b.provider,MAX(a.Throughput) AS val
								FROM provider b 
								LEFT JOIN ftp_throughput_dl_k_0 a ON a.MNC=b.id_mnc
								WHERE 1=1
								".$AND_KOTA."
								".$AND_PERIODE."
								GROUP BY b.provider");
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$seriesList.=(int)$row->val.",";
			}
			$seriesList=substr($seriesList,0,-1);
		}
		return $seriesList;
		
	}
	
	function chart_ftp_dl_avg($kota=null,$start=null,$end=null)
	{
		$seriesList="";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT b.provider,AVG(a.Throughput) AS val
								FROM provider b 
								LEFT JOIN ftp_throughput_dl_k_0 a ON a.MNC=b.id_mnc
								WHERE 1=1
								".$AND_KOTA."
								".$AND_PERIODE."
								GROUP BY b.provider");
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$seriesList.=(int)$row->val.",";
			}
			$seriesList=substr($seriesList,0,-1);
		}
		return $seriesList;
		
	}
	
	function chart_ftp_dl_success($kota=null,$start=null,$end=null)
	{
		$seriesList="";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT x.provider,SUM(x.val) as val,SUM(x.total) as total
								FROM(
									SELECT b.provider,COUNT(a.Errorcode) AS val, 0 as total
									FROM provider b 
									LEFT JOIN ftp_throughput_dl_k_0 a ON a.MNC=b.id_mnc
									WHERE 1=1
									AND a.errorCode='OK' 
									".$AND_KOTA."
									".$AND_PERIODE."
									GROUP BY b.provider
									UNION
									SELECT b.provider,0 as val,COUNT(a.Errorcode) AS total
									FROM provider b 
									LEFT JOIN ftp_throughput_dl_k_0 a ON a.MNC=b.id_mnc
									WHERE 1=1
									".$AND_KOTA."
									".$AND_PERIODE."
									GROUP BY b.provider
								) x GROUP BY x.provider");
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$persen=($row->val>0) ? $row->val/$row->total * 100 : 0;
				$seriesList.=number_format($persen,2).",";
			}
			$seriesList=substr($seriesList,0,-1);
		}
		return $seriesList;
		
	}
	
	/*chart ftp upload */
	function chart_ftp_ul_min($kota=null,$start=null,$end=null)
	{
		$seriesList="";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT b.provider,MIN(a.Throughput) AS val
								FROM provider b 
								LEFT JOIN ftp_throughput_ul_k_0 a ON a.MNC=b.id_mnc
								WHERE 1=1
								".$AND_KOTA."
								".$AND_PERIODE."
								GROUP BY b.provider");
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$seriesList.=(int)$row->val.",";
			}
			$seriesList=substr($seriesList,0,-1);
		}
		return $seriesList;
		
	}
	
	function chart_ftp_ul_max($kota=null,$start=null,$end=null)
	{
		$seriesList="";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT b.provider,MAX(a.Throughput) AS val
								FROM provider b 
								LEFT JOIN ftp_throughput_ul_k_0 a ON a.MNC=b.id_mnc
								WHERE 1=1
								".$AND_KOTA."
								".$AND_PERIODE."
								GROUP BY b.provider");
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$seriesList.=(int)$row->val.",";
			}
			$seriesList=substr($seriesList,0,-1);
		}
		return $seriesList;
		
	}
	
	function chart_ftp_ul_avg($kota=null,$start=null,$end=null)
	{
		$seriesList="";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT b.provider,AVG(a.Throughput) AS val
								FROM provider b 
								LEFT JOIN ftp_throughput_ul_k_0 a ON a.MNC=b.id_mnc
								WHERE 1=1
								".$AND_KOTA."
								".$AND_PERIODE."
								GROUP BY b.provider");
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$seriesList.=(int)$row->val.",";
			}
			$seriesList=substr($seriesList,0,-1);
		}
		return $seriesList;
		
	}
	
	function chart_ftp_ul_success($kota=null,$start=null,$end=null)
	{
		$seriesList="";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT x.provider,SUM(x.val) as val,SUM(x.total) as total
								FROM(
									SELECT b.provider,COUNT(a.Errorcode) AS val, 0 as total
									FROM provider b 
									LEFT JOIN ftp_throughput_ul_k_0 a ON a.MNC=b.id_mnc
									WHERE 1=1
									AND a.errorCode='OK' 
									".$AND_KOTA."
									".$AND_PERIODE."
									GROUP BY b.provider
									UNION
									SELECT b.provider,0 as val,COUNT(a.Errorcode) AS total
									FROM provider b 
									LEFT JOIN ftp_throughput_ul_k_0 a ON a.MNC=b.id_mnc
									WHERE 1=1
									".$AND_KOTA."
									".$AND_PERIODE."
									GROUP BY b.provider
								) x GROUP BY x.provider");
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$persen=($row->val>0) ? $row->val/$row->total * 100 : 0;
				$seriesList.=number_format($persen,2).",";
			}
			$seriesList=substr($seriesList,0,-1);
		}
		return $seriesList;
		
	}
	
	/*chart ftp http */
	function chart_http_min($kota=null,$start=null,$end=null)
	{
		$seriesList="";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT b.provider,MIN(a.Throughput) AS val
								FROM provider b 
								LEFT JOIN http_browser_through_0 a ON a.MNC=b.id_mnc
								WHERE 1=1
								".$AND_KOTA."
								".$AND_PERIODE."
								GROUP BY b.provider");
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$seriesList.=(int)$row->val.",";
			}
			$seriesList=substr($seriesList,0,-1);
		}
		return $seriesList;
		
	}
	
	function chart_http_max($kota=null,$start=null,$end=null)
	{
		$seriesList="";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT b.provider,MAX(a.Throughput) AS val
								FROM provider b 
								LEFT JOIN http_browser_through_0 a ON a.MNC=b.id_mnc
								WHERE 1=1
								".$AND_KOTA."
								".$AND_PERIODE."
								GROUP BY b.provider");
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$seriesList.=(int)$row->val.",";
			}
			$seriesList=substr($seriesList,0,-1);
		}
		return $seriesList;
		
	}
	
	function chart_http_avg($kota=null,$start=null,$end=null)
	{
		$seriesList="";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT b.provider,AVG(a.Throughput) AS val
								FROM provider b 
								LEFT JOIN http_browser_through_0 a ON a.MNC=b.id_mnc
								WHERE 1=1
								".$AND_KOTA."
								".$AND_PERIODE."
								GROUP BY b.provider");
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$seriesList.=(int)$row->val.",";
			}
			$seriesList=substr($seriesList,0,-1);
		}
		return $seriesList;
		
	}
	
	function chart_http_success($kota=null,$start=null,$end=null)
	{
		$seriesList="";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT x.provider,SUM(x.val) as val,SUM(x.total) as total
								FROM(
									SELECT b.provider,COUNT(a.Throughput) AS val, 0 as total
									FROM provider b 
									LEFT JOIN http_browser_through_0 a ON a.MNC=b.id_mnc
									WHERE 1=1
									AND a.Throughput > 0 
									".$AND_KOTA."
									".$AND_PERIODE."
									GROUP BY b.provider
									UNION
									SELECT b.provider,0 as val,COUNT(a.Throughput) AS total
									FROM provider b 
									LEFT JOIN http_browser_through_0 a ON a.MNC=b.id_mnc
									WHERE 1=1
									".$AND_KOTA."
									".$AND_PERIODE."
									GROUP BY b.provider
								) x GROUP BY x.provider");
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$persen=($row->val>0) ? $row->val/$row->total * 100 : 0;
				$seriesList.=number_format($persen,2).",";
			}
			$seriesList=substr($seriesList,0,-1);
		}
		return $seriesList;
		
	}
	
	/*chart capacity dl */
	function chart_capacity_dl_min($kota=null,$start=null,$end=null)
	{
		$seriesList="";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT b.provider,MIN(a.DLThrpt) AS val
								FROM provider b 
								LEFT JOIN capacity_test_throug_0 a ON a.MNC=b.id_mnc
								WHERE 1=1
								".$AND_KOTA."
								".$AND_PERIODE."
								GROUP BY b.provider");
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$seriesList.=(int)$row->val.",";
			}
			$seriesList=substr($seriesList,0,-1);
		}
		return $seriesList;
		
	}
	
	function chart_capacity_dl_max($kota=null,$start=null,$end=null)
	{
		$seriesList="";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT b.provider,MAX(a.DLThrpt) AS val
								FROM provider b 
								LEFT JOIN capacity_test_throug_0 a ON a.MNC=b.id_mnc
								WHERE 1=1
								".$AND_KOTA."
								".$AND_PERIODE."
								GROUP BY b.provider");
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$seriesList.=(int)$row->val.",";
			}
			$seriesList=substr($seriesList,0,-1);
		}
		return $seriesList;
		
	}
	
	function chart_capacity_dl_avg($kota=null,$start=null,$end=null)
	{
		$seriesList="";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT b.provider,AVG(a.DLThrpt) AS val
								FROM provider b 
								LEFT JOIN capacity_test_throug_0 a ON a.MNC=b.id_mnc
								WHERE 1=1
								".$AND_KOTA."
								".$AND_PERIODE."
								GROUP BY b.provider");
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$seriesList.=(int)$row->val.",";
			}
			$seriesList=substr($seriesList,0,-1);
		}
		return $seriesList;
		
	}
	
	function chart_capacity_dl_success($kota=null,$start=null,$end=null)
	{
		$seriesList="";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT x.provider,SUM(x.val) as val,SUM(x.total) as total
								FROM(
									SELECT b.provider,COUNT(a.Errorcode) AS val, 0 as total
									FROM provider b 
									LEFT JOIN capacity_test_throug_0 a ON a.MNC=b.id_mnc
									WHERE 1=1
									AND a.errorCode='OK' 
									".$AND_KOTA."
									".$AND_PERIODE."
									GROUP BY b.provider
									UNION
									SELECT b.provider,0 as val,COUNT(a.Errorcode) AS total
									FROM provider b 
									LEFT JOIN capacity_test_throug_0 a ON a.MNC=b.id_mnc
									WHERE 1=1
									".$AND_KOTA."
									".$AND_PERIODE."
									GROUP BY b.provider
								) x GROUP BY x.provider");
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$persen=($row->val>0) ? $row->val/$row->total * 100 : 0;
				$seriesList.=number_format($persen,2).",";
			}
			$seriesList=substr($seriesList,0,-1);
		}
		return $seriesList;
		
	}
	
	
	/*chart capacity ul */
	function chart_capacity_ul_min($kota=null,$start=null,$end=null)
	{
		$seriesList="";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT b.provider,MIN(a.ULThrpt) AS val
								FROM provider b 
								LEFT JOIN capacity_test_throug_1 a ON a.MNC=b.id_mnc
								WHERE 1=1
								".$AND_KOTA."
								".$AND_PERIODE."
								GROUP BY b.provider");
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$seriesList.=(int)$row->val.",";
			}
			$seriesList=substr($seriesList,0,-1);
		}
		return $seriesList;
		
	}
	
	function chart_capacity_ul_max($kota=null,$start=null,$end=null)
	{
		$seriesList="";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT b.provider,MAX(a.ULThrpt) AS val
								FROM provider b 
								LEFT JOIN capacity_test_throug_1 a ON a.MNC=b.id_mnc
								WHERE 1=1
								".$AND_KOTA."
								".$AND_PERIODE."
								GROUP BY b.provider");
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$seriesList.=(int)$row->val.",";
			}
			$seriesList=substr($seriesList,0,-1);
		}
		return $seriesList;
		
	}
	
	function chart_capacity_ul_avg($kota=null,$start=null,$end=null)
	{
		$seriesList="";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT b.provider,AVG(a.ULThrpt) AS val
								FROM provider b 
								LEFT JOIN capacity_test_throug_1 a ON a.MNC=b.id_mnc
								WHERE 1=1
								".$AND_KOTA."
								".$AND_PERIODE."
								GROUP BY b.provider");
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$seriesList.=(int)$row->val.",";
			}
			$seriesList=substr($seriesList,0,-1);
		}
		return $seriesList;
		
	}
	
	function chart_capacity_ul_success($kota=null,$start=null,$end=null)
	{
		$seriesList="";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT x.provider,SUM(x.val) as val,SUM(x.total) as total
								FROM(
									SELECT b.provider,COUNT(a.Errorcode) AS val, 0 as total
									FROM provider b 
									LEFT JOIN capacity_test_throug_1 a ON a.MNC=b.id_mnc
									WHERE 1=1
									AND a.errorCode='OK' 
									".$AND_KOTA."
									".$AND_PERIODE."
									GROUP BY b.provider
									UNION
									SELECT b.provider,0 as val,COUNT(a.Errorcode) AS total
									FROM provider b 
									LEFT JOIN capacity_test_throug_1 a ON a.MNC=b.id_mnc
									WHERE 1=1
									".$AND_KOTA."
									".$AND_PERIODE."
									GROUP BY b.provider
								) x GROUP BY x.provider");
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$persen=($row->val>0) ? $row->val/$row->total * 100 : 0;
				$seriesList.=number_format($persen,2).",";
			}
			$seriesList=substr($seriesList,0,-1);
		}
		return $seriesList;
		
	}
	
	/*chart ping test */
	function chart_ping_delay_avg($kota=null,$start=null,$end=null)
	{
		$seriesList="";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT b.provider,AVG(a.RTT) AS val
								FROM provider b 
								LEFT JOIN ping_rtt_ms_0 a ON a.MNC=b.id_mnc
								WHERE 1=1
								".$AND_KOTA."
								".$AND_PERIODE."
								GROUP BY b.provider");
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$seriesList.=(int)$row->val.",";
			}
			$seriesList=substr($seriesList,0,-1);
		}
		return $seriesList;
		
	}
	
	function chart_ping_loss($kota=null,$start=null,$end=null)
	{
		$seriesList="";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT x.provider,SUM(x.val) as val,SUM(x.total) as total
								FROM(
									SELECT b.provider,COUNT(a.Errorcode) AS val, 0 as total
									FROM provider b 
									LEFT JOIN ping_rtt_ms_0 a ON a.MNC=b.id_mnc
									WHERE 1=1
									AND a.errorCode!='OK' 
									".$AND_KOTA."
									".$AND_PERIODE."
									GROUP BY b.provider
									UNION
									SELECT b.provider,0 as val,COUNT(a.Errorcode) AS total
									FROM provider b 
									LEFT JOIN ping_rtt_ms_0 a ON a.MNC=b.id_mnc
									WHERE 1=1
									".$AND_KOTA."
									".$AND_PERIODE."
									GROUP BY b.provider
								) x GROUP BY x.provider");
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$persen=($row->val>0) ? $row->val/$row->total * 100 : 0;
				$seriesList.=number_format($persen,2).",";
			}
			$seriesList=substr($seriesList,0,-1);
		}
		return $seriesList;
	}
	
	
	/*summary*/
	
	function summary_row1($mnc=null,$signal=null,$kota=null,$start=null,$end=null)
	{
		$qty=0;
		$AND_MNC=" AND b.provider='".$mnc."' ";
		$AND_SIGNAL=" AND a.Technology LIKE '%".$signal."%' ";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT COUNT(a.RXLEV) AS qty
								FROM rxlev_dbm_0 a
								LEFT JOIN provider b ON b.id_mnc=a.MNC
								WHERE 1=1
								AND a.RXLEV < -102
								".$AND_MNC."
								".$AND_SIGNAL."
								".$AND_KOTA."
								".$AND_PERIODE."
							");
		if($q->num_rows()>0){
			$qty=$q->row()->qty;
		}
		return $qty;
	}
	
	function summary_row2($mnc=null,$signal=null,$kota=null,$start=null,$end=null)
	{
		$qty=0;
		$AND_MNC=" AND b.provider='".$mnc."' ";
		$AND_SIGNAL=" AND a.Technology LIKE '%".$signal."%' ";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT COUNT(a.RXLEV) AS qty
								FROM rxlev_dbm_0 a
								LEFT JOIN provider b ON b.id_mnc=a.MNC
								WHERE 1=1
								".$AND_MNC."
								".$AND_SIGNAL."
								".$AND_KOTA."
								".$AND_PERIODE."
							");
		if($q->num_rows()>0){
			$qty=$q->row()->qty;
		}
		return $qty;
	}
	
	function summary_row3($mnc=null,$signal=null,$kota=null,$start=null,$end=null)
	{
		$qty=$this->summary_row1($mnc,$signal,$kota,$start,$end);
		$total=$this->summary_row2($mnc,$signal,$kota,$start,$end);
		$persentase=($qty>0) ? ($qty/$total) * 100 : 0;
		return $persentase;
	}
	
	function summary_row4($mnc=null,$signal=null,$kota=null,$start=null,$end=null)
	{
		$qty=0;
		$AND_MNC=" AND b.provider='".$mnc."' ";
		$AND_SIGNAL=" AND a.Technology LIKE '%".$signal."%' ";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT COUNT(a.RxQual) AS qty
								FROM rxqual_0 a
								LEFT JOIN provider b ON b.id_mnc=a.MNC
								WHERE 1=1
								AND a.RxQual > 6 AND a.RxQual <=  7
								".$AND_MNC."
								".$AND_SIGNAL."
								".$AND_KOTA."
								".$AND_PERIODE."
							");
		if($q->num_rows()>0){
			$qty=$q->row()->qty;
		}
		return $qty;
	}
	
	function summary_row5($mnc=null,$signal=null,$kota=null,$start=null,$end=null)
	{
		$qty=0;
		$AND_MNC=" AND b.provider='".$mnc."' ";
		$AND_SIGNAL=" AND a.Technology LIKE '%".$signal."%' ";
		$AND_KOTA=($kota=="ALL") ? "" : " AND a.id_kota='".$kota."' ";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT COUNT(a.RxQual) AS qty
								FROM rxqual_0 a
								LEFT JOIN provider b ON b.id_mnc=a.MNC
								WHERE 1=1
								".$AND_MNC."
								".$AND_SIGNAL."
								".$AND_KOTA."
								".$AND_PERIODE."
							");
		if($q->num_rows()>0){
			$qty=$q->row()->qty;
		}
		return $qty;
	}
	
	function summary_row6($mnc=null,$signal=null,$kota=null,$start=null,$end=null)
	{
		$qty=$this->summary_row5($mnc,$signal,$kota,$start,$end);
		$total=$this->summary_row6($mnc,$signal,$kota,$start,$end);
		$persentase=($qty>0) ? ($qty/$total) * 100 : 0;
		return $persentase;
	}
}