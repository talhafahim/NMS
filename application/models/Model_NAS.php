<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//
class Model_NAS extends CI_Model {	

	function show($id=null,$ip=null,$tag=null){
		$this->db->from('nms_nas');
		if(!empty($id)){
			$this->db->where('id',$id);
		}if(!empty($ip)){
			$this->db->where('ip_address',$ip);
		}if(!empty($tag)){
			$this->db->where('tag',$tag);
		}
		$query=$this->db->get();
		return $query;
	}
}