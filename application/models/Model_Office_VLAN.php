<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Office_VLAN extends CI_Model {
	
	function show_all($ip=null){
		$this->db->from('nms_office_vlan');
		if(!empty($ip)){
			$this->db->where('ip_address',$ip);
		}
		$data=$this->db->get();
		return $data;
	}
	//
	function insert_vlan($ip,$subnet,$vlan_name,$vlan_id,$assignto){

		$data = array(
			'ip_address' => $ip ,
			'subnet' => $subnet ,
			'vlan_name' => $vlan_name ,
			'vlan_id' => $vlan_id,
			'assign_to' => $assignto,
			'last_update' => date('Y-m-d H:i:s'),
			'last_update_by' => $this->session->userdata['username'] );
		$this->db->insert('nms_office_vlan',$data);
		//
		$id = $this->db->insert_id();
		//
		create_action_log('id# '.$id);

	}
	//
	function deleteIP($ipRange){
		$ip1 = $ipRange[0];
		$ip2 = $ipRange[1];
		$eip1 = explode('.', $ip1);
		$eip2 = explode('.', $ip2);
		//
		for ($i=$eip1[2]; $i <= $eip2[2] ; $i++) { 
			$ip = $eip1[0].'.'.$eip1[1].'.'.$i.'.'.$eip1[3];
			# code...
			$this->db->where('ip_address',$ip);
			$this->db->delete('nms_dealer_all_ips');
			//
			$this->db->where('ip_address',$ip);
			$this->db->delete('nms_office_vlan');
			// return $ip;
			create_action_log($ip);
	}

	}
	
}