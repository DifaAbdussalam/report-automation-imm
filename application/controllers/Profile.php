<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profile extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->auth->authenticate();
	}

	function index()
	{	
		$data = array();
		$data["title"] 		=APP_TITLE;
		$data['pages'] 		='profile';
		$this->load->view('index',$data);
	}
	
	function update()
	{
		$in['nama']	 		=$this->input->post('nama');
		$in['telepon']		=$this->input->post('telepon');
		$in['email']		=$this->input->post('email');
		$newpass=$this->input->post('newpassword');
		if($newpass!=''){
			$in['password']=$newpass;
		}
		
		$bersih=$_FILES['userfile']['name'];
		$ext	=explode(".",$bersih);
		$fname	=$ext[0];
		$fext	=$ext[1];
		$namefile=md5(str_replace(" ","_","$fname")).'.'.$fext;
					
		$config["file_name"]	=$namefile; 
		$config['upload_path'] 	= './asset/upload/admin/';
		$config['allowed_types']= 'bmp|gif|jpg|jpeg|png';
		$config['max_size'] 	= '50000';
		$config['max_width'] 	= '12000';
		$config['max_height'] 	= '12000';
		$config['create_thumb'] = TRUE;
					
		$this->load->library('upload', $config);	
		if(empty($_FILES['userfile']['name'])){
			$in['id']=$this->id;
			$this->app_model->update("admin",$in,"id_admin");
			$this->session->set_userdata('nama',$in['nama']);
			$this->session->set_userdata('telepon',$in['telepon']);
			$this->session->set_userdata('email',$in['email']);
			$this->session->set_flashdata('info','<p><div class="alert alert-warning">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong>Profile telah diupdate !</strong>
									</div>');
			redirect('profile/index');
		}else{		
			if(!$this->upload->do_upload()){
				$this->session->set_flashdata('info','<p><div class="alert alert-warning">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong>'.$this->upload->display_errors().'</strong>
									</div>');
				redirect('profile/index');
			}else{			
				$img=$this->foto;
				if($img!='avatar.png'){
					unlink("".$config['upload_path']."".$img."");
				}
				$this->res_img($namefile);
				$this->crop_img($namefile);
				$in['foto']=$namefile;
				$in['id']=$this->id;
				$this->app_model->update("admin",$in,"id_admin");
				$this->session->set_userdata('nama',$in['nama']);
				$this->session->set_userdata('telepon',$in['telepon']);
				$this->session->set_userdata('email',$in['email']);
				$this->session->set_userdata('foto',$in['foto']);
				$this->session->set_flashdata('info','<p><div class="alert alert-warning">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
											<strong>Profile telah diupdate !</strong>
										</div>');
				redirect('profile/index');
			}			
		}
	}
	
	public function res_img($img)
	{
		$upload_data 				= $this->upload->data();
		$config3['image_library'] 	= 'gd2';
		$config3['source_image'] 	= './asset/upload/admin/'.$img;
		$config3['new_image'] 		= './asset/upload/admin/'.$img;
		$config3['maintain_ratio'] 	= TRUE;
		$config3['create_thumb'] 	= FALSE;
		$config3['width'] 			= 215;
		$config3['height'] 			= 215;
		$dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($config3['width'] / $config3['height']);
		$config3['master_dim'] = ($dim > 0)? "height" : "width";
		
		$this->load->library('image_lib');
		$this->image_lib->initialize($config3);
		
		
		if (!$this->image_lib->resize()) 
		{
			echo $this->image_lib->display_errors();
		}
	}
	
	public function crop_img($img)
	{
		$config2['image_library'] = 'gd2';
		$config2['source_image'] = './asset/upload/admin/'.$img;
		$config2['new_image'] = './asset/upload/admin/'.$img;
		$config2['quality'] = "100%";
		$config2['maintain_ratio'] = FALSE;
		$config2['width']  = 215;
		$config2['height'] = 215;
		$config2['x_axis'] = '0';
		$config2['y_axis'] = '0';
			 
		$this->image_lib->clear();
		$this->image_lib->initialize($config2); 
							 
		if (!$this->image_lib->crop())
		{
			echo $this->upload->display_errors();
		}
	}
}
