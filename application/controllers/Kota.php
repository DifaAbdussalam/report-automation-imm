<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kota extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();		
		$this->auth->authenticate();
	}
	
	function index()
	{
		$data["title"] 	= APP_TITLE;
		$data['pages'] 	= 'kota_view';
		$data["mdata"]	= $this->app_model->master("kota");
		$this->load->view('index',$data);
	}
	
	function add()
	{
		$data = array();
		$data["title"] = APP_TITLE;
		$data['pages'] = 'kota_add';
		$this->load->view('index',$data);
	}

	function save() 
	{
		$in["kota"] =$this->input->post('kota');
		$this->app_model->simpan("kota",$in);
		$this->session->set_flashdata('info','Data berhasil disimpan !');
		redirect('kota');
	}
	
	function edit($id=null)
	{	
		$id = base64_decode($id);
		$data = array();
		$data["title"]=APP_TITLE;
		$data['pages']='kota_edit';
		$data["mdata"]=$this->app_model->edit("kota","id_kota=".$id."")->row();
		$this->load->view('index',$data);
			
	}	

	function update()
	{			
		$in["id_kota"] 	=$this->input->post('id_kota');
		$in["kota"]		=$this->input->post('kota');
		$this->app_model->update("kota",$in,"id_kota");
		$this->session->set_flashdata('info','Data berhasil diupdate !');
		redirect('kota');
	}


	function remove($id=null)
	{
		$id = base64_decode($id);
		$this->app_model->hapus($id,"id_kota","kota");
		$this->session->set_flashdata('info','Data berhasil dihapus !');
		redirect('kota');		
	}
}