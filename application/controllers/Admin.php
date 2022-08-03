<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();		
		$this->auth->authenticate();
	}
	
	function index()
	{
		$data = array();
		$data["title"]	= APP_TITLE;
		$data['pages'] 	= 'admin_view';
		$data['mdata'] 	= $this->app_model->manualQuery("SELECT * FROM admin WHERE id_admin!='".$this->auth->userid."'");
		$this->load->view('index',$data);

	}

	function add()
	{
		$data = array();
		$data["title"] 		= APP_TITLE;
		$data['mlevel'] 	= array('1'=>'Admin','2'=>'User');
		$data['mstatus'] 	= array('1'=>'Aktif','0'=>'Non Aktif');
		$data['pages'] 		= 'admin_add';
		$this->load->view('index',$data);
	}

	function save() 
	{
		$in["nama"]			=$this->input->post('nama');
		$in["telepon"]		=$this->input->post('telepon');
		$in["email"]		=$this->input->post('email');
		$in["level"]		=$this->input->post('level');
		$in["status"]		='1';
		$in["foto"]			='avatar.png';
		$in["username"]		=$this->input->post('username');
		$in["password"]		=$this->input->post('password');
		
		if($this->app_model->username_admin_cek($in['username'])){
			if($this->app_model->email_admin_cek($in['email'])){
				$this->app_model->simpan("admin",$in);
				$this->session->set_flashdata('info','Data berhasil disimpan !');
				redirect('admin');
			}else{
				$this->session->set_flashdata('info','Kesalahan, email telah terdaftar !');
				redirect('admin/add');
			}	
		}else{
			$this->session->set_flashdata('info','kesalahan, username telah terdaftar !');
			redirect('admin/add');	
		}
	}


	function edit($id=null)
	{
		$id = base64_decode($id);	
		$data = array();
		$data["title"] 		= APP_TITLE;
		$data['pages'] 		= 'admin_edit';
		$data['mlevel'] 	= array('1'=>'Admin','2'=>'User');
		$data['mstatus'] 	= array('1'=>'Aktif','0'=>'Non Aktif');
		$data['mdata'] 		= $this->app_model->edit("admin","id_admin='".$id."'")->row();	
		$this->load->view('index',$data);
	}	

	function update() 
	{
		$email				=$this->input->post('email');
		$current_email		=$this->input->post('current_email');
		$username			=$this->input->post('username');
		$current_username	=$this->input->post('current_username');
		
		$in["id_admin"]		=$this->input->post('id_admin');
		$in["nama"]			=$this->input->post('nama');
		$in["telepon"]		=$this->input->post('telepon');
		$in["email"]		=$email;
		$in["level"]		=$this->input->post('level');
		$in["username"]		=$username;
		
		$newpassword		=$this->input->post('password');
		if($newpassword!=''){
			$in["password"]	=$newpassword;
		}
		if($current_username!=$username){
			if($this->app_model->username_admin_cek($username)){
				if($current_email!=$email){
					if($this->app_model->email_admin_cek($email)){
						$this->app_model->update("admin",$in,"id_admin");
						$this->session->set_flashdata('info','Data berhasil diupdate !');
						redirect('admin');
						
					}else{
						$this->session->set_flashdata('info','Kesalahan, email telah terdaftar !');
						redirect('admin/edit/'.trim(base64_encode($in['id_admin']),'=').'');
					}
				}else{
					$this->app_model->update("admin",$in,"id_admin");
					$this->session->set_flashdata('info','Data berhasil diupdate !');
					redirect('admin');
				}
			}else{
				$this->session->set_flashdata('info','Kesalahan, username telah terdaftar !');
				redirect('admin/edit/'.trim(base64_encode($in['id_admin']),'=').'');	
			}
		}else{
			if($current_email!=$email){
				if($this->app_model->email_cek($email)){
					$this->app_model->update("admin",$in,"id_admin");
					$this->session->set_flashdata('info','Data berhasil diupdate !');
					redirect('admin');
					
				}else{
					$this->session->set_flashdata('info','Kesalahan, email telah terdaftar !');
					redirect('admin/edit/'.trim(base64_encode($in['id_admin']),'=').'');
				}
			}else{
				$this->app_model->update("admin",$in,"id_admin");
				$this->session->set_flashdata('info','Data berhasil diupdate !');
				redirect('admin');
			}
		}
		
	}
	
	function remove($id=null)
	{
		$id = base64_decode($id);
		$profile=$this->app_model->get_foto_profile($id);
		$source_file=FCPATH.'asset/profile/'.$profile.'';
		if($profile!='avatar.png'){
			if(file_exists($source_file)){
			   unlink("asset/profile/".$profile."");
			}
		}
		$this->app_model->hapus($id,"id_admin","admin");
		$this->session->set_flashdata('info','Data berhasil dihapus !');
		redirect('admin');
	}
	
	
	function aktivasi($id=null)
	{
		$id = base64_decode($id);
		$this->app_model->manualQuery("update admin set status='1' WHERE id_admin='".$id."'");
		$this->session->set_flashdata('info','Data berhasil diaktivasi !');
		redirect('admin');
	}
	
	function suspend($id=null)
	{
		$id = base64_decode($id);
		$this->app_model->manualQuery("update admin set status='0' WHERE id_admin='".$id."'");
		$this->session->set_flashdata('info','Data berhasil disuspend !');
		redirect('admin');
	}
}
