<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
        
	public function index()
	{
        $this->template->set('title','Welcome user! | MyWebApplication.com');
        $this->template->load('template','admin/index');
//		if($this->auth->is_logged_in() == false)
//		{
//			$this->login();
//		}
//		else
//		{
//			
//		}
	}
        
	public function manajemen_menu()
	{
		// mencegah user yang belum login untuk mengakses halaman ini
		$this->auth->restrict();
		// mencegah user mengakses menu yang tidak boleh ia buka
		$this->auth->cek_menu(1);
		// tampilkan isi menu manajemen menu (mungkin tabel menu/input form menu)
		$this->template->set('title','Manajemen Menu | MyWebApplication.com');
		$this->template->load('template','admin/manajemen_menu');
	}
        
    public function manajemen_user()
	{
		// mencegah user yang belum login untuk mengakses halaman ini
		$this->auth->restrict();
		// mencegah user mengakses menu yang tidak boleh ia buka. Parameter diisi dengan id menu
		$this->auth->cek_menu(2);
		// tampilkan isi menu manajemen menu (mungkin tabel menu/input form menu)
		$this->template->set('title','Manajemen User | MyWebApplication.com');
		$this->template->load('template','admin/manajemen_user');
	}
        
	public function login()
	{
        
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');

		if ($this->form_validation->run() == FALSE)
		{
			$this->template->set('title','Login Form | MyWebApplication.com');
			$this->template->load('template','admin/login_form');
		}
		else
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$success = $this->auth->do_login($username,$password);
			if($success)
			{
				redirect('home/index');
			}
			else
			{
				$this->template->set('title','Login Form | MyWebApplication.com');
				$data['login_info'] = "Maaf, username dan password salah!";
				$this->template->load('template','admin/login_form',$data);		
			}
		}
	}
    
	function logout()
	{
		if($this->auth->is_logged_in() == true)
		{
			// jika dia memang sudah login, destroy session
			$this->auth->do_logout();
		}
		// larikan ke halaman utama
		redirect('home');
	}
}