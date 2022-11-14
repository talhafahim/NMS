<?php
date_default_timezone_set("Asia/Karachi");
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	public function __construct(){

		parent::__construct();
//
		$this->load->model('Model_SMSnEmail');
	}
	public function index()
	{
		if(!isLoggedIn()){
			$this->load->view('login.php');
		}else{
			redirect(base_url());
		}
	}
	// public function login_verification()
	// {
	// 	$code=$this->session->userdata('acc_code');
	// 	$username=$this->session->userdata('acc_username');
	// 	$status=$this->session->userdata('acc_status');
	// 	if(empty($code) || empty($username)){
	// 		redirect(base_url().'login');
	// 	}else if(!empty($code) && !empty($username) && !empty($status)){
	// 		redirect(base_url());
	// 	}
	// 	$this->load->view('login_verification.php');
	// }
	public function loginCheck()
	{
		$username=$this->input->post('username');
		$password=$this->input->post('password');
//
		if(!empty($username) && !empty($password)){
//
			$this->db->select('id,password,email,mobilephone,status,firstname,lastname');
			$this->db->from('nms_users');
			$this->db->where('username',$username);
			$this->db->where('access',1);
			$this->db->limit(1);
			$query = $this->db->get();
			$row = $query->row();
//
			if($query->num_rows() > 0){
				$dbpass=$row->password;
				$email=$row->email;
				$contact=$row->mobilephone;
				$status=$row->status;
				$id=$row->id;
				$fname = $row->firstname;
				$lname = $row->lastname;
//
				if(md5($password) == $dbpass){
					if($status == 'support'){   // 
						// $this->session->set_userdata('acc_code','1111');
						$this->session->set_userdata('username',$username);
						$this->session->set_userdata('status',$status);
						$this->session->set_userdata('id',$id);
						$this->session->set_userdata('fname',$fname);
						$this->session->set_userdata('lname',$lname);
						echo "1";
						$this->login_audit($username);
					}else{
//
						// $digits=4;
						// $code=rand(pow(10, $digits-1), pow(10, $digits)-1);
// send code email
						// $messageEmail='LBI-'.$code." is your LOGON accounts verification code";
// $this->Model_SMSnEmail->sendEmail($email,$messageEmail); // sending code to email
// send code by sms
// $sms="LBI-$code+is+your+LOGON+accounts+verification+code";
// $this->Model_SMSnEmail->sendSMS($contact,$sms);
//
// $this->session->set_userdata('acc_code',$code);
						$this->session->set_userdata('username',$username);
						$this->session->set_userdata('status',$status);
						$this->session->set_userdata('id',$id);
						$this->session->set_userdata('fname',$fname);
						$this->session->set_userdata('lname',$lname);
						$this->login_audit($username);
//
						echo "1";
					}
				}else{
					echo 'Error : Invalid Credentials';
				}
			}else{
				echo 'Error : Invalid Credentials';
			}
		}
	}
// public function login_code_verification()
// {
// 	$usercode=$this->input->post('usercode');
// 	$usercode=str_replace("LBI-", "", $usercode);
// //
// 	$code=$this->session->userdata('acc_code');
// 	$username=$this->session->userdata('acc_username');
// //
// 	$this->db->select('status');
// 	$this->db->from('acc_users');
// 	$this->db->where('username',$username);
// 	$query=$this->db->get();
// 	$row=$query->row();
// //
// 	$status=$row->status;
// 	if($code==$usercode){
// //creating session
// 		$this->session->set_userdata('acc_status',$status);

// 		echo 1;
// //
// 	}else{
// 		echo '<p style="color:red;">Error : Invalid Code</p>';
// 	}
// }
	public function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('status');
//
// update logout time
		$date=date('Y-m-d H:i:s');
		$sessionid=$this->session->userdata('session_id');
//
		$data=array('logout_time' => $date);
		$this->db->where('session_id' , $sessionid);
		$this->db->update('nms_login_audit',$data);
//
		?>
		<script type="text/javascript">
			window.location = "<?php echo base_url();?>login";
		</script>
		<?php
	}

	public function login_audit($username){
		$ip = $this->input->ip_address();
		$date=date('Y-m-d H:i:s');
		$sessionid=md5(uniqid(rand(), true));
		$this->session->set_userdata('session_id',$sessionid);
//
		$query="INSERT INTO `nms_login_audit` (`username`,`session_id`,`login_time`,`ip`) values ('$username','$sessionid','$date','$ip')";
		$this->db->query($query);
	}
//
public function forgot_password(){
	$email=$this->input->post('fp_email');
	// $username=$this->input->post('fp_username');
	//
	$query=$this->db->select('mobilephone,pass_string')
	->from('nms_users')
	->where('email',$email)->get()->row();

	if($query){
		$mobile=$query->mobilephone;
		$pass=$query->pass_string;
		//
		echo '<p style="color:green;">Your password has been sent to your email </p>';
		//
		$msg='You have requested for your LBI NMS password retrieval . Your password is '.$pass;
		$this->Model_SMSnEmail->sendEmail($email,$msg);
		// 
	}else{
		echo '<p style="color:red;">Invalid email or no such email exist</p>';
	}
}
// controller end
}