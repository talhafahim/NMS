<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index()
	{
		
			echo $this->session->userdata['username'];
			echo $this->session->userdata['status'];
		
	}
}
