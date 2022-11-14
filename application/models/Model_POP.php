<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//
class Model_POP extends CI_Model {	
	//
	function responsible_person($popid=null){
		$this->db->select('r.*,u.firstname,u.lastname,u.email,u.address');
		$this->db->from('nms_pop_responsible_person as r');
		$this->db->join('nms_users as u','u.id = r.id');
		if(!empty($popid)){
			$this->db->where('r.pop_id',$popid);
		}
		$query = $this->db->get();
		return $query;
//
	}
	//
	function users(){
		$this->db->select('id,username,firstname,lastname,email,nic,mobilephone,address,status');
		$this->db->from('nms_users');
		$this->db->order_by('status','support,NOC Engineer');
		$this->db->where('status !=','admin');
		$data=$this->db->get();
		return $data;
	}
	//
	function last_checkin($popid){
		$this->db->select('pop.*,user.username');
		$this->db->from('nms_pop_last_checkin as pop');
		$this->db->join('nms_users as user','user.id = pop.id');
		$this->db->where('pop.pop_id',$popid);
		$this->db->order_by('pop.date desc,pop.time desc');
		$data=$this->db->get();
		return $data;
	}
	//
	function epi_list($popid=null){
		$this->db->from('nms_electric_pop_inquery as epi');
		$this->db->join('nms_pops as pop','pop.pop_id = epi.pop_id');
		if(!empty($popid)){
			$this->db->where('epi.pop_id',$popid);
		}
		$query = $this->db->get();
		return $query;

	}

}