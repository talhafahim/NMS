<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cronjob extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//
		$this->load->model('Model_Switch');
		$this->load->model('Model_Ping');
	}
	public function index()
	{
		echo 'Welcome to LOGON';	
	}
	//
	public function ping($ip=null){
		echo 'Cron Stopped';
		// if(!empty($ip)){
		// 	$ips_array = array($ip);
		// }else{
		// 	$array = $this->Model_Switch->get_switch_ips()->result_array();
		// 	$ips_array = array_column($array, "ip_address");
		// }
		// //
		// $num = 0;
		// foreach ($ips_array as  $value) {
		// 		//
		// 	$this->Model_Ping->pingit($value);
		// 	$num++;
		// 	if($num == 10){
		// 		//sleep for 10 seconds
		// 		sleep(5);
		// 		$num = 0;
		// 	}
			
		// }
	}
}
