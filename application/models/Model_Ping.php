<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_Ping extends CI_Model {
	
	function pingit($ip=null,$res=null){
		exec("ping -c 4 " . $ip, $ping_time);
		if(isset($ping_time[7])){
			$response = $ping_time[7];
		}else{ 
			$response = $ping_time[3];
		}
				// echo $response.'<br>';
				// 
		if (strpos($response, 'packets transmitted') !== false) {
				//
			$packet_loss = explode(',', $response);
			$loss = explode('%', $packet_loss[2]);
				//
			$sql = "INSERT into `nms_switch_ping` (`ip_address`, `ping_response`, `packet_loss`, `last_update`) values ('$ip','$response','$loss[0]', NOW()) ON DUPLICATE KEY UPDATE `ping_response` = '$response', `packet_loss` = '$loss[0]' , `last_update` = NOW()";
			$this->db->query($sql);
			//
			if(!empty($res)){
				echo $response;
			}
		}
	}
	//
	function ping_reach($per){
		$this->db->from('nms_switch_ping as ping');
		$this->db->join('nms_switch as swit','ping.ip_address = swit.ip_address');
		$this->db->where('ping.packet_loss',$per);
		$query = $this->db->get();
		return $query;
	}
	
}