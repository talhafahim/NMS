<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// `ip_address`, `subnet`, `corpporate`, `area`, `vlan_name`, `vlan_id`, `pkg`, `bandwidth`, `prim_pop`, `sec_pop`

class Model_Corp_VLAN extends CI_Model {
	
	function show_vlan_CIR($id=null,$order=null,$limit=null){
		$this->db->from('nms_corp_vlan');
		if(!empty($id)){
			$this->db->where('id',$id);
		} if(!empty($order)){
			$this->db->order_by('last_update',$order);
		} if(!empty($limit)){
			$this->db->limit($limit);
		}
		$data=$this->db->get();
		return $data;
	}
	//
	function show_vlan_ID($id=null){
		$this->db->from('nms_corp_vlan_id');
		if(!empty($id)){
			$this->db->where('serial',$id);
		}
		$data=$this->db->get();
		return $data;
	}
	//
	function show_vlan_P2P($id=null){
		$this->db->from('nms_corp_vlan_p2p');
		if(!empty($id)){
			$this->db->where('serial',$id);
		}
		$data=$this->db->get();
		return $data;
	}
	//
	function show_vlan_service($id=null){
		$this->db->from('nms_corp_vlan_service');
		if(!empty($id)){
			$this->db->where('serial',$id);
		}
		$data=$this->db->get();
		return $data;
	}
	//
	function insert_vlan($ip,$subnet,$total,$corporate,$area,$vlan_name,$vlan_id,$pkg,$bandwidth,$prim_pop,$sec_pop,$email,$poc,$longitude,$latitude,$connectedto){

		$data = array(
			'ip_address' => $ip[0],
			'ip_range' => $ip[0].'-'.$ip[1],
			'subnet' => $subnet,
			'total_ips' => $total,
			'corporate' => $corporate,
			'area' => $area,
			'vlan_name' => $vlan_name,
			'vlan_id' => $vlan_id,
			'pkg' => $pkg,
			'bandwidth' => $bandwidth,
			'prim_pop' => $prim_pop,
			'sec_pop' => $sec_pop,
			'last_update' => date('Y-m-d H:i:s'),
			'last_update_by' => $this->session->userdata['username'],
			'email' => $email,
			'poc' => $poc,
			'longitude' => $longitude,
			'latitude' => $latitude,
			'connected_to' => $connectedto
		);
		$this->db->insert('nms_corp_vlan',$data);
		$id = $this->db->insert_id();
		//
		create_action_log('id# '.$id);
	}
	//
	function insert_vlan_ID($id,$corporate,$area,$vlan_id,$pkg,$prim_pop,$sec_pop,$email,$poc,$longitude,$latitude,$connectedto){
 
		$data = array(
			'id_num' => $id,
			'name' => $corporate,
			'location' => $area,
			'vlan_id' => $vlan_id,
			'pkg' => $pkg,
			'last_update' => date('Y-m-d H:i:s'),
			'last_update_by' => $this->session->userdata['username'],
			'prim_pop' => $prim_pop,
			'sec_pop' => $sec_pop,
			'email' => $email,
			'poc' => $poc,
			'longitude' => $longitude,
			'latitude' => $latitude,
			'connected_to' => $connectedto
		);
		$this->db->insert('nms_corp_vlan_id',$data);
		//
		$id = $this->db->insert_id();
		//
		create_action_log('id# '.$id);
	}
	//
	function insert_vlan_P2P($corporate,$subcorp,$area,$vlan_id,$pkg,$prim_pop,$sec_pop,$email,$poc,$longitude,$latitude,$connectedto){
 
		$data = array(
			'corp_name' => $corporate,
			'sub_corp' => $subcorp,
			'location' => $area,
			'vlan_id' => $vlan_id,
			'pkg' => $pkg,
			'last_update' => date('Y-m-d H:i:s'),
			'last_update_by' => $this->session->userdata['username'],
			'prim_pop' => $prim_pop,
			'sec_pop' => $sec_pop,
			'email' => $email,
			'poc' => $poc,
			'longitude' => $longitude,
			'latitude' => $latitude,
			'connected_to' => $connectedto
		);
		$this->db->insert('nms_corp_vlan_p2p',$data);
		//
		$id = $this->db->insert_id();
		//
		create_action_log('id# '.$id);
	}
	//
	function insert_vlan_service($corporate,$subcorp,$area,$vlan_id,$pkg,$prim_pop,$sec_pop,$email,$poc,$longitude,$latitude,$connectedto){
 
		$data = array(
			'corp_name' => $corporate,
			'sub_corp' => $subcorp,
			'location' => $area,
			'vlan_id' => $vlan_id,
			'service' => $pkg,
			'last_update' => date('Y-m-d H:i:s'),
			'last_update_by' => $this->session->userdata['username'],
			'prim_pop' => $prim_pop,
			'sec_pop' => $sec_pop,
			'email' => $email,
			'poc' => $poc,
			'longitude' => $longitude,
			'latitude' => $latitude,
			'connected_to' => $connectedto
		);
		$this->db->insert('nms_corp_vlan_service',$data);
		//
		$id = $this->db->insert_id();
		//
		create_action_log('id# '.$id);
	}
	//
	function insert_all_ips($ipRange,$vlan_id){
		//
		$ip1 = $ipRange[0];
		$ip2 = $ipRange[1];
		$eip1 = explode('.', $ip1);
		$eip2 = explode('.', $ip2);
		//
		for ($i=$eip1[3]; $i <= $eip2[3] ; $i++) { 
			$ip = $eip1[0].'.'.$eip1[1].'.'.$eip1[2].'.'.$i;
			# code...
			$query = $this->db->query("INSERT IGNORE INTO `nms_corp_all_ips`(`ip_address`,`vlan_id`) VALUES ('$ip','$vlan_id') ");
		}
	}
	//
	function showIP($ip=null,$vlanid=null){
		$this->db->from('nms_corp_all_ips');
		if(!empty($ip)){
			$this->db->where('ip_address',$ip);	
		}if(!empty($vlanid)){
			$this->db->where('vlan_id',$vlanid);	
		}
		$query = $this->db->get();
		return $query;
	}
	//
	function get_IP_detail($ip=null,$vlanid=null){
		$this->db->from('nms_corp_vlan');
		if(!empty($ip)){
			$this->db->where('ip_address',$ip);	
		}if(!empty($vlanid)){
			$this->db->where('vlan_id',$vlanid);	
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
		for ($i=$eip1[3]; $i <= $eip2[3] ; $i++) { 
			$ip = $eip1[0].'.'.$eip1[1].'.'.$eip1[2].'.'.$i;
			# code...
			$this->db->where('ip_address',$ip);
			$this->db->delete('nms_corp_all_ips');
			//
			$this->db->where('ip_address',$ip);
			$this->db->delete('nms_corp_vlan');
			// return $ip;
			create_action_log('ip# '.$ip);
		}
		
	}
	//
	function show_pops($pop=null,$popid=null,$category=null){
		$this->db->from('nms_pops');
		if(!empty($pop)){
			$this->db->where('pop_name',$pop);
		} if(!empty($popid)){
			$this->db->where('pop_id',$popid);
		} if(!empty($category)){
			$this->db->where('category',$category);
		}
		$this->db->join('nms_cities as c','c.id = nms_pops.city_id');
		$query = $this->db->get();
		return $query;
	}
	function pop_electric_equi($popid = null){
		$this->db->from('nms_pop_electric_equiment');
		if(!empty($popid)){
			$this->db->where('pop_id',$popid);
		} 
		$query = $this->db->get();
		return $query;
	}
	//
	function pop_network_equi($popid = null){
		$this->db->from('nms_pop_network_equiment');
		if(!empty($popid)){
			$this->db->where('pop_id',$popid);
		} 
		$query = $this->db->get();
		return $query;
	}
	
}