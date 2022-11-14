<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_VLAN extends CI_Model {
	
	function show_all($order=null,$limit=null,$seg=null){
		$this->db->from('nms_dealer_vlan');
		if(!empty($order)){
			$this->db->order_by('last_update',$order);
		} if(!empty($limit)){
			$this->db->limit($limit);
		} if(!empty($seg)){
			$this->db->where('segment',$seg);
		}
		$data=$this->db->get();
		return $data;
	}
	//
	function insert_vlan($segment,$ip,$subnet,$dealer,$subdealer,$area,$vlan_name,$vlan_id,$range){

		$data = array(
			'segment' => $segment,
			'ip_address' => $ip ,
			'subnet' => $subnet ,
			'dealer' => $dealer ,
			'subdealer' => $subdealer ,
			'area' => $area ,
			'vlan_name' => $vlan_name ,
			'vlan_id' => $vlan_id,
			'last_update' => date('Y-m-d H:i:s'),
			'last_update_by' => $this->session->userdata['username'] );
		$this->db->insert('nms_dealer_vlan',$data);
		//
		$id = $this->db->insert_id();
		//
		create_action_log('id# '.$id);

	}
	//
	function insert_all_ips($segment,$ipRange,$subnet,$dealer,$subdealer,$area,$vlan_name,$vlan_id,$range){
		//
		$ip1 = $ipRange[0];
		$ip2 = $ipRange[1];
		$eip1 = explode('.', $ip1);
		$eip2 = explode('.', $ip2);
		//
		for ($i=$eip1[2]; $i <= $eip2[2] ; $i++) { 
			$ip = $eip1[0].'.'.$eip1[1].'.'.$i.'.'.$eip1[3];
			# code...
			$query = $this->db->query("INSERT IGNORE INTO `nms_dealer_all_ips`(`segment`,`ip_address`,`subnet`,`dealer`, `subdealer` ,`area`,`vlan_name`,`vlan_id`) VALUES ('$segment','$ip','$subnet','$dealer', '$subdealer', '$area','$vlan_name','$vlan_id') ");
	}
	}
	//
	function showIP($ip=null,$vlanid=null,$seg=null){
		$this->db->from('nms_dealer_all_ips');
		if(!empty($ip)){
			$this->db->where('ip_address',$ip);	
		}if(!empty($vlanid)){
			$this->db->where('vlan_id',$vlanid);	
		}if(!empty($seg)){
			$this->db->where('segment',$seg);	
		}
		$query = $this->db->get();
		return $query;
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
			$this->db->delete('nms_dealer_vlan');
			// return $ip;
			create_action_log($ip);
	}

	}
	//
	function show_segment($seg=null){
		$this->db->from('nms_segment');
		if(!empty($seg)){
			$this->db->where('segment',$seg);
		}
		$query = $this->db->get();
		return $query;
	}
	
}