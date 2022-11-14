<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Switches extends CI_Controller {
	//
	public function __construct(){

		parent::__construct();
		//
		$this->load->model('Model_Switch');
		$this->load->model('Model_Corp_VLAN');
		$this->load->model('Model_Ping');
		$this->load->model('Model_City');
	}
	public function index()
	{
		if(isLoggedIn() && in_array("switch", access_subCat()) )  {
			$data['pops'] = $this->Model_Corp_VLAN->show_pops();
			$data['cities'] = $this->Model_City->show_all_cities();
			$data['city_model'] = $this->load->model('Model_City');
			$data['dealer'] = $this->Model_Switch->dealer_info('logon');
			$this->load->view('switch',$data);
		}else {
			redirect(base_url('login'));
		}
		
	}
	//
	public function view()
	{
		if(isLoggedIn() && in_array("switch", access_cat()) ){
			$switid = $this->uri->segment(3);
			$data['data'] = $this->Model_Switch->show_switches(null,$switid)->row();
			$data['prim_pop'] = $this->Model_Corp_VLAN->show_pops(null,$data['data']->prim_pop)->row()->pop_name;
			$data['sec_pop'] = $this->Model_Corp_VLAN->show_pops(null,$data['data']->sec_pop)->row()->pop_name;
			$data['ping'] = $this->Model_Switch->get_ping($data['data']->ip_address)->row();
			$data['city'] = $this->Model_City->showcitiesById($data['data']->city_id);
			$this->load->view('view_switch',$data);
		}else {
			redirect(base_url('login'));
		}
	}
	//
	public function get_switches(){
		if(isLoggedIn()){
			$data = $this->Model_Switch->show_switches();
			$deletemodal="$('#deleteModel').modal('show');document.getElementById('userip').value=";
			foreach ($data->result() as $key => $value) {
				$city_data = $this->Model_City->showcitiesById($value->city_id);
				?>
				<tr>
					<td><?php echo $key+1;?></td>					
					<td><?= $value->switch_name;?></td>
					<td><?= $value->ip_address;?></td>
					<td><?= $value->dealer;?></td>
					<td><?= $value->area;?></td>
					<!-- <td><?= $value->version;?></td> -->
					<td><?= $value->model; ?></td>
					<td><?= $this->Model_Corp_VLAN->show_pops(null,$value->prim_pop)->row()->pop_name; ?></td>
					<td><?= $this->Model_Corp_VLAN->show_pops(null,$value->sec_pop)->row()->pop_name; ?></td>
					<td><?= $value->vlan; ?></td>
					<td><?= $city_data['city_name'];?></td>
					<?php
					$ping_resp = $this->Model_Switch->get_ping($value->ip_address)->row();
					$loss = $ping_resp->packet_loss;
					$color = ($loss == 0 ? '#28a745' : ($loss == 100 ? '#dc3545' : '#ffc107' ));
					?>
					<td>
						<?php if(!empty($ping_resp)){ ?>
							<i class="fas fa-circle faa-flash animated pop" style="color: <?= $color;?>;font-size: 16px;" data-container="body" data-toggle="popover" data-placement="top" data-content="<?= $ping_resp->ping_response;?>" data-trigger="manual"></i> | <small><?= $ping_resp->packet_loss;?>%</small>
						<?php }else { echo 'no ping';}?>

					</td>
					<td><?= $value->last_update; ?></td>
					<td><?= $value->last_update_by; ?></td>
					<td>
						<div class="btn-group">
							<a class="btn waves-effect waves-light btn-xs btn-success" href="<?= base_url();?>switches/view/<?= $value->swit_id;?>"><i class="fa fa-eye"></i></a>
							<?php if(access_crud('switch','update')){?>
								<button class="btn waves-effect waves-light btn-xs btn-info" onclick="get_update_content('<?= $value->ip_address;?>')"><i class="fa fa-edit"></i></button>
							<?php } if(access_crud('switch','delete')){?>
								<button class="btn waves-effect waves-light btn-xs btn-danger delete-swi" swi-id="<?= $value->swit_id;?>"><i class="fa fa-trash"></i></button>
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
	public function insert_switch(){
		if(isLoggedIn()){
			$error = null;
			$switch = $this->input->post('switchname');
			$ip = $this->input->post('ip');
			$dealer = $this->input->post('dealer');
			$area = $this->input->post('area');
			$version = $this->input->post('version');
			$model = $this->input->post('model');
			$pripop = $this->input->post('pripop');
			$secpop = $this->input->post('secpop');
			$vlan = $this->input->post('vlan');
			$connect_to = $this->input->post('connect_to');
			$stack = $this->input->post('stack');
			$ether = $this->input->post('ether');
			$city_id = $this->input->post('city_name');
				//
			$countIP = $this->Model_Switch->show_switches($ip);
			if($countIP->num_rows() > 0 ){
				$error = 'Error : IP already exist';
			}
			$iparray = explode('.', $ip);
			$vlanmath = ($vlan-210)+50;
        		//
			if($vlan == 210){
				if($iparray[2] == 50){
					$error = 'Error : Segment IP doesn`nt match';
				}
			}
			if($vlan == 2){
				if($iparray[2] != 50){
					$error = 'Error : Segment IP doesn`nt match';
				}
			}else{
				if($iparray[2] != $vlanmath){
					$error = 'Error : Segment IP doesn`nt match';
				}
			}
			if($iparray[0] != '192' || $iparray[1] != '168'){
				$error = 'Error : IP must start with 192.168';
			}
				//
			if($error == null){
				//
				$this->Model_Switch->insert_switch($switch,$ip,$dealer,$area,$version,$model,$pripop,$secpop,$vlan,$connect_to,$stack,$ether,$city_id);
				echo 'Success : Successfully Added';
			}else{
				echo $error;
			}
				//
		}else{
			redirect(base_url('login'));
		}
	}
		//
	public function delete_switch(){
		if(isLoggedIn() && (access_crud('switch','delete')) )  {
			$switid = $this->input->post('switid');
			$this->db->where('swit_id',$switid);
			$this->db->delete('nms_switch');
		//
			echo 'Success : Switch Deleted Successfully';
				//
			create_action_log('id# '.$switid);
		}else {
			redirect(base_url('login'));
		}
	}
		//
	public function update_form(){
		$ip = $this->input->post('ip');
		$data = $this->Model_Switch->show_switches($ip)->row();
		$pops = $this->Model_Corp_VLAN->show_pops();
		$dealer = $this->Model_Switch->dealer_info();
		$cities = $this->Model_City->show_all_cities();
		?>
		<input type="hidden" name="ip" value="<?= $ip;?>">
		<div class="modal-body">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Switch Name</label>
							<input type="text" class="form-control" name="switchname" id="exampleFormControlInput1" required="" value="<?= $data->switch_name;?>">
						</div>
					</div>

				</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Dealer</label>
							<select class="form-control" name="dealer" id="exampleFormControlSelect1" required="">
								<?php if(!empty($data->dealer)){?>
									<option value="<?= $data->dealer; ?>"><?= $data->dealer; ?></option>
								<?php }else{?>
									<option value="">select dealer</option>
								<?php } foreach($dealer->result() as $value){?>
									<option value="<?php echo $value->username;?>"><?php echo $value->username;?></option>
								<?php } ?>

							</select>
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Area</label>
							<input type="text" class="form-control" name="area" id="exampleFormControlInput1" value="<?= $data->area;?>">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Version</label>
							<input type="text" class="form-control" name="version" id="exampleFormControlInput1" required="" value="<?= $data->version;?>">
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Model</label>
							<input type="text" class="form-control" name="model" id="exampleFormControlInput1" value="<?= $data->model;?>">
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
									<option value="<?php echo $value->pop_id;?>"><?php echo $value->pop_name;?></option>
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
									<option value="<?php echo $value->pop_id;?>"><?php echo $value->pop_name;?></option>
								<?php } ?>
								
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6 ">
						<div class="form-group">
							<label for="exampleFormControlInput1">Connected To</label>
							<input type="text" class="form-control" name="connect_to" id="exampleFormControlInput1" required="" value="<?= $data->connected_to;?>">
						</div>
					</div>
					<div class="col-md-6 ">
						<div class="form-group">
							<label for="exampleFormControlInput1">VLAN</label>
							<input type="number" class="form-control" name="vlan" id="exampleFormControlInput1" required="" value="<?= $data->vlan;?>">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12 col-xs-12">
				<div class="form-group">
                  <label for="city_name">Select City</label>
                  <select class="form-control select_group" id="city_name" name="city_name">
                    <?php foreach ($cities as $k => $v): ?>
                      <option value="<?php echo $v['id'] ?>" <?php if($data->city_id == $v['id']) { echo "selected='selected'"; } ?> ><?php echo $v['city_name'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
			</div>
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-4 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Stack Switch</label>
							<input type="hidden" name="stack" value="no">
							<?php if($data->stack_switch == 'yes'){ $check = 'checked';}else{$check = null;};?>
							<input type="checkbox" class="form-control" name="stack" id="exampleFormControlInput1" value="yes" <?= $check;?> > 
						</div>
					</div>
					<div class="col-md-4 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Ether-Channel</label>
							<input type="hidden" name="ether" value="no">
							<?php if($data->ether_channel == 'yes'){ $check = 'checked';}else{$check = null;};?>
							<input type="checkbox" class="form-control" name="ether" id="exampleFormControlInput1" value="yes" <?= $check;?> >
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
	public function update_switch(){
		$switch = $this->input->post('switchname');
		$ip = $this->input->post('ip');
		$dealer = $this->input->post('dealer');
		$area = $this->input->post('area');
		$version = $this->input->post('version');
		$model = $this->input->post('model');
		$pripop = $this->input->post('pripop');
		$secpop = $this->input->post('secpop');
		$vlan = $this->input->post('vlan');
		$connect_to = $this->input->post('connect_to');
		$ether = $this->input->post('ether');
		$stack = $this->input->post('stack');
		$city_id = $this->input->post('city_name');
			//
		$data = array('switch_name' => $switch, 'dealer' => $dealer, 'area' => $area, 'version' => $version, 'model' => $model, 'prim_pop' => $pripop, 'sec_pop' => $secpop, 'vlan' => $vlan, 'last_update' => date('Y-m-d H:i:s') , 'connected_to' => $connect_to , 'last_update_by' => $this->session->userdata['username'],'ether_channel' => $ether , 'stack_switch' => $stack , 'city_id' => $city_id);
		$this->db->where('ip_address',$ip);
		$this->db->update('nms_switch',$data);
			//
		echo 'Success : Update Successfully';
		create_action_log($switch);
	}
	//
	public function free_ips(){
		if(isLoggedIn() && in_array("free ips", access_subCat()) )  {
			$this->load->view('switch_free_ip');
		}else{
			redirect(base_url('login'));
		}
	}
	//
	public function get_free_ip(){
		$this->db->select('ip_address');
		$this->db->from('nms_switch');
		$array = $this->db->get()->result_array();
		$array = array_column($array, "ip_address");
		//
		$sql = "SELECT DISTINCT(SUBSTRING_INDEX(SUBSTRING_INDEX(ip_address,'.',-2),'.',1)) as ips from nms_switch";
		$query = $this->db->query($sql);
		//
		$num = 1;
		foreach ($query->result() as $key => $value) {
			$part3 = $value->ips;
			for ($i=1; $i < 255 ; $i++) { 
				$checkIP = '192.168.'.$part3.'.'.$i;
				if (!in_array($checkIP, $array)){
					// echo $num.'|'.$checkIP.'<br>';
					?>
					<tr>
						<td><?= $num;?></td>
						<td><?= $part3;?></td>
						<td><?= $checkIP;?></td>
					</tr>
					<?php
					$num++;
				}
			}
			
		}
	}
	//
	public function ping_switch(){
		$ip = $this->input->post('ip');
		$res = $this->Model_Ping->pingit($ip,'yes');
		echo $res;
	}
}
