<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My404 extends CI_Controller {

	public function index()
	{
    	$this->load->view('error-404');//loading in custom error view
	}
}
