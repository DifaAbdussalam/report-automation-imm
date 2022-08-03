<?php
Class Data_model extends CI_Model
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
	
	/*show data*/
	function data_as_aggr_cpich_ec_io_0()
	{
		$filter=($this->session->userdata('filter_kota')) ? $this->session->userdata('filter_kota') : '';
		$AND_KOTA=($filter!="") ? " AND a.id_kota='".$filter."' " : "";
		$q=$this->db->query("SELECT a.*,b.kota FROM as_aggr_cpich_ec_io_0 a
							LEFT JOIN kota b ON b.id_kota=a.id_kota
							WHERE 1=1
							".$AND_KOTA."
							ORDER BY a.inputDate,a.id_kota
						");
		return $q;
	}
	
	function data_as_aggr_cpich_rscp_0()
	{
		$filter=($this->session->userdata('filter_kota')) ? $this->session->userdata('filter_kota') : '';
		$AND_KOTA=($filter!="") ? " AND a.id_kota='".$filter."' " : "";
		$q=$this->db->query("SELECT a.*,b.kota FROM as_aggr_cpich_rscp_0 a
							LEFT JOIN kota b ON b.id_kota=a.id_kota
							WHERE 1=1
							".$AND_KOTA."
							ORDER BY a.inputDate,a.id_kota
						");
		return $q;
	}
	
	function data_capacity_test_throug_0()
	{
		$filter=($this->session->userdata('filter_kota')) ? $this->session->userdata('filter_kota') : '';
		$AND_KOTA=($filter!="") ? " AND a.id_kota='".$filter."' " : "";
		$q=$this->db->query("SELECT a.*,b.kota FROM capacity_test_throug_0 a
							LEFT JOIN kota b ON b.id_kota=a.id_kota
							WHERE 1=1
							".$AND_KOTA."
							ORDER BY a.inputDate,a.id_kota
						");
		return $q;
	}
	
	function data_capacity_test_throug_1()
	{
		$filter=($this->session->userdata('filter_kota')) ? $this->session->userdata('filter_kota') : '';
		$AND_KOTA=($filter!="") ? " AND a.id_kota='".$filter."' " : "";
		$q=$this->db->query("SELECT a.*,b.kota FROM capacity_test_throug_1 a
							LEFT JOIN kota b ON b.id_kota=a.id_kota
							WHERE 1=1
							".$AND_KOTA."
							ORDER BY a.inputDate,a.id_kota
						");
		return $q;
	}
	
	function data_ftp_throughput_dl_k_0()
	{
		$filter=($this->session->userdata('filter_kota')) ? $this->session->userdata('filter_kota') : '';
		$AND_KOTA=($filter!="") ? " AND a.id_kota='".$filter."' " : "";
		$q=$this->db->query("SELECT a.*,b.kota FROM ftp_throughput_dl_k_0 a
							LEFT JOIN kota b ON b.id_kota=a.id_kota
							WHERE 1=1
							".$AND_KOTA."
							ORDER BY a.inputDate,a.id_kota
						");
		return $q;
	}
	
	function data_ftp_throughput_ul_k_0()
	{
		$filter=($this->session->userdata('filter_kota')) ? $this->session->userdata('filter_kota') : '';
		$AND_KOTA=($filter!="") ? " AND a.id_kota='".$filter."' " : "";
		$q=$this->db->query("SELECT a.*,b.kota FROM ftp_throughput_ul_k_0 a
							LEFT JOIN kota b ON b.id_kota=a.id_kota
							WHERE 1=1
							".$AND_KOTA."
							ORDER BY a.inputDate,a.id_kota
						");
		return $q;
	}
	
	function data_http_browser_through_0()
	{
		$filter=($this->session->userdata('filter_kota')) ? $this->session->userdata('filter_kota') : '';
		$AND_KOTA=($filter!="") ? " AND a.id_kota='".$filter."' " : "";
		$q=$this->db->query("SELECT a.*,b.kota FROM http_browser_through_0 a
							LEFT JOIN kota b ON b.id_kota=a.id_kota
							WHERE 1=1
							".$AND_KOTA."
							ORDER BY a.inputDate,a.id_kota
						");
		return $q;
	}
	
	function data_ping_rtt_ms_0()
	{
		$filter=($this->session->userdata('filter_kota')) ? $this->session->userdata('filter_kota') : '';
		$AND_KOTA=($filter!="") ? " AND a.id_kota='".$filter."' " : "";
		$q=$this->db->query("SELECT a.*,b.kota FROM ping_rtt_ms_0 a
							LEFT JOIN kota b ON b.id_kota=a.id_kota
							WHERE 1=1
							".$AND_KOTA."
							ORDER BY a.inputDate,a.id_kota
						");
		return $q;
	}
	
	function data_radio_technology_0()
	{
		$filter=($this->session->userdata('filter_kota')) ? $this->session->userdata('filter_kota') : '';
		$AND_KOTA=($filter!="") ? " AND a.id_kota='".$filter."' " : "";
		$q=$this->db->query("SELECT a.*,b.kota FROM radio_technology_0 a
							LEFT JOIN kota b ON b.id_kota=a.id_kota
							WHERE 1=1
							".$AND_KOTA."
							ORDER BY a.inputDate,a.id_kota
						");
		return $q;
	}
	
	function data_rxlev_dbm_0()
	{
		$filter=($this->session->userdata('filter_kota')) ? $this->session->userdata('filter_kota') : '';
		$AND_KOTA=($filter!="") ? " AND a.id_kota='".$filter."' " : "";
		$q=$this->db->query("SELECT a.*,b.kota FROM rxlev_dbm_0 a
							LEFT JOIN kota b ON b.id_kota=a.id_kota
							WHERE 1=1
							".$AND_KOTA."
							ORDER BY a.inputDate,a.id_kota
						");
		return $q;
	}
	
	function data_rxqual_0()
	{
		$filter=($this->session->userdata('filter_kota')) ? $this->session->userdata('filter_kota') : '';
		$AND_KOTA=($filter!="") ? " AND a.id_kota='".$filter."' " : "";
		$q=$this->db->query("SELECT a.*,b.kota FROM rxqual_0 a
							LEFT JOIN kota b ON b.id_kota=a.id_kota
							WHERE 1=1
							".$AND_KOTA."
							ORDER BY a.inputDate,a.id_kota
						");
		return $q;
	}
	
	function data_serving_rs_rp_dbm_0()
	{
		$filter=($this->session->userdata('filter_kota')) ? $this->session->userdata('filter_kota') : '';
		$AND_KOTA=($filter!="") ? " AND a.id_kota='".$filter."' " : "";
		$q=$this->db->query("SELECT a.*,b.kota FROM serving_rs_rp_dbm_0 a
							LEFT JOIN kota b ON b.id_kota=a.id_kota
							WHERE 1=1
							".$AND_KOTA."
							ORDER BY a.inputDate,a.id_kota
						");
		return $q;
	}
	
	function data_serving_rs_rq_db_0()
	{
		$filter=($this->session->userdata('filter_kota')) ? $this->session->userdata('filter_kota') : '';
		$AND_KOTA=($filter!="") ? " AND a.id_kota='".$filter."' " : "";
		$q=$this->db->query("SELECT a.*,b.kota FROM serving_rs_rq_db_0 a
							LEFT JOIN kota b ON b.id_kota=a.id_kota
							WHERE 1=1
							".$AND_KOTA."
							ORDER BY a.inputDate,a.id_kota
						");
		return $q;
	}
	
	
	/*export data*/
	function export_as_aggr_cpich_ec_io_0($start=null,$end=null,$kota=false)
	{
		$AND_KOTA=($kota!="ALL") ? " AND a.id_kota='".$kota."' " : "";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT a.*,b.kota FROM as_aggr_cpich_ec_io_0 a
							LEFT JOIN kota b ON b.id_kota=a.id_kota
							WHERE 1=1
							AND a.AvgEcIo < -16
							".$AND_KOTA."
							".$AND_PERIODE."
							ORDER BY a.inputDate,a.id_kota
						");
		return $q;
	}
	
	function export_as_aggr_cpich_rscp_0($start=null,$end=null,$kota=false)
	{
		$AND_KOTA=($kota!="ALL") ? " AND a.id_kota='".$kota."' " : "";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT a.*,b.kota FROM as_aggr_cpich_rscp_0 a
							LEFT JOIN kota b ON b.id_kota=a.id_kota
							WHERE 1=1
							AND a.AvgRSCP < -105
							".$AND_KOTA."
							".$AND_PERIODE."
							ORDER BY a.inputDate,a.id_kota
						");
		return $q;
	}
	
	function export_capacity_test_throug_0($start=null,$end=null,$kota=false)
	{
		$AND_KOTA=($kota!="ALL") ? " AND a.id_kota='".$kota."' " : "";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT a.*,b.kota FROM capacity_test_throug_0 a
							LEFT JOIN kota b ON b.id_kota=a.id_kota
							WHERE 1=1
							AND a.DLThrpt < 1000
							".$AND_KOTA."
							".$AND_PERIODE."
							ORDER BY a.inputDate,a.id_kota
						");
		return $q;
	}
	
	function export_capacity_test_throug_1($start=null,$end=null,$kota=false)
	{
		$AND_KOTA=($kota!="ALL") ? " AND a.id_kota='".$kota."' " : "";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT a.*,b.kota FROM capacity_test_throug_1 a
							LEFT JOIN kota b ON b.id_kota=a.id_kota
							WHERE 1=1
							AND a.ULThrpt < 1000
							".$AND_KOTA."
							".$AND_PERIODE."
							ORDER BY a.inputDate,a.id_kota
						");
		return $q;
	}
	
	function export_ftp_throughput_dl_k_0($start=null,$end=null,$kota=false)
	{
		$AND_KOTA=($kota!="ALL") ? " AND a.id_kota='".$kota."' " : "";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT a.*,b.kota FROM ftp_throughput_dl_k_0 a
							LEFT JOIN kota b ON b.id_kota=a.id_kota
							WHERE 1=1
							AND a.Throughput < 1000
							".$AND_KOTA."
							".$AND_PERIODE."
							ORDER BY a.inputDate,a.id_kota
						");
		return $q;
	}
	
	function export_ftp_throughput_ul_k_0($start=null,$end=null,$kota=false)
	{
		$AND_KOTA=($kota!="ALL") ? " AND a.id_kota='".$kota."' " : "";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT a.*,b.kota FROM ftp_throughput_ul_k_0 a
							LEFT JOIN kota b ON b.id_kota=a.id_kota
							WHERE 1=1
							AND a.Throughput < 1000
							".$AND_KOTA."
							".$AND_PERIODE."
							ORDER BY a.inputDate,a.id_kota
						");
		return $q;
	}
	
	function export_http_browser_through_0($start=null,$end=null,$kota=false)
	{
		$AND_KOTA=($kota!="ALL") ? " AND a.id_kota='".$kota."' " : "";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT a.*,b.kota FROM http_browser_through_0 a
							LEFT JOIN kota b ON b.id_kota=a.id_kota
							WHERE 1=1
							AND a.Throughput < 1000
							".$AND_KOTA."
							".$AND_PERIODE."
							ORDER BY a.inputDate,a.id_kota
						");
		return $q;
	}
	
	function export_ping_rtt_ms_0($start=null,$end=null,$kota=false)
	{
		$AND_KOTA=($kota!="ALL") ? " AND a.id_kota='".$kota."' " : "";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT a.*,b.kota FROM ping_rtt_ms_0 a
							LEFT JOIN kota b ON b.id_kota=a.id_kota
							WHERE 1=1
							AND a.RTT > 250
							".$AND_KOTA."
							".$AND_PERIODE."
							ORDER BY a.inputDate,a.id_kota
						");
		return $q;
	}
	
	function export_radio_technology_0($start=null,$end=null,$kota=false)
	{
		$AND_KOTA=($kota!="ALL") ? " AND a.id_kota='".$kota."' " : "";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT a.*,b.kota FROM radio_technology_0 a
							LEFT JOIN kota b ON b.id_kota=a.id_kota
							WHERE 1=1
							".$AND_KOTA."
							".$AND_PERIODE."
							ORDER BY a.inputDate,a.id_kota
						");
		return $q;
	}
	
	function export_rxlev_dbm_0($start=null,$end=null,$kota=false)
	{
		$AND_KOTA=($kota!="ALL") ? " AND a.id_kota='".$kota."' " : "";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT a.*,b.kota FROM rxlev_dbm_0 a
							LEFT JOIN kota b ON b.id_kota=a.id_kota
							WHERE 1=1
							AND a.RXLEV < -102
							".$AND_KOTA."
							".$AND_PERIODE."
							ORDER BY a.inputDate,a.id_kota
						");
		return $q;
	}
	
	function export_rxqual_0($start=null,$end=null,$kota=false)
	{
		$AND_KOTA=($kota!="ALL") ? " AND a.id_kota='".$kota."' " : "";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT a.*,b.kota FROM rxqual_0 a
							LEFT JOIN kota b ON b.id_kota=a.id_kota
							WHERE 1=1
							AND a.RXQUAL < 6
							".$AND_KOTA."
							".$AND_PERIODE."
							ORDER BY a.inputDate,a.id_kota
						");
		return $q;
	}
	
	function export_serving_rs_rp_dbm_0($start=null,$end=null,$kota=false)
	{
		$AND_KOTA=($kota!="ALL") ? " AND a.id_kota='".$kota."' " : "";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT a.*,b.kota FROM serving_rs_rp_dbm_0 a
							LEFT JOIN kota b ON b.id_kota=a.id_kota
							WHERE 1=1
							AND a.RSRP < -110
							".$AND_KOTA."
							".$AND_PERIODE."
							ORDER BY a.inputDate,a.id_kota
						");
		return $q;
	}
	
	function export_serving_rs_rq_db_0($start=null,$end=null,$kota=false)
	{
		$AND_KOTA=($kota!="ALL") ? " AND a.id_kota='".$kota."' " : "";
		$AND_PERIODE=" AND a.inputDate>='".$start."' AND a.inputDate <='".$end."'";
		$q=$this->db->query("SELECT a.*,b.kota FROM serving_rs_rq_db_0 a
							LEFT JOIN kota b ON b.id_kota=a.id_kota
							WHERE 1=1
							AND a.RSRQ < -16
							".$AND_KOTA."
							".$AND_PERIODE."
							ORDER BY a.inputDate,a.id_kota
						");
		return $q;
	}
}