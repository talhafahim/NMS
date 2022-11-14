<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_SMSnEmail extends CI_Model {
	
	function sendEmail($to,$msg){
	$config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_port' => 465,
		'smtp_user' => 'info@lbi.net.pk',
		'smtp_pass' => 'Lbi.net.pK'
	);
	$this->load->library('email', $config);
	$this->email->set_newline("\r\n");
//
	$this->email->from('no_reply@lbi.net.pk','LOGON BROADBAND INTERNET');
	$this->email->to($to);
	$this->email->subject('LBI NMS');
	$this->email->message($msg);
	if($this->email->send()){
// echo "email sent";
	}
}
	//
	function sendSMS($number,$msg){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://pk.eocean.us/APIManagement/API/RequestAPI?user=logon_eocean&pwd=AMKBBT0SdSAm6jnYDq4VHqbPVob51xM%2fPoLf7F9q4OOD60EQMy4DiABBj4uRmeRxYg%3d%3d&sender=Logon&reciever=$number&msg-data=$msg&response=string"); 
// old api
//curl_setopt($ch, CURLOPT_URL, "http://110.93.218.36:24555/api?action=sendmessage&username=$username&password=$password&recipient=$number&originator=99095&messagedata=$msg"); // new api
//
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
//
	}

}