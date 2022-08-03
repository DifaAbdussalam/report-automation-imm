<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['form_validation']);
    }

    public function index()
    {
		if($this->auth->isloginAdmin()){
			redirect('home');
		}else{
			$data = array();
			if($_POST) {
				$data = $this->auth->login($_POST);
			}
			return $this->auth->showLoginForm($data);
		}
    }
    public function logout()
    {
        if($this->auth->logout()){
            return redirect('login');
		}
        return false;
    }
}
