<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Switch_Spark extends CI_Model {
	
	function show_switches($ip=null,$id=null,$order=null,$limit=null,$city=null){
		$this->db->from('nms_switch_spark');
		if(!empty($ip)){
			$this->db->where('ip_address',$ip);
		}if(!empty($id)){
			$this->db->where('swit_id',$id);
		}if(!empty($city)){
			$this->db->where('city_id ',$city);
		}if(!empty($order)){
			$this->db->order_by('last_update',$order);	
		}if(!empty($limit)){
			$this->db->limit($limit);
		}
		$data=$this->db->get();
		return $data;
	}
	//
	function insert_switch($switch,$ip,$dealer,$area,$version,$model,$priPop,$secPop,$vlan,$connect_to,$stack,$ether, $city_id){
		$data = array(
			'switch_name' => $switch,
			'ip_address' => $ip,
			'dealer' => $dealer,
			'area' => $area,
			'version' => $version,
			'model' => $model,
			'prim_pop' => $priPop,
			'sec_pop' => $secPop,
			'vlan' => $vlan,
			'stack_switch' => $stack,
			'ether_channel' => $ether,
			'connected_to' => $connect_to,
			'city_id' => $city_id,
			'last_update' => date('Y-m-d H:i:s'),
			'last_update_by' => $this->session->userdata['username'] );

		$this->db->insert('nms_switch_spark',$data);
		$id = $this->db->insert_id();
		//
		create_action_log('id# '.$id);
	}
	//
	function dealer_info($panel=null){
		$this->db->from('nms_dealer_info');
		$this->db->order_by('username');
		if(!empty($panel)){
			$this->db->where('panel',$panel);
		}
		$query = $this->db->get();
		return $query;
	}
	//
	function get_switch_ips(){
		$this->db->select('ip_address');
		$this->db->from('nms_switch_spark');
		$query = $this->db->get();
		return $query;
	}
	//
	function get_ping($ip=null){
		$this->db->from('nms_switch_ping');
		if(!empty($ip)){
			$this->db->where('ip_address',$ip);
		}
		$query = $this->db->get();
		return $query;
	}
}