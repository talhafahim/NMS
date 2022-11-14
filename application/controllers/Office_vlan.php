<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Office_vlan extends CI_Controller {
	//
	public function __construct(){

		parent::__construct();
		//
		$this->load->model('Model_Office_VLAN');
	}
	public function index()
	{  
		if(isLoggedIn() && in_array("vlan office", access_subCat()) )  {
			$this->load->view('vlan_office');
		}else {
			redirect(base_url('login'));
		}
	}
	//
	public function get_vlan(){
		if(isLoggedIn()){
			$data = $this->Model_Office_VLAN->show_all();
			$deletemodal="$('#deleteModel').modal('show');document.getElementById('userip').value=";
			foreach ($data->result() as $key => $value) {
				?>
				<tr>
					<td><?php echo $key+1;?></td>
					<td><?= $value->ip_address;?></td>
					<td><?= $value->subnet;?></td>
					<td><?= $value->vlan_name; ?></td>
					<td><?= $value->vlan_id; ?></td>
					<td><?= $value->assign_to; ?></td>
					<td><?= $value->last_update; ?></td>
					<td><?= $value->last_update_by; ?></td>
					<td>
						<div class="btn-group">
							<?php if(access_crud('vlan office','update')){?>
								<button class="btn waves-effect waves-light btn-xs btn-info" onclick="get_update_content('<?= $value->ip_address;?>')"><i class="fa fa-edit"></i></button>
							<?php } if(access_crud('vlan office','delete')){?>
								<button class="btn waves-effect waves-light btn-xs btn-danger" onclick="<?php echo $deletemodal."'".$value->ip_address."'";?>"><i class="fa fa-trash"></i></button>
							<?php }?>
						</div>
					</td>
				</tr>
				<?php
			}
		}else{
			redirect(base_url('login'));
		}
	}
        //
	public function insert(){
		if(isLoggedIn()){
			$ip = $this->input->post('ip');
			$subnet = $this->input->post('subnet');
			$vlan_name = $this->input->post('vlan_name');
			$vlan_id = $this->input->post('vlan_id');
			$assignto = $this->input->post('assignto');
            //
			$data = $this->Model_Office_VLAN->show_all($ip);
			if($data->num_rows() == 0){
				$this->Model_Office_VLAN->insert_vlan($ip,$subnet,$vlan_name,$vlan_id,$assignto);
               	//
				echo 'Success : Successfully Added';
            // 
			}else{
				echo 'Error : IP Already Exist';
			}
		}else{
			redirect(base_url('login'));
		}

	}
		//
	public function update_form(){
		$ip = $this->input->post('ip');
		$data = $this->Model_Office_VLAN->show_all($ip)->row();
			//
		?>
		<input type="hidden" name="id" value="<?php echo $data->id;?>">
		<!--  -->
		<div class="modal-body">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">IP address</label>
							<input type="text" class="form-control" name="ip" id="exampleFormControlInput1" placeholder="192.168.100.1" pattern="[0-9.]*" required="" value="<?= $data->ip_address;?>">
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Subnet</label>
							<input type="number" class="form-control" name="subnet" id="exampleFormControlInput1" required="" value="<?= $data->subnet;?>">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">VLAN Name</label>
							<input type="text" class="form-control" name="vlan_name" id="exampleFormControlInput1" required="" value="<?= $data->vlan_name;?>">
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">VLAN ID</label>
							<input type="number" min="2" max="4094" class="form-control" name="vlan_id" id="exampleFormControlInput1" required="" value="<?= $data->vlan_id;?>">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12 ">
				<div class="form-group">
					<label for="exampleFormControlInput1">Assign To</label>
					<input type="text" class="form-control" name="assignto" id="exampleFormControlInput1" required="" value="<?= $data->assign_to;?>">
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="submit">Update</button>
			</div>
		</div>
		<?php

	}
		//
	public function update_vlan()
	{
		$id = $this->input->post('id');

		$ip = $this->input->post('ip');
		$subnet = $this->input->post('subnet');
		$vlan_name = $this->input->post('vlan_name');
		$vlan_id = $this->input->post('vlan_id');
		$assignto = $this->input->post('assignto');
			//
		$data = array('ip_address' => $ip, 'subnet' => $subnet, 'vlan_name' => $vlan_name, 'vlan_id' => $vlan_id, 'last_update' => date('Y-m-d H:i:s') ,'last_update_by' => $this->session->userdata['username'] ,'assign_to' => $assignto);
			//
		$this->db->where('id',$id);
		$this->db->update('nms_office_vlan',$data);
			//
		create_action_log('id#'.$id);
			//
		echo 'Update Successfully';
	}
		//
	public function delete_ip(){
		$ip = $this->input->post('ip');
			//
		$this->db->where('ip_address',$ip);
		$this->db->delete('nms_office_vlan');
			//
		create_action_log('ip '.$ip);
		echo 'Delete Successfully';

	}
		//
	
}
