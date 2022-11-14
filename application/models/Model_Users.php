<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Users extends CI_Model {
	

	function vlan_users(){
		$this->db->select('id,username,password,firstname,lastname,email,nic,mobilephone,address,status,access');
		$this->db->from('nms_users');
		$this->db->order_by('status','admin,accountant,coll_officer,support');
		$data=$this->db->get();
		return $data;
	}
	//
	function access_user_list(){
		$this->db->select('id,username,status');
		$this->db->from('nms_users');
		$query=$this->db->get();
		return $query;
	}
	//
	function module_list($mod=null){
		$this->db->from('nms_module_access');
		if(!empty($mod)){
			$this->db->where('module',$mod);
		}
		$this->db->order_by('category','ASC');
		$query=$this->db->get();
		return $query;
	}
	//
	function add_crud($id){
		$query = $this->module_list();
		foreach ($query->result() as $key => $value) {
			$data = array('id' => $id,'module' => $value->module);
			$this->db->insert('nms_crud_access',$data);
		}
	}
	//
	function delete_crud($id){
		$this->db->where('id',$id);
		$this->db->delete('nms_crud_access');
	}	
	//
	function get_user_detail($username=null){
		$this->db->from('nms_users');
		if(!empty($username)){
			$this->db->where('username',$username);
		}
		$query = $this->db->get();
		return $query;
	}

}