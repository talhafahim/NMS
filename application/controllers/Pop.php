<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pop extends CI_Controller {
//
//
	public function __construct(){

		parent::__construct();
	//
		$this->load->model('Model_Corp_VLAN');
		$this->load->model('Model_POP');
		$this->load->model('Model_City');
	}
//
	public function index()
	{
		if(isLoggedIn() && in_array("pop", access_cat()) ){
			$data['cities'] = $this->Model_City->show_all_cities();
			$this->load->view('pop',$data);
		}else {
			redirect(base_url('login'));
		}
	}
//
	public function view()
	{
		if(isLoggedIn() && in_array("pop", access_cat()) ){
			$popid = $this->uri->segment(3);
			$data['data'] = $this->Model_Corp_VLAN->show_pops(null,$popid)->row();
			$data['electric'] = $this->Model_Corp_VLAN->pop_electric_equi($popid);
			$data['network'] = $this->Model_Corp_VLAN->pop_network_equi($popid);
			$data['person'] = $this->Model_POP->responsible_person($popid)->result();
			$data['person'] = array_column($data['person'], 'id');
			$data['user'] = $this->Model_POP->users();
			$data['last_checkin'] = $this->Model_POP->last_checkin($popid)->row_array();
			$data['city'] = $this->Model_City->showcitiesById($data['data']->city_id);
		//
			$this->load->view('view_pop',$data);
		}else {
			redirect(base_url('login'));
		}
	}
//
	public function pops(){
		$cat = $this->input->post('cat');
		$data = $this->Model_Corp_VLAN->show_pops(null,null,$cat);
		foreach ($data->result() as $key => $value) {
			if($value->pop_name != 'FREE'){
			$city_data = $this->Model_City->showcitiesById($value->city_id);
			?>
			<tr class="table-row">
				<td><?= $key+1;?></td>
				<td><?= $value->pop_name;?></td>
				<td><?= $value->location;?></td>
				<td><?= $value->longitude;?></td>
				<td><?= $value->latitude;?></td>
				<td><?= $value->k_electric_bill;?></td>
				<td><?= $value->la_no;?></td>
				<td><?= $city_data['city_name'];?></td>
				<td><?php if($value->sub_meter == 'yes'){ 
					$color = '#55e455';$class = 'fa-check-circle';
				}else{
					$color='#bcbfbc';$class = 'fa-circle';
				};?> 
				<i class="fas <?= $class;?>" style="color: <?= $color;?>"></i>
			</td>
			<td>
				<div class="btn-group">
					<a class="btn waves-effect waves-light btn-xs btn-success" href="<?= base_url();?>pop/view/<?= $value->pop_id;?>"><i class="fa fa-eye"></i></a>
					<?php if(access_crud('pop','update')){ ?>
						<button class="btn waves-effect waves-light btn-xs btn-info" onclick="get_update_content('<?= $value->pop_id;?>')"><i class="fa fa-edit"></i></button>
					<?php } if(access_crud('pop','delete')){?>
						<button class="btn waves-effect waves-light btn-xs btn-danger delete-pop" pop-id="<?= $value->pop_id?>"><i class="fa fa-trash"></i></button>
					<?php } ?>
				</div>
			</td>
		</tr>
		<?php
	}
}
}
	//
public function add_pop(){
	$pop = $this->input->post('pop');
	$location = $this->input->post('location');
	$billno = $this->input->post('billno');
	$lano = $this->input->post('la_no');
	$submeter = $this->input->post('submeter');
	$category = $this->input->post('category');
	$longitude = $this->input->post('longitude');
	$latitude = $this->input->post('latitude');
	$city_id = $this->input->post('city_name');
	//
	$check = $this->Model_Corp_VLAN->show_pops($pop);
	if($check->num_rows() <= 0 ){
		$data = array('pop_name' => $pop, 'location' => $location , 'k_electric_bill' => $billno , 'la_no' => $lano , 'sub_meter' => $submeter , 'longitude' => $longitude , 'latitude' => $latitude,'city_id' => $city_id, 'category' => $category);
		$this->db->insert('nms_pops',$data);
		$id = $this->db->insert_id();
		//
		echo 'Success : Added Successfully';
		create_action_log('popid# '.$id);
	}else{
		echo 'Error : POP Already Exist';
	}
}
//
public function delete_pop(){
	if(isLoggedIn() && (access_crud('pop','delete')) )  {
		$popid = $this->input->post('popid');
		$this->db->where('pop_id',$popid);
		$this->db->delete('nms_pops');
	//
		echo 'Success : POP Deleted Successfully';
		create_action_log('popid# '.$popid);
	}else {
		redirect(base_url('login'));
	}
}
//
public function update_form(){
	$popid = $this->input->post('id');
	$data = $this->Model_Corp_VLAN->show_pops(null,$popid)->row();
	$city_data = $this->Model_City->show_all_cities();
	?>
	<input type="hidden" name="popid" value="<?= $data->pop_id;?>">
	<div class="modal-body">
		<div class="col-md-12">
			<center><h3><?= $data->pop_name; ?></h3></center>
			<div class="row">

				<div class="col-md-12 col-xs-12">
					<div class="form-group">
						<label for="exampleFormControlInput1">Location</label>
						<input type="text" class="form-control" name="location" id="exampleFormControlInput1" required="" value="<?= $data->location;?>">
					</div>
				</div>
				<div class="col-md-6 col-xs-12">
					<div class="form-group">
						<label for="exampleFormControlInput1">Longitude</label>
						<input type="text" class="form-control" name="longitude" id="exampleFormControlInput1" required="" value="<?= $data->longitude;?>">
					</div>
				</div>
				<div class="col-md-6 col-xs-12">
					<div class="form-group">
						<label for="exampleFormControlInput1">Latitude</label>
						<input type="text" class="form-control" name="latitude" id="exampleFormControlInput1" required="" value="<?= $data->latitude;?>">
					</div>
				</div>
				<div class="col-md-4 col-xs-12">
					<div class="form-group">
						<label for="exampleFormControlInput1">K-Electric Bill#</label>
						<input type="text" class="form-control" name="billno" id="exampleFormControlInput1" required="" value="<?= $data->k_electric_bill;?>">
					</div>
				</div>
				<div class="col-md-4 col-xs-12">
					<div class="form-group">
						<label for="exampleFormControlInput1">Consumer No#</label>
						<input type="text" class="form-control" name="la_no" id="exampleFormControlInput1" required="" value="<?= $data->la_no;?>">
					</div>
				</div>
				<div class="col-md-4 col-xs-12">
					<div class="form-group">
						<label for="city_name">City</label>
						<select class="form-control select_group" id="city_name" name="city_name">
							<?php foreach ($city_data as $k => $v): ?>
							<option value="<?php echo $v['id'] ?>" <?php if($data->city_id == $v['id']) { echo "selected='selected'"; } ?> ><?php echo $v['city_name'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
				<div class="col-md-4 col-xs-12">
					<div class="form-group">
						<label for="category">Catgeory</label>
						<select class="form-control select_group" id="category" name="category">
							<option value="main" <?= ($data->category == 'main') ? 'selected' : ''; ?> >Main POP</option>
							<option value="sub" <?= ($data->category == 'sub') ? 'selected' : ''; ?>>Sub POP</option>
							<option value="rental" <?= ($data->category == 'rental') ? 'selected' : ''; ?>>Rental POP</option>
						</select>
					</div>
				</div>
				<div class="col-md-2 col-xs-12">
					<div class="form-group">
						<?php 
						if($data->sub_meter == 'yes'){
							$check = 'checked';
						}else{ $check = null; }
						?>
						<label for="exampleFormControlInput1">Sub Meter</label>
						<input type="hidden" name="submeter" value="no">
						<input type="checkbox" class="form-control" name="submeter" id="exampleFormControlInput1" value="yes" <?= $check;?> >
					</div>
				</div>
				<div class="col-md-12"> 
					<button class="btn btn-secondary" style="float: right;" type="submit">Update</button>
				</div>

			</div>
		</div>
	</div>
	<?php
}
//
public function update_pop(){
	if(isLoggedIn() && access_crud('pop','update') ){
		$popid = $this->input->post('popid');
		$location = $this->input->post('location');
		$billno = $this->input->post('billno');
		$lano = $this->input->post('la_no');
		$submeter = $this->input->post('submeter');
		$category = $this->input->post('category');
		$longitude = $this->input->post('longitude');
		$latitude = $this->input->post('latitude');
		$city_id = $this->input->post('city_name');
	//
		$data = array('location' => $location , 'k_electric_bill' => $billno , 'la_no' => $lano , 'sub_meter' => $submeter , 'longitude' => $longitude , 'latitude' => $latitude, 'city_id' => $city_id, 'category' => $category);
		$this->db->where('pop_id',$popid);
		$this->db->update('nms_pops',$data);
	//
		echo 'Sucess : Update Successfully';
		create_action_log('popid# '.$popid);
		//
	}else{
		redirect(base_url('login'));
	}
}
//
public function update_pop_electric_equ(){
	if(isLoggedIn()){
		$popid = $this->input->post('popid');
	//
		$name = $this->input->post('equi');
		$brand = $this->input->post('brand');
		$power = $this->input->post('power');
		$purchdate = $this->input->post('purchdate');
	//
		$this->db->where('pop_id',$popid);
		$this->db->delete('nms_pop_electric_equiment');
	//
		if(!empty($name)){
			foreach ($name as $key => $value) {
	//
				$data = array('pop_id' => $popid, 'name' => $name[$key], 'brand' => $brand[$key], 'power' => $power[$key], 'purchasing_date' => $purchdate[$key]);
	//
				$this->db->insert('nms_pop_electric_equiment',$data);
			}
		}
		create_action_log('popid# '.$popid);
		echo 'Update Successfully';
	}

}
//
public function update_pop_network_equ(){
	if(isLoggedIn()){
		$popid = $this->input->post('popid');
	//
		$name = $this->input->post('equi');
		$brand = $this->input->post('brand');
		$detail = $this->input->post('detail');
		$qty = $this->input->post('qty');
	//
		$this->db->where('pop_id',$popid);
		$this->db->delete('nms_pop_network_equiment');
	//
		if(!empty($name)){
			foreach ($name as $key => $value) {
	//
				$data = array('pop_id' => $popid, 'name' => $name[$key], 'brand' => $brand[$key], 'detail' => $detail[$key], 'qty' => $qty[$key]);
	//
				$this->db->insert('nms_pop_network_equiment',$data);
			}
		}
		create_action_log('popid# '.$popid);
		echo 'Update Successfully';
	}
}
//
public function update_pop_resp_person(){
	$sess_status = $this->session->userdata('status');
	if($sess_status == 'admin'){
		$popid = $this->input->post('popid');
		$person = $this->input->post('resp_person');
		 //
		$this->db->where('pop_id',$popid);
		$this->db->delete('nms_pop_responsible_person');
		 	//
		if(!empty($person)){
		 	//
			foreach ($person as $value) {
				$data = array('pop_id' => $popid , 'id' => $value);
				$this->db->insert('nms_pop_responsible_person',$data);
			}
		}
		create_action_log('popid# '.$popid);
	}
}
//
public function resp_person_detail(){
	$popid = $this->input->post('popid');
	$data = $this->Model_POP->responsible_person($popid);
	foreach ($data->result() as $value) {
		?>
		<tr>
			<td><?= $value->firstname.' '.$value->lastname;?></td>
			<td><?= $value->email;?></td>
			<td><?= $value->address;?></td>
		</tr> 
		<?php
	}
}
//
public function last_checkin(){
	if(isLoggedIn()){
		$popid = $this->input->post('popid');
		$id = $this->session->userdata('id');
	// //
		$data = array('date' => date('Y-m-d'), 'time' => date('H:i:s'), 'pop_id' => $popid, 'id' => $id );
		$this->db->insert('nms_pop_last_checkin',$data);
	//
		create_action_log('popid# '.$popid);
		echo 'Successfully Checkded In';
	}
}
//
public function epi(){
	if(isLoggedIn()){
		$data['pops'] = $this->Model_Corp_VLAN->show_pops();
		$this->load->view('epi',$data);
	}else{
		redirect(base_url('login'));
	}
}
//
public function epi_list(){
	if(isLoggedIn()){
		$data = $this->Model_POP->epi_list();
		foreach ($data->result() as $key => $value) {
			?>
			<tr>
				<td><?= $key+1;?></td>
				<td><?= $value->shop_name;?></td>
				<td><?= $value->address;?></td>
				<td><?= $value->contact;?></td>
				<td><?= $value->pop_name;?></td>
				<td>
					<?php if(access_crud('epi','delete')){?>
					<button class="btn waves-effect waves-light btn-xs btn-danger delete-pop" pop-id="<?= $value->epi_id;?>"><i class="fa fa-trash"></i></button>
				<?php }?>
				</td>
			</tr>
			<?php
		}
	}
}
//
public function add_epi(){
	if(isLoggedIn()){
		$shopname = $this->input->post('shopname');
		$address = $this->input->post('address');
		$contact = $this->input->post('contact');
		$pop = $this->input->post('pop');
	//
		$data = array('shop_name' => $shopname, 'address' => $address, 'contact' => $contact,'pop_id' => $pop);
		$this->db->insert('nms_electric_pop_inquery',$data);
		$epi_id = $this->db->insert_id();
	//
		echo 'EPI Successfully Added';
		create_action_log('epi_id# '.$epi_id);
	}
}
//
public function delete_epi(){
	$ser = $this->input->post('serial');
	$this->db->where('epi_id',$ser);
	$this->db->delete('nms_electric_pop_inquery');
	//
	create_action_log('epi_id# '.$ser);
	//
	echo 'EPI Successfully Deleted';
}
//
public function update_pop_location(){
	$popid = $this->input->post('popid');
	$lat = $this->input->post('lat');
	$long = $this->input->post('long');
	//
	$data = array('longitude' => $lat,'latitude' => $long);
	$this->db->where('pop_id',$popid);
	$this->db->update('nms_pops',$data);
	// //
	create_action_log('pop_id# '.$popid);
	// //
	echo 'Success : Updated Successfully';
}
//
public function api_get_pop(){
	$data = $this->Model_Corp_VLAN->show_pops()->result();
	echo json_encode($data);
}


}
