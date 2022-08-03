<?php
Class App_model extends CI_Model
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
		$q=$this->db->query("select COUNT(id) as total from $tabel");
		return $q->row()->total;
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
	function CekID($tbl,$field,$id)
	{
		$CResult=$this->db->query("SELECT $field FROM $tbl WHERE $field='$id'");
		if(count($CResult->result_array())>0){	
			return false;
		}else{
			return true;
		}
	}
	
	function login_admin($username,$password)
	{
		$query=$this->db->query("SELECT a.* FROM admin a WHERE a.username='$username' AND a.password='$password'");
		return $query;
	}
	function username_admin_cek($username){
		$cek_result=$this->db->query("SELECT * FROM admin WHERE username='$username' ");
		if(count($cek_result->result_array())>0){	
			return false;
		}else{
			return true;
		}
	}
	
	function email_admin_cek($email){
		$cek_result=$this->db->query("SELECT * FROM admin WHERE email='$email'");
		if(count($cek_result->result_array())>0){	
			return false;
		}else{
			return true;
		}
	}
	
	function get_foto_admin($kode_admin=null){
		$foto='avatar.png';
		$query=$this->db->query("SELECT * from admin where id_admin='".$kode_admin."'");
		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				$foto=$row['foto'];
			}
			
		}
		return $foto;
	}
}