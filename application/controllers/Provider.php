<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Provider extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();		
		$this->auth->authenticate();
	}
	
	function index()
	{
		$data["title"] 		= APP_TITLE;
		$data['pages'] 		= 'provider_view';
		$data["mdata"]		= $this->app_model->master("provider");
		$this->load->view('index',$data);
	}
	
	function add()
	{
		$data = array();
		$data["title"] 		= APP_TITLE;
		$data['pages'] 		= 'provider_add';
		$this->load->view('index',$data);
	}

	function save() 
	{
		$in["id_mnc"] 		=$this->input->post('id_mnc');
		$in["provider"] 	=$this->input->post('provider');
		$this->app_model->simpan("provider",$in);
		$this->session->set_flashdata('info','Data berhasil disimpan !');
		redirect('provider');
	}
	
	function edit($id=null)
	{	
		$id = base64_decode($id);
		$data = array();
		$data["title"]=APP_TITLE;
		$data['pages']='provider_edit';
		$data["mdata"]=$this->app_model->edit("provider","id_provider=".$id."")->row();
		$this->load->view('index',$data);
			
	}	

	function update()
	{			
		$in["id_provider"] 	=$this->input->post('id_provider');
		$in["id_mnc"] 		=$this->input->post('id_mnc');
		$in["provider"]		=$this->input->post('provider');
		$this->app_model->update("provider",$in,"id_provider");
		$this->session->set_flashdata('info','Data berhasil diupdate !');
		redirect('provider');
	}


	function remove($id=null)
	{
		$id = base64_decode($id);
		$this->app_model->hapus($id,"id_provider","provider");
		$this->session->set_flashdata('info','Data berhasil dihapus !');
		redirect('provider');		
	}
}