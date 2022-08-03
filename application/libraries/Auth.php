<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth
{
    protected $CI;
	public $user 	 	= null;
    public $userid 	 	= null;
	public $username 	= null;
    public $nama 	 	= null;
	public $telepon 	= null;
	public $email 		= null;
    public $level 		= null;
	public $foto 		= null;
    public $isloginAdmin= false;
	
    public function __construct()
    {
        $this->CI =& get_instance();
        $this->init();
    }

    protected function init()
    {
        if ($this->CI->session->isloginAdmin) {
            $this->userid 		= $this->CI->session->userid;
			$this->username 	= $this->CI->session->username;
			$this->email 		= $this->CI->session->email;
			$this->nama 		= $this->CI->session->nama;
			$this->telepon 		= $this->CI->session->telepon;
			$this->level 		= $this->CI->session->level;
            $this->foto 		= $this->CI->session->foto;
			$this->isloginAdmin = $this->CI->session->isloginAdmin;
        }
        return;
    }

    public function showLoginForm($data = array())
    {
        return $this->CI->load->view("login", $data);
    }

    public function login($request)
    {
        if ($this->validate($request)) {
            $this->user= $this->credentials($this->username, $this->password);
            if ($this->user) {
				if($this->user->status==1){
					return $this->setUser();
				}else{
					 return $this->suspendAccount($request);
				}
            } else {
                return $this->failedLogin($request);
            }
        }
        return false;
    }
	
    protected function validate($request)
    {
        $this->CI->form_validation->set_rules('username', 'Username', 'required');
        $this->CI->form_validation->set_rules('password', 'Password', 'required');

        if ($this->CI->form_validation->run() == TRUE) {
            $this->username = $this->CI->input->post("username", TRUE);
            $this->password = $this->CI->input->post("password", TRUE);
            return true;
        }

        return false;
    }

    protected function credentials($username, $password)
    {
        $user= $this->CI->app_model->login_admin($username,$password);
		if($user){
			return $user->row();
        }
        return false;
    }

    protected function setUser()
    {
		$this->userid=$this->user->id_admin;
        $this->CI->session->set_userdata(array(
            "userid" => $this->user->id_admin,
            "username" => $this->user->username,
            "email" => $this->user->email,
            "nama" => $this->user->nama,
            "telepon" => $this->user->telepon,
            "level" => $this->user->level,
            "foto" => $this->user->foto,
			"isloginAdmin" => true,
        ));
        return redirect("home");
    }
	
    protected function failedLogin($request)
    {
        $this->CI->session->set_flashdata('error_login', 'Invalid Username or password');
    }

	protected function suspendAccount($request)
    {
        $this->CI->session->set_flashdata('error_login', 'Account Not Active');
    }
	
    public function authenticate()
    {
        if (!$this->isloginAdmin()) {
            return redirect('login');
        }
        return true;
    }
		
	public function isloginAdmin()
    {
        return $this->isloginAdmin;
    }
	
	public function userid()
    {
        return $this->userid;
    }
	
	public function username()
    {
        return $this->username;
    }
	
	
	public function nama()
    {
        return $this->nama;
    }
	
	public function telepon()
    {
        return $this->telepon;
    }
	
	public function email()
    {
        return $this->email;
    }
	
	public function level()
    {
        return $this->level;
    }
	
	public function foto()
    {
        return $this->foto;
    }
	
    public function logout()
    {
		$this->CI->session->sess_destroy();
		$this->CI->session->set_flashdata('error_login', 'You Are Logout!');
		$this->CI->db->close();
		return true;
    }
}
