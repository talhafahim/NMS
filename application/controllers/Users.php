<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller {
	//
	public function __construct(){

		parent::__construct();
    // Loading model
		$this->load->model('Model_Users');
	}
	////////////////////////////////////////////////////////////////////////////
	public function index()
	{
		$sess_status = $this->session->userdata('status');
		if(isLoggedIn() && $sess_status == 'admin'){
			$this->load->view('userslist');
		}else {
			redirect(base_url('login'));
		}
	}
	//
	public function show_users(){
		$query=$this->Model_Users->vlan_users();
		//
		$ser=0;
		foreach ($query -> result() as $value) {
			$user=$value->username;
			$fname=$value->firstname;
			$lname=$value->lastname;
			$password=$value->password;
			$email=$value->email;
			$mobilephone=$value->mobilephone;
			$status=$value->status;
			$id=$value->id;
                  //
			$ser++;
			$deletemodal="$('#deleteModel').modal('show');document.getElementById('duserid').value=";
			?>
			<tr>
				<td><?php echo $ser;?></td>
				<td><i class="fas fa-user-circle"></i> <?php echo $user;?></td>
				<td><?php echo $fname;?></td>
				<td><?php echo $lname;?></td>
				<td><?php echo $email;?></td>
				<td><?php echo $mobilephone;?></td>
				<td><span class="label label-inverse"><?php echo $status;?></span></td>
				<td>
					<div class="btn-group">
					<button type="button" onclick="get_update_content(<?php echo $id;?>)" class="btn waves-effect waves-light btn-xs btn-info"><i class="fas fa-fw fa-edit"></i></button>
					<button type="button" onclick="<?php echo $deletemodal."'".$user."'";?>" class="btn waves-effect waves-light btn-xs btn-danger"><i class="fas fa-fw fa-trash-alt"></i></button>
				</div>
				</td>
			</tr>
		<?php } 

	}
	//
	public function delete_user()
	{
		$user=$this->input->post('user');
		if(!empty($user)){
			// 
			$this->db->select('id');
			$this->db->from('nms_users');
			$this->db->where('username',$user);
			$query=$this->db->get();
			$row=$query->row();
			$id=$row->id;
			$uid='user'.$id;
			// 
			$alter="ALTER TABLE  `nms_module_access` DROP  `$uid`";
			$this->db->query($alter);
			// 
			$this->db->where('username',$user);
			$this->db->delete('nms_users');
			//
			$this->Model_Users->delete_crud($id);
			// from helper
			create_action_log('user id '.$id);
			//
			echo "deleted";
		}
		
	}
	public function update_form(){
		$userid=$this->input->post('userid');
		$this->db->select('id,username,password,firstname,lastname,email,nic,mobilephone,address,status,access');
		$this->db->from('nms_users');
		$this->db->where('id',$userid);
		$query=$this->db->get();
		
		foreach ($query -> result() as $value) {
			$fnames= $value->firstname;
			$lnames=$value->lastname;
			$mails= $value->email;
			$nics= $value->nic;
			$password= $value->password;
			$password=md5($password);
			$mobiles= $value->mobilephone;
			$usernames= $value->username;
			$address= $value->address;
			$status= $value->status;
			$access= $value->access;
		}
		?>

		<input type="hidden" name="userid" value="<?php echo $userid;?>">
		
		<div class="modal-body">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Firstname</label>
							<input type="text" class="form-control" name="f_name" id="exampleFormControlInput1" required="" value="<?= $fnames;?>" >
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Lastname</label>
							<input type="text" class="form-control" name="l_name" id="exampleFormControlInput1" required="" value="<?= $lnames;?>">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Email</label>
							<input type="email" class="form-control" name="email" id="exampleFormControlInput1" required="" value="<?= $mails;?>">
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">CNIC</label>
							<input type="text" class="form-control" name="nic" id="exampleFormControlInput1" required="" value="<?= $nics;?>">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Username</label>
							<input type="text" class="form-control" name="username" id="exampleFormControlInput1" required="" value="<?= $usernames;?>">
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Password</label>
							<input type="password" class="form-control" name="password" id="exampleFormControlInput1"  >
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Mobile#</label>
							<input type="text" class="form-control" name="mobile" id="exampleFormControlInput1" required="" value="<?= $mobiles;?>">
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Address</label>
							<input type="text" class="form-control" name="address" id="exampleFormControlInput1" required="" value="<?= $address;?>">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<?php 
							if($access == '0'){
								$check = 'checked';
							}else{ $check = null; }
							?>
							<label for="exampleFormControlInput1">Block Account</label>
							<input type="checkbox" class="form-control" name="block" id="exampleFormControlInput1" value="0" <?= $check;?> >
						</div>
					</div>
					
				</div>
			</div>
		</div>

		<div class="modal-footer">
			<button class="btn btn-secondary" type="submit">Update</button>
		</div>


		<?php

	}
	public function add_user(){
		$fname= $this->input->post('f_name');
		$lname= $this->input->post('l_name');
		$mail= $this->input->post('email');
		$nic= $this->input->post('nic');
		$password= $this->input->post('password');
		$pass=md5($password);
		$mobile= $this->input->post('mobile');
		$username= $this->input->post('username');
		$address= $this->input->post('address');
		$status= $this->input->post('status');
		$data= array(
			'firstname'=> $fname,
			'lastname'=>$lname,
			'username'=>$username,
			'password'=>$pass,
			'pass_string'=>$password,
			'email'=>$mail,
			'nic'=>$nic,
			'mobilephone'=>$mobile,
			'address'=>$address,
			'status'=> $status
		);
		$insert=$this->db->insert('nms_users',$data);
		$insert_id = $this->db->insert_id();
		// 
		if($insert){
			$this->db->select('id');
			$this->db->from('nms_users');
			$this->db->where('username',$username);
			$query=$this->db->get();
			$row=$query->row();
			$id=$row->id;
			$id='user'.$id;
			// 
			$alter="ALTER TABLE  `nms_module_access` ADD  `$id` INT( 5 ) NOT NULL";
			$this->db->query($alter);
			//
			// from helper
			$this->Model_Users->add_crud($insert_id);
			create_action_log('user id '.$insert_id); 
			// 
		}
		// 
		echo "User Added Successfuly";
		// 

	}
	public function update_user()
	{
		$userid=$this->input->post('userid');
		$fname= $this->input->post('f_name');
		$lname= $this->input->post('l_name');
		$mail= $this->input->post('email');
		$nic= $this->input->post('nic');
		// 
		$new_pass= $this->input->post('password');
		if(!empty($new_pass)){
			$pass_md5=md5($new_pass);
		}
		// 
		$mobile= $this->input->post('mobile');
		$username= $this->input->post('username');
		$address= $this->input->post('address');
		$block= $this->input->post('block');
		if($block == NULL){
			$block = 1;
		}
		
		if(!empty($new_pass)){
			$data= array(
				'firstname'=> $fname,
				'lastname'=>$lname,
				'username'=>$username,
				'password'=>$pass_md5,
				'pass_string'=>$new_pass,
				'email'=>$mail,
				'nic'=>$nic,
				'mobilephone'=>$mobile,
				'address'=>$address,
				'access' => $block
			);
		}else{
			$data= array(
				'firstname'=> $fname,
				'lastname'=>$lname,
				'username'=>$username,
				'email'=>$mail,
				'nic'=>$nic,
				'mobilephone'=>$mobile,
				'address'=>$address,
				'access' => $block
			);
		}
		$this->db->where('id',$userid);
		$this->db->update('nms_users',$data);
		// from helper
		create_action_log('user id '.$userid); 
		echo 'User Updated Successfuly';
	}
	// 
	public function user_access(){
		$sess_status = $this->session->userdata('status');
		if(isLoggedIn() && $sess_status == 'admin'){
			$query=$this->Model_Users->access_user_list();
			$data['data1']=$query;
		//
			$query2=$this->Model_Users->module_list();
			$data['data2']=$query2;
			$this->load->view('user_access.php',$data);
		}else {
			redirect(base_url('login'));
		}
		
		
	}
	public function flip(){
		$module=$this->input->post('module');
		$user=$this->input->post('user');
		// 
		$this->db->select($user);
		$this->db->from('nms_module_access');
		$this->db->where('module',$module);
		$query=$this->db->get();
		$row=$query->row();
		$value=$row->$user;
		// 
		if($value==1){
			$access=0;
		}else{
			$access=1;
		}
		// echo $access;
		$data= array($user => $access);
		$this->db->where('module',$module);
		$this->db->update('nms_module_access',$data);
		//
		$userid = str_replace('user', '', $user);
		create_action_log('user id '.$userid .' '.$module.' '.$access); 
	}
	//
	public function crud_flip(){
		$module=$this->input->post('module');
		$id=$this->input->post('user');
		$oper=$this->input->post('operation');
		// 
		$this->db->select($oper);
		$this->db->from('nms_crud_access');
		$this->db->where('module',$module);
		$this->db->where('id',$id);
		$query=$this->db->get();
		$row=$query->row();
		$value=$row->$oper;
		// 
		if($value==1){
			$access=0;
		}else{
			$access=1;
		}
		// echo $access;
		$data= array($oper => $access);
		$this->db->where('module',$module);
		$this->db->where('id',$id);
		$this->db->update('nms_crud_access',$data);
		//
		create_action_log('user id '.$id .' '.$module.' '.$access.' '.$oper);  
	}
	//
	public function add_module(){
		$cat = $this->input->post('category');
		$mod = $this->input->post('mod_name');
		//
		$check = $this->Model_Users->module_list($mod);
		if($check->num_rows() <= 0){
			$data = array('category' => $cat , 'module' => $mod);
			$this->db->insert('nms_module_access',$data);
		//
			$data2 = $query=$this->Model_Users->vlan_users();
			foreach ($data2->result() as $key => $value) {
			//
				$data = array('id' => $value->id , 'module' => $mod);
				$this->db->insert('nms_crud_access',$data);
			//
			}
			echo 'Success : Added Successfully';
		}else{
			echo 'Error : Module already exist';
		}
	}
	
}