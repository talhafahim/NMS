<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nas extends CI_Controller {
//
//
	public function __construct(){

		parent::__construct();
		$this->load->model('Model_NAS');
	}
//
	public function index()
	{

		if(isLoggedIn()){

			$this->load->view('nas');
		}else {

			redirect(base_url('login'));
		}
	}

	public function get_nas(){
		$data = $this->Model_NAS->show();
		foreach ($data->result() as $key => $value) {
			?>
			<tr class="table-row">
				<td><?= $key+1;?></td>
				<td><?= $value->tag;?></td>
				<td><?= $value->ip_address;?></td>
				<td><?= $value->port;?></td>
				<td><?= $value->type;?></td>

				<td>
					<div class="btn-group">
						<!-- <a class="btn waves-effect waves-light btn-xs btn-success" href="<= base_url();?>pop/view/<= $value->pop_id;?>"><i class="fa fa-eye"></i></a> -->
							<!-- <php if(access_crud('City','update')){ ?> -->
								<button class="btn waves-effect waves-light btn-xs btn-info" onclick="get_update_content('<?= $value->id;?>')"><i class="fa fa-edit"></i></button>
								<!-- <php } if(access_crud('City','delete')){?> -->
									<button class="btn waves-effect waves-light btn-xs btn-danger delete-nas" nas-id="<?= $value->id;?>"><i class="fa fa-trash"></i></button>
									<!-- <php } ?> -->
									</div>
								</td>
							</tr>
							<?php
						}
					}
    // 
					public function add_nas(){
						$tag = $this->input->post('tag');
						$ip = $this->input->post('ip');
						$type = $this->input->post('type');
						$port = $this->input->post('port');

						$check = $this->Model_NAS->show(null,$ip);
						if($check->num_rows() <= 0 ){

							$data = array('tag' => $tag, 'ip_address' => $ip, 'type' => $type, 'port' => $port);

							$this->db->insert('nms_nas',$data);
							$id = $this->db->insert_id();
							echo 'Success : Added Successfully';
							create_action_log('nas# '.$id);
						}else{
							echo 'Error : NAS Already Exist';
						}
					}

    //
					public function update_form(){
						$id = $this->input->post('id');
						$data = $this->Model_NAS->show($id)->row();
						?>
						<input type="hidden" name="id" value="<?= $data->id;?>">
						<div class="modal-body">
							<div class="col-md-12">
								<center><h3 class="text-uppercase"><?= $data->tag; ?></h3></center>
								<div class="row">

									<div class="col-md-12">
										<div class="form-group">
											<label for="exampleFormControlInput1">NAS Tag</label>
											<input type="text" class="form-control" name="tag" id="tag" required="" value="<?= $data->tag;?>">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="exampleFormControlInput1">IP Address</label>
											<input type="text" class="form-control" name="ip" id="ip" required="" value="<?= $data->ip_address;?>">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="exampleFormControlInput1">Port</label>
											<input type="text" class="form-control" name="port" id="port" required="" value="<?= $data->port;?>">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="exampleFormControlInput1">Type</label>
											<select class="form-control" id="type" name="type">
												<option value="">select type</option>
												<option <?= ($data->type == 'Juniper') ? 'selected' : '';?> >Juniper</option>
												<option <?= ($data->type == 'Cisco') ? 'selected' : '';?> >Cisco</option>
												<option <?= ($data->type == 'Mikrotik') ? 'selected' : '';?> >Mikrotik</option>

											</select>
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
					public function update_action(){
						if(isLoggedIn()){
							$id = $this->input->post('id');
							$tag = $this->input->post('tag');
							$ip = $this->input->post('ip');
							$type = $this->input->post('type');
							$port = $this->input->post('port');
							//
							$check = $this->Model_NAS->show(null,$ip,$tag);
							if($check->num_rows() > 0 ){
								$data = array('tag' => $tag, 'ip_address' => $ip, 'type' => $type, 'port' => $port);
								$this->db->where('id',$id);
								$this->db->update('nms_nas',$data);
            //
								echo 1;
								create_action_log('id# '.$id);
							}else{
								echo 'Error : Already Exist';
							}
            //
						}else{
							redirect(base_url('login'));
						}
					}
    // 
					public function delete_nas(){
						if(isLoggedIn())  {
							$id = $this->input->post('id');
							$this->db->where('id',$id);
							$this->db->delete('nms_nas');
        //
							echo 'Success : NAS Deleted Successfully';
							create_action_log('id# '.$id);
						}else {
							redirect(base_url('login'));
						}
					}
				}

			?>