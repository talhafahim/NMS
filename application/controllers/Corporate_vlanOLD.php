<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// `ip_address`, `subnet`, `corpporate`, `area`, `vlan_name`, `vlan_id`, `pkg`, `bandwidth`, `prim_pop`, `sec_pop`
class Corporate_vlan extends CI_Controller {
//
	public function __construct(){

		parent::__construct();
//
		$this->load->model('Model_Corp_VLAN');
	}
	public function index()
	{
		if(isLoggedIn() && in_array("vlan corporate", access_subCat()) ){
			$data['pops'] = $this->Model_Corp_VLAN->show_pops();
			$this->load->view('vlan_corporate',$data);
		}else {
			redirect(base_url('login'));
		}
	}
//
	public function view_cir()
	{
		if(isLoggedIn() && in_array("vlan corporate", access_subCat()) ){
			$id = $this->uri->segment(3);
			$data['data'] = $this->Model_Corp_VLAN->show_vlan_CIR($id)->row();
			$data['prim_pop'] = $this->Model_Corp_VLAN->show_pops(null,$data['data']->prim_pop)->row()->pop_name;
			$data['sec_pop'] = $this->Model_Corp_VLAN->show_pops(null,$data['data']->sec_pop)->row()->pop_name;
			$this->load->view('view_vlan_corp_cir',$data);
		}else {
			redirect(base_url('login'));
		}
	}
	//
	public function view_id()
	{
		if(isLoggedIn() && in_array("vlan corporate", access_subCat()) ){
			$id = $this->uri->segment(3);
			$data['data'] = $this->Model_Corp_VLAN->show_vlan_ID($id)->row();
			$data['prim_pop'] = $this->Model_Corp_VLAN->show_pops(null,$data['data']->prim_pop)->row()->pop_name;
			$data['sec_pop'] = $this->Model_Corp_VLAN->show_pops(null,$data['data']->sec_pop)->row()->pop_name;
			$this->load->view('view_vlan_corp_id',$data);
		}else {
			redirect(base_url('login'));
		}
	}
	//
	public function view_p2p()
	{
		if(isLoggedIn() && in_array("vlan corporate", access_subCat()) ){
			$id = $this->uri->segment(3);
			$data['data'] = $this->Model_Corp_VLAN->show_vlan_P2P($id)->row();
			$data['prim_pop'] = $this->Model_Corp_VLAN->show_pops(null,$data['data']->prim_pop)->row()->pop_name;
			$data['sec_pop'] = $this->Model_Corp_VLAN->show_pops(null,$data['data']->sec_pop)->row()->pop_name;
			$this->load->view('view_vlan_corp_p2p',$data);
		}else {
			redirect(base_url('login'));
		}
	}
	//
	public function view_service()
	{
		if(isLoggedIn() && in_array("vlan corporate", access_subCat()) ){
			$id = $this->uri->segment(3);
			$data['data'] = $this->Model_Corp_VLAN->show_vlan_service($id)->row();
			$data['prim_pop'] = $this->Model_Corp_VLAN->show_pops(null,$data['data']->prim_pop)->row()->pop_name;
			$data['sec_pop'] = $this->Model_Corp_VLAN->show_pops(null,$data['data']->sec_pop)->row()->pop_name;
			$this->load->view('view_vlan_corp_service',$data);
		}else {
			redirect(base_url('login'));
		}
	}
//
	public function get_vlan_cir(){
		if(isLoggedIn()){
			$data = $this->Model_Corp_VLAN->show_vlan_CIR();
			$deletemodal="$('#deleteModel').modal('show');document.getElementById('userip').value=";
			foreach ($data->result() as $key => $value) {
				?>
				<tr>
					<td><?php echo $key+1;?></td>					
					<td><?= $value->corporate;?></td>
					<td><?= $value->ip_address;?></td>
					<!-- <td><?= $value->ip_range;?></td> -->
					<!-- <td><?= $value->subnet;?></td> -->
					<!-- <td><?= $value->total_ips;?></td> -->
					<td><?= $value->area; ?></td>
					<!-- <td><?= $value->vlan_name; ?></td> -->
					<!-- <td><?= $value->vlan_id; ?></td> -->
					<td><?= $value->pkg; ?></td>
					<!-- <td><?= $value->bandwidth; ?></td> -->
					<!-- <td><?= $this->Model_Corp_VLAN->show_pops(null,$value->prim_pop)->row()->pop_name; ?></td> -->
					<!-- <td><?= $this->Model_Corp_VLAN->show_pops(null,$value->sec_pop)->row()->pop_name; ?></td> -->
					<td><?= $value->last_update; ?></td>
					<td><?= $value->last_update_by; ?></td>
					<td>
						<div class="btn-group">
							<a class="btn waves-effect waves-light btn-xs btn-success" href="<?= base_url();?>corporate_vlan/view_cir/<?= $value->id;?>"><i class="fa fa-eye"></i></a>
							<?php if(access_crud('vlan corporate','update')){?>
								<button class="btn waves-effect waves-light btn-xs btn-info" onclick="get_update_content('<?= $value->ip_address;?>')"><i class="fa fa-edit"></i></button>
							<?php } if(access_crud('vlan corporate','delete')){?>
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
	public function get_vlan_id(){
		if(isLoggedIn()){
			$data = $this->Model_Corp_VLAN->show_vlan_ID();
			$deletemodal="$('#deleteModel').modal('show');document.getElementById('userip').value=";
			foreach ($data->result() as $key => $value) {
				?>
				<tr>
					<td><?php echo $key+1;?></td>					
					<td><?= $value->id_num;?></td>
					<td><?= $value->name;?></td>
					<td><?= $value->location; ?></td>
					<!-- <td><?= $value->email; ?></td> -->
					<!-- <td><?= $value->poc; ?></td> -->
					<!-- <td><?= $value->vlan_id; ?></td> -->
					<td><?= $value->pkg; ?></td>
					<!-- <td><?= $this->Model_Corp_VLAN->show_pops(null,$value->prim_pop)->row()->pop_name; ?></td> -->
					<!-- <td><?= $this->Model_Corp_VLAN->show_pops(null,$value->sec_pop)->row()->pop_name; ?></td> -->
					<td>
						<div class="btn-group">
							<a class="btn waves-effect waves-light btn-xs btn-success" href="<?= base_url();?>corporate_vlan/view_id/<?= $value->serial;?>"><i class="fa fa-eye"></i></a>
							<?php if(access_crud('vlan corporate','update')){?>
								<button class="btn waves-effect waves-light btn-xs btn-info updateIDptopser" data-form="update_formID" data-func="update_ID" data-id="<?= $value->serial;?>" data-tab="id"><i class="fa fa-edit"></i></button>
							<?php } if(access_crud('vlan corporate','delete')){?>
								<button class="btn waves-effect waves-light btn-xs btn-danger deletevlanid" data-id="<?php echo $value->serial;?>"><i class="fa fa-trash"></i></button>
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
	public function get_vlan_p2p(){
		if(isLoggedIn()){
			$data = $this->Model_Corp_VLAN->show_vlan_P2P();
			$deletemodal="$('#deleteModel').modal('show');document.getElementById('userip').value=";
			foreach ($data->result() as $key => $value) {
				?>
				<tr>
					<td><?php echo $key+1;?></td>
					<td><?= $value->corp_name;?></td>
					<td><?= $value->sub_corp;?></td>
					<td><?= $value->location; ?></td>
					<!-- <td><?= $value->email; ?></td> -->
					<!-- <td><?= $value->poc; ?></td> -->
					<td><?= $value->vlan_id; ?></td>
					<td><?= $value->pkg; ?></td>
					<!-- <td><?= $value->prim_pop; ?></td> -->
					<!-- <td><?= $value->sec_pop; ?></td> -->
					<td>
						<div class="btn-group">
							<a class="btn waves-effect waves-light btn-xs btn-success" href="<?= base_url();?>corporate_vlan/view_p2p/<?= $value->serial;?>"><i class="fa fa-eye"></i></a>
							<?php if(access_crud('vlan corporate','update')){?>
								<button class="btn waves-effect waves-light btn-xs btn-info updateIDptopser" data-form="update_formP2P" data-func="update_P2P" data-id="<?= $value->serial;?>" data-tab="p2p"><i class="fa fa-edit"></i></button>
							<?php } if(access_crud('vlan corporate','delete')){?>
								<button class="btn waves-effect waves-light btn-xs btn-danger deletevlanp2p" data-id="<?php echo $value->serial;?>"><i class="fa fa-trash"></i></button>
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
	public function get_vlan_service(){
		if(isLoggedIn()){
			$data = $this->Model_Corp_VLAN->show_vlan_service();
			$deletemodal="$('#deleteModel').modal('show');document.getElementById('userip').value=";
			foreach ($data->result() as $key => $value) {
				?>
				<tr>
					<td><?php echo $key+1;?></td>
					<td><?= $value->corp_name;?></td>
					<td><?= $value->sub_corp;?></td>
					<td><?= $value->location; ?></td>
					<!-- <td><?= $value->email; ?></td> -->
					<!-- <td><?= $value->poc; ?></td> -->
					<td><?= $value->vlan_id; ?></td>
					<td><?= $value->service; ?></td>
					<!-- <td><?= $value->prim_pop; ?></td> -->
					<!-- <td><?= $value->sec_pop; ?></td> -->
					<td>
						<div class="btn-group">
							<a class="btn waves-effect waves-light btn-xs btn-success" href="<?= base_url();?>corporate_vlan/view_service/<?= $value->serial;?>"><i class="fa fa-eye"></i></a>
							<?php if(access_crud('vlan corporate','update')){?>
								<button class="btn waves-effect waves-light btn-xs btn-info updateIDptopser" data-form="update_formservice" data-func="update_service" data-id="<?= $value->serial;?>" data-tab="service"><i class="fa fa-edit"></i></button>
							<?php } if(access_crud('vlan corporate','delete')){?>
								<button class="btn waves-effect waves-light btn-xs btn-danger deletevlanservice" data-id="<?php echo $value->serial;?>"><i class="fa fa-trash"></i></button>
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
	public function insert_vlan_service(){
		if(isLoggedIn()){
			$corporate = $this->input->post('name');
			$subcorp = $this->input->post('subcorp');
			$location = $this->input->post('location');
			$vlan_id = $this->input->post('vlan_id');
			$pkg = $this->input->post('service');
			$pripop = $this->input->post('pripop');
			$secpop = $this->input->post('secpop');
			$email = $this->input->post('email');
			$poc = $this->input->post('poc');
//
			$this->Model_Corp_VLAN->insert_vlan_service($corporate,$subcorp,$location,$vlan_id,$pkg,$pripop,$secpop,$email,$poc);
			echo 'Success : Successfully Added';
//
		}else{
			redirect(base_url('login'));
		}
	}
//
	public function insert_vlan_p2p(){
		if(isLoggedIn()){
			$corporate = $this->input->post('name');
			$subcorp = $this->input->post('subcorp');
			$location = $this->input->post('location');
			$vlan_id = $this->input->post('vlan_id');
			$pkg = $this->input->post('pkg');
			$pripop = $this->input->post('pripop');
			$secpop = $this->input->post('secpop');
			$email = $this->input->post('email');
			$poc = $this->input->post('poc');
//
			$this->Model_Corp_VLAN->insert_vlan_P2P($corporate,$subcorp,$location,$vlan_id,$pkg,$pripop,$secpop,$email,$poc);
			echo 'Success : Successfully Added';
//
		}else{
			redirect(base_url('login'));
		}
	}
//
	public function insert_vlan_id(){
		if(isLoggedIn()){
			$id = $this->input->post('id_num');
			$corporate = $this->input->post('name');
			$location = $this->input->post('location');
			$vlan_id = $this->input->post('vlan_id');
			$pkg = $this->input->post('pkg');
			$pripop = $this->input->post('pripop');
			$secpop = $this->input->post('secpop');
			$email = $this->input->post('email');
			$poc = $this->input->post('poc');
//
			$this->Model_Corp_VLAN->insert_vlan_ID($id,$corporate,$location,$vlan_id,$pkg,$pripop,$secpop,$email,$poc);
			echo 'Success : Successfully Added';
//
		}else{
			redirect(base_url('login'));
		}
	}
//
	public function insert(){
		if(isLoggedIn()){
			$ip = $this->input->post('ip');
			$subnet = $this->input->post('subnet');
			$corporate = $this->input->post('corporate');
			$area = $this->input->post('area');
			$vlan_name = $this->input->post('vlan_name');
			$vlan_id = $this->input->post('vlan_id');
			$pkg = $this->input->post('pkg');
			$bandwidth = $this->input->post('bandwidth');
			$pripop = $this->input->post('pripop');
			$secpop = $this->input->post('secpop');
			$email = $this->input->post('email');
			$poc = $this->input->post('poc');
//
			$newip = $ip.'/'.$subnet;
//   
			$ipRange = $this->ipRange($newip);

			$data = $this->duplicate_entry_check($ipRange,$vlan_id);
			if($data == '0'){
//
				$ip1_4oct = explode('.', $ipRange[0]); 
				$ip2_4oct = explode('.', $ipRange[1]);
				$diff = ($ip2_4oct[3]  - $ip1_4oct[3]) + 1;
// //
				$this->Model_Corp_VLAN->insert_vlan($ipRange,$subnet,$diff,$corporate,$area,$vlan_name,$vlan_id,$pkg,$bandwidth,$pripop,$secpop,$email,$poc);

				$this->Model_Corp_VLAN->insert_all_ips($ipRange,$vlan_id);
// 
				echo 'Success : Successfully Added';
// 
			}else{
				echo 'Error : '.$data[1].' Already Exist .VLAN ID '.$data[0];
			}
		}else{
			redirect(base_url('login'));
		}

	}
//
	public function ipRange($cidr){
		$range = array();
		$cidr = explode('/', $cidr);
		$range[0] = long2ip((ip2long($cidr[0])) & ((-1 << (32 - (int)$cidr[1]))));
		$range[1] = long2ip((ip2long($range[0])) + pow(2, (32 - (int)$cidr[1])) - 1);
		return $range;
	}
//
	public function duplicate_entry_check($ipRange,$vlan_id){
//   
		$ip1 = $ipRange[0];
		$ip2 = $ipRange[1];
		$eip1 = explode('.', $ip1);
		$eip2 = explode('.', $ip2);
//
		for ($i=$eip1[3]; $i <= $eip2[3] ; $i++) { 
			$ip = $eip1[0].'.'.$eip1[1].'.'.$eip1[2].'.'.$i;
# code...
			$data1 = $this->Model_Corp_VLAN->showIP($ip,NULL,NULL);
			$data2 = $this->Model_Corp_VLAN->showIP(NULL,$vlan_id);
			if($data1->num_rows() > 0 || $data2->num_rows() > 0){
				if($data1->num_rows()>0){
					$retr = array($data1->row()->vlan_id,'IP');
					return $retr;
				}
				if($data2->num_rows()>0){
					$retr = array($data2->row()->vlan_id,'VLAN');
					return $retr;
				}
				break;
			}
		}
//
		return 0;
	}
//
	public function test(){
		$ip = '10.0.120.1/29';
		$data = $this->ipRange($ip);
		var_dump($data);
	}
//
	public function update_form(){
		$ip = $this->input->post('ip');
		$data = $this->Model_Corp_VLAN->get_IP_detail($ip)->row();
		$pops = $this->Model_Corp_VLAN->show_pops();
//
		?>
		<input type="hidden" name="ip" value="<?php echo $ip;?>">

		<div class="modal-body">
			<div class="col-md-12">
				<div class="form-group">
					<label for="exampleFormControlInput1">Corporate Name</label>
					<input type="text" class="form-control" name="corporate" id="exampleFormControlInput1" required="" value="<?= $data->corporate;?>">
				</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Location</label>
							<input type="text" class="form-control" name="area" id="exampleFormControlInput1" required="" value="<?= $data->area;?>">
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">VLAN Name</label>
							<input type="text" class="form-control" name="vlan_name" id="exampleFormControlInput1" required="" value="<?= $data->vlan_name;?>">
						</div>
					</div>

				</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Package</label>
							<input type="text" class="form-control" name="pkg" id="exampleFormControlInput1" required="" value="<?= $data->pkg;?>">
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Bandwidth</label>
							<select class="form-control" name="bandwidth" id="exampleFormControlSelect1" required="">
								<?php if(!empty($data->bandwidth)){?>
									<option value="<?= $data->bandwidth; ?>"><?= $data->bandwidth; ?></option>
								<?php }else{?>
									<option value="">select bandwidth</option>
								<?php }?>
								<option value="TW1">TW1</option>
								<option value="PIE">PIE</option>

							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Primary POP</label>
							<select class="form-control" name="pripop" id="exampleFormControlSelect1" required="">
								<?php if(!empty($data->prim_pop)){?>
									<option value="<?= $data->prim_pop; ?>"><?= $this->Model_Corp_VLAN->show_pops(null,$data->prim_pop)->row()->pop_name; ?></option>
								<?php }else{?>
									<option value="">select pop</option>
								<?php } foreach($pops->result() as $value){?>
									<option value="<?php echo $value->pop_name;?>"><?php echo $value->pop_name;?></option>
								<?php } ?>		
							</select>
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Secondary POP</label>
							<select class="form-control" name="secpop" id="exampleFormControlSelect1" required="">
								<?php if(!empty($data->sec_pop)){?>
									<option value="<?= $data->sec_pop; ?>"><?= $this->Model_Corp_VLAN->show_pops(null,$data->sec_pop)->row()->pop_name; ?></option>
								<?php }else{?>
									<option value="">select pop</option>
								<?php } foreach($pops->result() as $value){?>
									<option value="<?php echo $value->pop_name;?>"><?php echo $value->pop_name;?></option>
								<?php } ?>		
							</select>
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
//
	public function update_vlan()
	{
		$ip = $this->input->post('ip');
		$corporate = $this->input->post('corporate');
		$area = $this->input->post('area');
		$vlan_name = $this->input->post('vlan_name');
		$pkg = $this->input->post('pkg');
		$bandwidth = $this->input->post('bandwidth');
		$pripop = $this->input->post('pripop');
		$secpop = $this->input->post('secpop');
//
		$data = array('corporate' => $corporate,'area' => $area, 'vlan_name' => $vlan_name , 'pkg' => $pkg ,'bandwidth' => $bandwidth , 'prim_pop' => $pripop, 'sec_pop' => $secpop ,'last_update' => date('Y-m-d H:i:s'), 'last_update_by' => $this->session->userdata['username'] );
//
		$this->db->where('ip_address',$ip);
		$this->db->update('nms_corp_vlan',$data);
//
		create_action_log($ip);
//
		echo 'Update Successfully';
	}
//
	public function delete_ip(){
		$ip = $this->input->post('ip');
		$data = $this->Model_Corp_VLAN->get_IP_detail($ip)->row();
//
		$range = explode('-', $data->ip_range);
//
		$this->Model_Corp_VLAN->deleteIP($range);
		echo 'Delete Successfully';
	}
//
	public function delete_vlanid(){
		$ser = $this->input->post('ser');
//
		$this->db->where('serial',$ser);
		$this->db->delete('nms_corp_vlan_id');
		echo 'Delete Successfully';	
//
		create_action_log('id# '.$ser);
	}
//
	public function delete_vlanP2P(){
		$ser = $this->input->post('ser');
//
		$this->db->where('serial',$ser);
		$this->db->delete('nms_corp_vlan_p2p');
		echo 'Delete Successfully';
//
		create_action_log('id# '.$ser);	
	}
				//
	public function delete_vlanService(){
		$ser = $this->input->post('ser');
//
		$this->db->where('serial',$ser);
		$this->db->delete('nms_corp_vlan_service');
		echo 'Delete Successfully';
//
		create_action_log('id# '.$ser);	
	}
	//
	public function update_formID(){
		$ser = $this->input->post('ser');
		$data = $this->Model_Corp_VLAN->show_vlan_ID($ser)->row();
		$prim_pop = $this->Model_Corp_VLAN->show_pops(null,$data->prim_pop)->row()->pop_name;
		$sec_pop = $this->Model_Corp_VLAN->show_pops(null,$data->sec_pop)->row()->pop_name;
		$pops = $this->Model_Corp_VLAN->show_pops();
//
		?>
		<input type="hidden" name="ser" value="<?php echo $data->serial;?>">
		<div class="modal-body">

			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1"> Corporate Name</label>
							<input type="text" class="form-control" name="name" id="exampleFormControlInput1" required="" value="<?= $data->name;?>">
						</div>
					</div>

				</div>
			</div>


			<div class="col-md-12">
				<div class="form-group">
					<label for="exampleFormControlInput1">Location</label>
					<input type="text" class="form-control" name="location" id="exampleFormControlInput1" value="<?= $data->location;?>">
				</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Email</label>
							<input type="email" class="form-control" name="email" id="exampleFormControlInput1" required="" placeholder="fake@gmail.com" value="<?= $data->email;?>">
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">POC</label>
							<input type="text" class="form-control" name="poc" id="exampleFormControlInput1" required="" placeholder="03009999999" value="<?= $data->poc;?>">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">VLAN ID</label>
							<input type="number" min="2" max="4094" class="form-control" name="vlan_id" id="exampleFormControlInput1" required="" value="<?= $data->vlan_id;?>">
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Package</label>
							<input type="text" class="form-control" name="pkg" id="exampleFormControlInput1" required="" value="<?= $data->pkg;?>">
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Primary POP</label>
							<select class="form-control" name="pripop" id="exampleFormControlSelect1" required="">
								<option value="<?= $data->prim_pop;?>"><?= $prim_pop;?></option>
								<?php foreach($pops->result() as $value){?>
									<option value="<?php echo $value->pop_id;?>"><?php echo $value->pop_name;?></option>
								<?php } ?>		
							</select>
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Secondary POP</label>
							<select class="form-control" name="secpop" id="exampleFormControlSelect1" required="">
								<option value="<?= $data->sec_pop;?>"><?= $sec_pop;?></option>
								<?php foreach($pops->result() as $value){?>
									<option value="<?php echo $value->pop_id;?>"><?php echo $value->pop_name;?></option>
								<?php } ?>		
							</select>
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
	public function update_ID(){
		if(isLoggedIn()){
			$id = $this->input->post('ser');
			$corporate = $this->input->post('name');
			$location = $this->input->post('location');
			$vlan_id = $this->input->post('vlan_id');
			$pkg = $this->input->post('pkg');
			$pripop = $this->input->post('pripop');
			$secpop = $this->input->post('secpop');
			$email = $this->input->post('email');
			$poc = $this->input->post('poc');
//
			$data = array('name' => $corporate, 'location' => $location, 'vlan_id' => $vlan_id, 'pkg' => $pkg, 'prim_pop' => $pripop, 'sec_pop' => $secpop, 'email' => $email, 'poc' => $poc ,'last_update' => date('Y-m-d H:i:s'),'last_update_by' => $this->session->userdata('username'));
			//
			$this->db->where('serial',$id);
			$this->db->update('nms_corp_vlan_id',$data);
			echo 'Success : Successfully Updated';
			create_action_log('ser# '.$ser);
//
		}else{
			redirect(base_url('login'));
		}
	}
	//
	public function update_formP2P(){
		$ser = $this->input->post('ser');
		$data = $this->Model_Corp_VLAN->show_vlan_P2P($ser)->row();
		?>
		<input type="hidden" name="ser" value="<?php echo $data->serial;?>">
		<div class="modal-body">

			<div class="col-md-12">
				<div class="row">
					
					<div class="col-md-12 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1"> Sub Corporate</label>
							<input type="text" class="form-control" name="subcorp" id="exampleFormControlInput1" required="" value="<?= $data->sub_corp; ?>">
						</div>
					</div>

				</div>
			</div>


			<div class="col-md-12">
				<div class="form-group">
					<label for="exampleFormControlInput1">Location</label>
					<input type="text" class="form-control" name="location" id="exampleFormControlInput1" value="<?= $data->location;?>">
				</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Email</label>
							<input type="email" class="form-control" name="email" id="exampleFormControlInput1" required="" placeholder="fake@gmail.com" value="<?= $data->email;?>">
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">POC</label>
							<input type="text" class="form-control" name="poc" id="exampleFormControlInput1" required="" placeholder="03009999999" value="<?= $data->poc;?>">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">VLAN ID</label>
							<input type="number" min="2" max="4094" class="form-control" name="vlan_id" id="exampleFormControlInput1" required="" value="<?= $data->vlan_id;?>">
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Package</label>
							<input type="text" class="form-control" name="pkg" id="exampleFormControlInput1" required="" value="<?= $data->pkg;?>">
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Point 1</label>
							<input type="text" class="form-control" name="pripop" id="exampleFormControlInput1" required="" value="<?= $data->prim_pop;?>">
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Point 2</label>
							<input type="text" class="form-control" name="secpop" id="exampleFormControlInput1" required="" value="<?= $data->sec_pop;?>">
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
	//
	public function update_P2P(){
		if(isLoggedIn()){
			$ser = $this->input->post('ser');
			$subcorp = $this->input->post('subcorp');
			$location = $this->input->post('location');
			$vlan_id = $this->input->post('vlan_id');
			$pkg = $this->input->post('pkg');
			$pripop = $this->input->post('pripop');
			$secpop = $this->input->post('secpop');
			$email = $this->input->post('email');
			$poc = $this->input->post('poc');
//
			$data = array('sub_corp' => $subcorp, 'location' => $location, 'vlan_id' => $vlan_id, 'pkg' => $pkg, 'prim_pop' => $pripop, 'sec_pop' => $secpop, 'email' => $email, 'poc' => $poc ,'last_update' => date('Y-m-d H:i:s'),'last_update_by' => $this->session->userdata('username'));
			$this->db->where('serial',$ser);
			$this->db->update('nms_corp_vlan_p2p',$data);
			echo 'Success : Successfully Updated';
			create_action_log('ser# '.$ser);	
//
		}else{
			redirect(base_url('login'));
		}
	}
	//
	public function update_formservice(){
		$ser = $this->input->post('ser');
		$data = $this->Model_Corp_VLAN->show_vlan_service($ser)->row();
		?>
		<input type="hidden" name="ser" value="<?php echo $data->serial;?>">
		<div class="modal-body">

			<div class="col-md-12">
				<div class="row">
					
					<div class="col-md-12 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1"> Sub Corporate</label>
							<input type="text" class="form-control" name="subcorp" id="exampleFormControlInput1" required="" value="<?= $data->sub_corp;?>">
						</div>
					</div>

				</div>
			</div>


			<div class="col-md-12">
				<div class="form-group">
					<label for="exampleFormControlInput1">Location</label>
					<input type="text" class="form-control" name="location" id="exampleFormControlInput1" value="<?= $data->location;?>">
				</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Email</label>
							<input type="email" class="form-control" name="email" id="exampleFormControlInput1" required="" placeholder="fake@gmail.com" value="<?= $data->email;?>">
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">POC</label>
							<input type="text" class="form-control" name="poc" id="exampleFormControlInput1" required="" placeholder="03009999999" value="<?= $data->email;?>">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">VLAN ID</label>
							<input type="number" min="2" max="4094" class="form-control" name="vlan_id" id="exampleFormControlInput1" required="" value="<?= $data->vlan_id;?>">
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Service</label>
							<input type="text" class="form-control" name="service" id="exampleFormControlInput1" required="" value="<?= $data->service;?>">
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Point 1</label>
							<input type="text" class="form-control" name="pripop" id="exampleFormControlInput1" required="" value="<?= $data->prim_pop;?>">
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Point 2</label>
							<input type="text" class="form-control" name="secpop" id="exampleFormControlInput1" required="" value="<?= $data->sec_pop;?>">
						</div>
					</div>
				</div>
			</div>
			
			
		</div>
		<div class="modal-footer">
			<button class="btn btn-secondary" type="submit">Add</button>
		</div>
		<?php
	}
	//
	public function update_service(){
		if(isLoggedIn()){
			$ser = $this->input->post('ser');
			$subcorp = $this->input->post('subcorp');
			$location = $this->input->post('location');
			$vlan_id = $this->input->post('vlan_id');
			$pkg = $this->input->post('service');
			$pripop = $this->input->post('pripop');
			$secpop = $this->input->post('secpop');
			$email = $this->input->post('email');
			$poc = $this->input->post('poc');
//
			$data = array('sub_corp' => $subcorp, 'location' => $location, 'vlan_id' => $vlan_id, 'prim_pop' => $pripop, 'sec_pop' => $secpop, 'email' => $email, 'poc' => $poc ,'last_update' => date('Y-m-d H:i:s'),'last_update_by' => $this->session->userdata('username') );
			$this->db->where('serial',$ser);
			$this->db->update('nms_corp_vlan_service',$data);
			echo 'Success : Successfully Updated';
			create_action_log('ser# '.$ser);	
//
		}else{
			redirect(base_url('login'));
		}
	}

}
