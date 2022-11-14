<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//
//
function isLoggedIn()
{
	$CI =& get_instance();
	$CI->load->database();
	if (!empty($CI->session->userdata['username']) && !empty($CI->session->userdata['status'])) {
		return true;
	} else {
		return false;
	}
}
//
function create_action_log($others){
	$CI =& get_instance();
	$CI->load->database();
	$CI->load->library('session');
	//
	$class=$CI->router->fetch_class();
	$method=$CI->router->fetch_method();
	$user=$CI->session->userdata('username');
	$ip = $_SERVER['REMOTE_ADDR'];	
		//
	$data=array('date' => date('Y-m-d'),
		'user' => $user,
		'time' => date('H:i:s'),
		'ip_address' => $ip,
		'class' => $class,
		'method' => $method,
		'description' => $others
	);
	$insert=$CI->db->insert('nms_action_log',$data);
}
//
function user_info($data){
	$CI =& get_instance();
	$CI->load->database();
	//
	$username=$CI->session->userdata('username');
	$status=$CI->session->userdata('status');
// 
	$CI->db->select('id');
	$CI->db->from('nms_users');
	$CI->db->where('username',$username);
	$acc_query1=$CI->db->get();
	$acc_row=$acc_query1->row();

	if($acc_query1->num_rows() > 0){

		$acc_id = $acc_row->id;
		$acc_user ='user'.$acc_id;
		if($data == 'field'){
			return $acc_user;
		}else if($data == 'id'){
			return $acc_id;	
		}
	}else{
		return NULL;
	}
}
//
function access_cat(){
	$CI =& get_instance();
	$CI->load->database();
	//
	$category = array();
	$acc_user = user_info('field');
	//
	$acc_query3="SELECT `category` from `nms_module_access` where `$acc_user` = 1 ";
	$acc_query3=$CI->db->query($acc_query3);
	foreach($acc_query3 -> result() as $value2){
		$cat=$value2->category;
		$category[]=$cat;
	}
	return $category;
}
//
function access_subCat(){
	$CI =& get_instance();
	$CI->load->database();
	//
	$module = array();
	$acc_user = user_info('field');
	//
	$acc_query3="SELECT `module` from `nms_module_access` where `$acc_user` = 1 ";
	$acc_query3=$CI->db->query($acc_query3);
	foreach($acc_query3 -> result() as $value2){
		$mod=$value2->module;
		$module[]=$mod;
	}
	return $module;
}
//
function access_crud($module,$operation,$uid=null){
	$CI =& get_instance();
	$CI->load->database();
	//
	if(empty($uid)){
		$uid = user_info('id');	
	}
	//
	$acc_query3="SELECT `module` from `nms_crud_access` where `id` = '$uid' and `module` = '$module' and `$operation` = 1 ";
	$acc_query3=$CI->db->query($acc_query3);
	//
	if($acc_query3->num_rows() > 0){
		return true;
	}else{
		return false;
	}

}
//
function call_API($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
		return $result;
	}
?>