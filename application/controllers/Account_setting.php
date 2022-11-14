<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_setting extends CI_Controller {
	//
	public function __construct(){

		parent::__construct();
		//
		$this->load->model('Model_Users');
	}
	//
	public function index()
	{
		if(isLoggedIn()){
			$username = $this->session->userdata['username'];
			$data['user'] = $this->Model_Users->get_user_detail($username)->row();
			$this->load->view('account_setting',$data);
		}else {
			redirect(base_url('login'));
		}
	}
}
