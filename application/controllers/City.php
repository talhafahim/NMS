<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends CI_Controller {
//
//
	public function __construct(){

		parent::__construct();
		$this->load->model('Model_City');
	}
//
	public function index()
	{
        
		if(isLoggedIn()){
            
			$this->load->view('city');
		}else {
           
			redirect(base_url('login'));
		}
	}

    public function cities(){
		$data = $this->Model_City->show_cities();
		foreach ($data->result() as $key => $value) {
			?>
			<tr class="table-row">
				<td><?= $key+1;?></td>
				<td><?= $value->city_name;?></td>

				<td>
					<div class="btn-group">
						<!-- <a class="btn waves-effect waves-light btn-xs btn-success" href="<= base_url();?>pop/view/<= $value->pop_id;?>"><i class="fa fa-eye"></i></a> -->
						<!-- <php if(access_crud('City','update')){ ?> -->
							<button class="btn waves-effect waves-light btn-xs btn-info" onclick="get_update_content('<?= $value->id;?>')"><i class="fa fa-edit"></i></button>
						<!-- <php } if(access_crud('City','delete')){?> -->
							<button class="btn waves-effect waves-light btn-xs btn-danger delete-city" city-id="<?= $value->id?>"><i class="fa fa-trash"></i></button>
						<!-- <php } ?> -->
					</div>
				</td>
			</tr>
			<?php
		}
	}
    // 
    public function add_city(){
        $cityname = $this->input->post('city');
        $city = strtolower($cityname);
        $check = $this->Model_City->show_cities($city);
        if($check->num_rows() <= 0 ){
            $data = array('city_name' => $city);
            $this->db->insert('nms_cities',$data);
            $id = $this->db->insert_id();
            echo 'Success : Added Successfully';
            create_action_log('city# '.$id);
        }else{
            echo 'Error : City Already Exist';
        }
    }

    //
public function update_form(){
	$id = $this->input->post('id');
	$data = $this->Model_City->show_cities(null,$id)->row();
	?>
	<input type="hidden" name="id" value="<?= $data->id;?>">
	<div class="modal-body">
		<div class="col-md-12">
			<center><h3 class="text-uppercase"><?= $data->city_name; ?></h3></center>
			<div class="row">

				<div class="col-md-12 col-xs-12">
					<div class="form-group">
						<label for="exampleFormControlInput1">City Name</label>
						<input type="text" class="form-control" name="city" id="city" required="" value="<?= $data->city_name;?>">
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
    public function update_city(){
        if(isLoggedIn()){
            $id = $this->input->post('id');
            $cityname = $this->input->post('city');
            
            $city = strtolower($cityname);
            $check = $this->Model_City->show_cities($city);
            if($check->num_rows() <= 0 ){
                $data = array('city_name' => $city);
                $this->db->where('id',$id);
                $this->db->update('nms_cities',$data);
            //
                echo 'Sucess : Update Successfully';
                create_action_log('id# '.$id);
            }else{
                echo 'Error : City Already Exist';
            }
            //
        }else{
            redirect(base_url('login'));
        }
    }
    // 
    public function delete_city(){
        if(isLoggedIn())  {
            $id = $this->input->post('id');
            $this->db->where('id',$id);
            $this->db->delete('nms_cities');
        //
            echo 'Success : City Deleted Successfully';
            create_action_log('id# '.$id);
        }else {
            redirect(base_url('login'));
        }
    }
}

?>