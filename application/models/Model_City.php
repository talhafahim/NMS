<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//
class Model_City extends CI_Model {	

	function show_all_cities(){
		$sql = "SELECT * FROM `nms_cities`";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function showcitiesById($id){
		$sql = "SELECT * FROM `nms_cities` where id = ?";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
	}
	function show_cities($name=null,$id=null){
		$this->db->from('nms_cities');
		if(!empty($id)){
			$this->db->where('id',$id);
		}if(!empty($name)){
			$this->db->where('city_name',$name);
		}
		$query=$this->db->get();
		return $query;
	}
}