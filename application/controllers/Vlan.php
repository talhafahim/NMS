<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vlan extends CI_Controller {
	//
	public function __construct(){

		parent::__construct();
		//
		$this->load->model('Model_VLAN');
		$this->load->model('Model_Switch');
		$this->load->model('Model_NAS');
	}
	public function index()
	{  
		if(isLoggedIn() && in_array("vlan dealer", access_subCat()) )  {
			$data['segment'] = $this->Model_VLAN->show_segment();
			$data['dealer'] = $this->Model_Switch->dealer_info();
			$data['nas'] = $this->Model_NAS->show();
			$this->load->view('vlan_dealer',$data);
		}else {
			redirect(base_url('login'));
		}
	}
	public function test(){
		echo $nasIP = $this->Model_NAS->show(4)->row()->ip_address;
	}
	//
	public function get_vlan(){
		if(isLoggedIn()){
			$data = $this->Model_VLAN->show_all();
			$deletemodal="$('#deleteModel').modal('show');document.getElementById('userip').value=";
			foreach ($data->result() as $key => $value) {
				?>
				<tr>
					<td><?php echo $key+1;?></td>
					<td><?= $value->segment;?></td>
					<td><?= $value->ip_address;?></td>
					<td><?= $value->subnet;?></td>
					<td><?= $value->dealer;?></td>
					<td><?= $value->area; ?></td>
					<td><?= $value->vlan_name; ?></td>
					<td><?= $value->vlan_id; ?></td>
					<td><?= $value->last_update; ?></td>
					<td><?= $value->last_update_by; ?></td>
					<td>
						<div class="btn-group">
							<?php if(access_crud('vlan dealer','update')){?>
								<button class="btn waves-effect waves-light btn-xs btn-info" onclick="get_update_content('<?= $value->ip_address;?>')"><i class="fa fa-edit"></i></button>
							<?php } if(access_crud('vlan dealer','delete')){?>
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
			$segment = $this->input->post('segment');
			$ip = $this->input->post('ip');
			$subnet = $this->input->post('subnet');
			$dealer = $this->input->post('dealer');
			$subdealer = $this->input->post('subdealer');
			$area = $this->input->post('area');
			$vlan_name = $this->input->post('vlan_name');
			$vlan_id = $this->input->post('vlan_id');
			$range = $this->input->post('range');
			$nas = $this->input->post('nas');
			$reseller = $this->input->post('reseller');
            //
			$data = $this->duplicate_entry_check($ip,$subnet,$range,$vlan_id,$segment);
			if($data == '0'){
				$newip = $ip.'/'.$subnet;
				for ($i=0; $i < $range; $i++) {
            //   
					$ipRange = $this->ipRange($newip);
					$nip = $ipRange[0];
                // //
					$nvlan_id = $vlan_id+$i;
                // //
					$this->Model_VLAN->insert_vlan($segment,$nip,$subnet,$dealer,$subdealer,$area,$vlan_name,$nvlan_id,$range);
					$this->Model_VLAN->insert_all_ips($segment,$ipRange,$subnet,$dealer,$subdealer,$area,$vlan_name,$nvlan_id,$range);
                //
					$newip = $ipRange[1];
					$xip = explode('.', $newip);
					$inc = $xip[2]+1;
					$newip = $xip[0].'.'.$xip[1].'.'.$inc.'.'.$xip[3].'/'.$subnet;
					//
					// create_action_log($nip);

					// API to insert in CP Radius VLAN
					$nas = $this->Model_NAS->show($nas)->row();
					$nasIP = $nas->ip_address; $nastype = $nas->type; 
					//
					call_API('https://api.logon.com.pk/vlan/create?dealerid='.$dealer.'&vlanid='.$nvlan_id.'&nas='.$nasIP.'&resellerid='.$reseller.'&nastype='.$nastype);
					//
				}

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
	public function duplicate_entry_check($ip=null,$subnet=null,$range=null,$vlan_id=null,$seg=null){
		$newip = $ip.'/'.$subnet;
		$vlan_id = $vlan_id;
		for ($i=0; $i < $range; $i++) {
            //   
			$ipRange = $this->ipRange($newip);
			$nip = $ipRange[0];
			$nvlan_id = $vlan_id+$i;
                //
			$data1 = $this->Model_VLAN->showIP($nip,NULL,NULL);
			$data2 = $this->Model_VLAN->showIP(NULL,$nvlan_id,$seg);
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
                //
			$newip = $ipRange[1];
			$xip = explode('.', $newip);
			$inc = $xip[2]+1;
			$newip = $xip[0].'.'.$xip[1].'.'.$inc.'.'.$xip[3].'/'.$subnet;
		}
		return '0';
	}
		//
	public function update_form(){
		$ip = $this->input->post('ip');
		$data = $this->Model_VLAN->showIP($ip)->row();
		$dealer = $this->Model_Switch->dealer_info();
			//
		?>
		<input type="hidden" name="ip" value="<?php echo $ip;?>">

		<div class="modal-body">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Area</label>
							<input type="text" class="form-control" name="area" id="exampleFormControlInput1" required="" value="<?= $data->area;?>" >
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Vlan Name</label>
							<input type="text" class="form-control" name="vlan_name" id="exampleFormControlInput1" required="" value="<?= $data->vlan_name;?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Dealer</label>
							<select class="form-control" name="dealer" id="exampleFormControlSelect1" required="">
								<option value="<?= $data->dealer;?>"><?= $data->dealer;?></option>
								<?php foreach($dealer->result() as $value){?>
									<option value="<?php echo $value->username;?>"><?php echo $value->username;?></option>
								<?php } ?>		
							</select>
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Sub Dealer</label>
							<input type="text" class="form-control" name="subdealer" id="exampleFormControlInput1" required="" value="<?= $data->subdealer;?>">
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
		$area = $this->input->post('area');
		$vlan_name = $this->input->post('vlan_name');
		$dealer = $this->input->post('dealer');
		$subdealer = $this->input->post('subdealer');
			//
		$data = array('area' => $area, 'vlan_name' => $vlan_name , 'dealer' => $dealer , 'subdealer' => $subdealer , 'last_update' => date('Y-m-d H:i:s') ,'last_update_by' => $this->session->userdata['username'] );
			//
		$this->db->where('ip_address',$ip);
		$this->db->update('nms_dealer_vlan',$data);
			//
		$data = array('area' => $area, 'vlan_name' => $vlan_name , 'dealer' => $dealer , 'subdealer' => $subdealer);
		$this->db->where('ip_address',$ip);
		$this->db->update('nms_dealer_all_ips',$data);
			//
		create_action_log($ip);
			//
		echo 'Update Successfully';
	}
		//
	public function delete_ip(){
		$ip = $this->input->post('ip');
		$data = $this->Model_VLAN->showIP($ip)->row();
			//
		$newip = $ip.'/'.$data->subnet;
		$ipRange = $this->ipRange($newip);
			//
		$this->Model_VLAN->deleteIP($ipRange);
			//
		create_action_log('ip '.$ip);
		echo 'Delete Successfully';

	}
		//
	public function add_segment(){
		$segment = $this->input->post('segment');
			//
		$check = $this->Model_VLAN->show_segment($segment);
		if($check->num_rows() <= 0 ){
			$data = array('segment' => $segment);
			$this->db->insert('nms_segment',$data);
			//
			echo 'Success : Added Successfully';
			create_action_log($segment);
		}else{
			echo 'Error : Segment Already Exist';
		}
	}
		//
	public function free_vlan(){
		$this->load->view('vlan_dealer_free_vlan');
	}
		//
	public function get_free_vlan(){
		$query = "SELECT `segment` from `nms_dealer_vlan` group by `segment`";
		$get = $this->db->query($query);
		$num=1;
		foreach($get->result() as $value){
				// echo $value->segment;		
			//
			$query2 = $this->Model_VLAN->show_all(NULL,NULL,$value->segment)->result_array();
			$array = array();
			$array = array_column($query2, "vlan_id");
			// var_dump($array);
			//
			
			for ($i=1; $i <= 4094; $i++) {
				if (!in_array($i, $array)){
					?>
					<tr>
						<td><?= $num;?></td>
						<td><?= $value->segment;?></td>
						<td><?= $i;?></td>
					</tr> 
					<?php
					$num++;
				}
			}
		}
	}
}
