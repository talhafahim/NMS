<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//
		$this->load->model('Model_VLAN');
		$this->load->model('Model_Corp_VLAN');
		$this->load->model('Model_Office_VLAN');
		$this->load->model('Model_Switch');
		$this->load->model('Model_Ping');
	}
	public function index()
	{
		if(isLoggedIn()){
			$data['pops'] = $this->Model_Corp_VLAN->show_pops()->num_rows();
			$data['dealerVLAN'] = $this->Model_VLAN->show_all()->num_rows();
			$data['officeVLAN'] = $this->Model_Office_VLAN->show_all()->num_rows();
			$data['corparray'] = $this->corporate_vlan('array');
			$data['corpTotal'] = $this->corporate_vlan('total');
			$this->load->view('dashboard',$data);
		}else {
			redirect(base_url('login'));
		}
	}
	//
	public function switch () {
		$data['switch'] = $this->Model_Switch->show_switches()->num_rows();
		$reach = $this->Model_Ping->ping_reach(0)->num_rows();
		// $unreach = $this->Model_Ping->ping_reach(100)->num_rows();
		$unreach = $data['switch'] - $reach;
		//
		$data['reach'] = round(($reach/$data['switch']) * 100);
		$data['unreach'] = round(($unreach/$data['switch']) * 100);
		echo  json_encode($data);
	}
	//
	public function corporate_vlan($return=null){
		$cir = $this->Model_Corp_VLAN->show_vlan_CIR()->num_rows();
		$id = $this->Model_Corp_VLAN->show_vlan_ID()->num_rows();
		$p2p = $this->Model_Corp_VLAN->show_vlan_P2P()->num_rows();
		$service = $this->Model_Corp_VLAN->show_vlan_service()->num_rows();
		//
		$total = $cir+$id+$p2p+$service;
		//
		$cirper = round(($cir/$total)*100);
		$idper = round(($id/$total)*100);
		$p2pper = round(($p2p/$total)*100);
		$serper = round(($service/$total)*100);
		//
		$corparray = array(
			"cir" => array("name" => "IPT Service" , "count"=> $cir, "per"=> $cirper , "color" => "#40c4ff"),
			"id" => array("name" => "Shared Service" , "count"=> $id, "per"=> $idper , "color" => "#2961ff"),
			"p2p" => array("name" => "P2P Service" , "count"=> $p2p, "per"=> $p2pper , "color" => "#3e5569"),
			"service" => array("name" => "Other Service" , "count"=> $service, "per"=> $serper , "color" => "#7e74fb")
		);
		if($return == 'total'){
			return $total;
		}else{
			return $corparray;
		}
	}
	//
	public function get_dealerVLAN(){
		$vlan = $this->Model_VLAN->show_all('DESC',10);
		foreach ($vlan->result() as $value) {
			?>
			<tr>
				<td><?= $value->ip_address?></td><td><?= $value->last_update;?></td>
			</tr>
			<?php
		}
	}
	//
	public function get_switch(){
		$vlan = $this->Model_Switch->show_switches(null,null,'DESC',10);
		foreach ($vlan->result() as $value) {
			?>
			<tr>
				<td><?= $value->ip_address?></td><td><?= $value->last_update;?></td>
			</tr>
			<?php
		}
	}
	//
	public function get_corpVLAN(){
		$vlan = $this->Model_Corp_VLAN->show_vlan_CIR(null,'DESC',10);
		foreach ($vlan->result() as $value) {
			?>
			<tr>
				<td><?= $value->ip_address?></td><td><?= $value->last_update;?></td>
			</tr>
			<?php
		}
	}
}
