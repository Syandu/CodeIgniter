<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class administrator extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}

	// melihat halaman login
	public function index(){
		if(!$this->session->userdata('logged_in'))
			$this->load->view('auth/login');
		else
			$this->view_success_page();
	}

	// memeriksa keberadaan akun username
	public function proses_login(){

		$username = $this->input->post('username', 'true');
		
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('pass', 'password', 'required');
		
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('notification', 'Peringatan : Username dan Password tidak cocok');
			$this->load->view('auth/login');
		} else{
			$array_items = array(
				'username' => $username,
				'logged_in' => TRUE
				);

			$this->session->set_userdata($array_items);
			// $this->user = $this->usermodel->get_user_by_username('admin')->row();
			$this->view_success_page();
		}
	}


	public function view_success_page(){
		$data['user'] = $this->usermodel->get_user_by_username($this->session->userdata('username'))->row();
		$this->load->view('admin/adminboard', $data);
	}

	// keluar dari sistem
	public function logout(){
		$this->session->sess_destroy();
		redirect(site_url('administrator'));
	}

}