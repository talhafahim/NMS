<?php $this->load->view('header'); ?>
<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/libs/select2/dist/css/select2.min.css">
<style type="text/css">
	.select2{
		width: 100% !important;
	}
	.select2-selection__choice{
		background-color: #2962ff !important;
	}
</style>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
	<!-- ============================================================== -->
	<?php include('nav.php');?>
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- Page wrapper  -->
	<!-- ============================================================== -->
	<div class="page-wrapper">
		<!-- ============================================================== -->
		<!-- Bread crumb and right sidebar toggle -->
		<!-- ============================================================== -->
		<div class="page-breadcrumb">
			<div class="row">
				<div class="col-5 align-self-center">
					<h4 class="page-title">POP Details</h4>
                <!-- <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Library</li>
                        </ol>
                    </nav>
                </div> -->
            </div>
            
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
    	<!-- ============================================================== -->
    	<!-- Start Page Content -->
    	<!-- ============================================================== -->
    	<div class="row">
    		<div class="col-md-12 ">
    			<div class="card">
    				<div class="card-body">
    					<center><h3><?= strtoupper($data->pop_name);?></h3></center>
    				</div>
    			</div>
    		</div>
    		<div class="col-12">
    			<div class="card">
    				<div class="card-body">
    					<ul class="nav nav-tabs" id="myTab" role="tablist">
    						<li class="nav-item"> <a class="nav-link active" id="cir" data-toggle="tab" href="#tab1" role="tab" aria-controls="home5" aria-expanded="true"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Location Detail</span></a> </li>
    						<?php if (in_array("electric equipment", access_subCat() )){ ?>
    							<li class="nav-item"> <a class="nav-link" id="id" data-toggle="tab" href="#tab2" role="tab" aria-controls="profile"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Electric Equipment</span></a></li>
    						<?php } if (in_array("network equipment", access_subCat() )){ ?>
    							<li class="nav-item"> <a class="nav-link" id="p2p" data-toggle="tab" href="#tab3" role="tab" aria-controls="profile"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Network Equipment</span></a></li>
    						<?php } if (in_array("responsible person", access_subCat() )){ ?>
    							<li class="nav-item"> <a class="nav-link" id="service" data-toggle="tab" href="#tab4" role="tab" aria-controls="profile"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Responsible Persons</span></a></li>
    						<?php } ?>

    					</ul>
    					<div class="tab-content tabcontent-border p-20" id="myTabContent">
    						<div role="tabpanel" class="tab-pane fade show active" id="tab1" aria-labelledby="home-tab">
    							<!-- location -->
    							<div class="row">
    								<div class="col-md-3 col-xs-3">
    									<div class="card">
    										<div class="card-body">
    											<ul class="list-group">
    												<li class="list-group-item"><b>POP Name</b></li>
    												<li class="list-group-item"><b>Location</b></li>
    												<li class="list-group-item"><b>K-Electric Bill#</b></li>
    												<li class="list-group-item"><b>LA#</b></li>
    												<li class="list-group-item"><b>Sub Meter</b></li>
    												<li class="list-group-item"><b>Longitude</b></li>
    												<li class="list-group-item"><b>Latitude</b></li>
    												<li class="list-group-item"><b>City</b></li>
    												<li class="list-group-item"><b>Last visit</b></li>
    											</ul>
    										</div>
    									</div>
    								</div>
    								<div class="col-md-9 col-xs-9">
    									<div class="card">
    										<div class="card-body">
    											<ul class="list-group">
    												<li class="list-group-item"><?= $data->pop_name;?></li>
    												<li class="list-group-item"><?= $data->location;?></li>
    												<li class="list-group-item"><?= $data->k_electric_bill;?></li>
    												<li class="list-group-item"><?= $data->la_no;?></li>
    												<li class="list-group-item">
    													<?php if($data->sub_meter == 'yes'){ 
    														$color = '#55e455';$class = 'fa-check-circle';
    													}else{
    														$color='#bcbfbc';$class = 'fa-circle';
    													};?> 
    													<i class="fas <?= $class;?>" style="color: <?= $color;?>"></i>
    												</li>
    												<li class="list-group-item"><?= $data->longitude?></li>
    												<li class="list-group-item"><?= $data->latitude;?></li>
    												<li class="list-group-item"><?= $city['city_name'];?></li>
    												<li class="list-group-item"><?= $last_checkin['date'].'  '.$last_checkin['time'].' | '.$last_checkin['username'];?></li>
    											</ul>
    										</div>
    									</div>
    								</div>
    								<?php if(in_array($this->session->userdata('id'), $person)){ ?>
    									<div class="col-md-12 ">
    										<div class="card">
    											<div class="card-body">
    												<button class="btn btn-lg btn-success lastcheckin"><i class="fas fa-clock"></i>  Check In</button>
    											</div>
    										</div>
    									</div>
    								<?php } ?>

    								
    								<div class="col-md-12 ">
    									<div class="card">
    										<div class="card-body">
    											<h4>Map</h4>
    											<?php $cord = $data->longitude.','.$data->latitude;?>
    											<iframe style="width: 100%;height: 500px;" src = "https://maps.google.com/maps?q=<?= $cord;?>&hl=es;z=14&amp;output=embed"></iframe> 
    											<button class="btn btn-info" onclick="getLocation()"><i class="fas fa-map-marker-alt"></i> Update Current POP Location</button>

    											<!-- <p id="demo"></p> -->
    											<script>
    												var x = document.getElementById("demo");

    												function getLocation() {
    													if (navigator.geolocation) {
    														navigator.geolocation.getCurrentPosition(showPosition);
    													} else { 
    														x.innerHTML = "Geolocation is not supported by this browser.";
    													}
    												}

    												function showPosition(position) {
    													// x.innerHTML = "Latitude: " + position.coords.latitude + 
    													// "<br>Longitude: " + position.coords.longitude;
    													update_location(position.coords.latitude,position.coords.longitude);
    												}
    											</script>
    										</div>
    									</div>
    								</div>
    							</div>
    							<!-- location end  -->
    						</div>
    						<?php if (in_array("electric equipment", access_subCat() )){ ?>
    							<div role="tabpanel" class="tab-pane fade show" id="tab2" aria-labelledby="home-tab">
    								<!-- electric -->
    								<form id="electUpdform">

    									<input type="hidden" name="popid" value="<?= $data->pop_id;?>">
    									<div style="overflow-x: auto">
    										<table class="table table-bordered table-fixed" id="electEqu">
    											<thead>
    												<tr>
    													<td colspan="5"><h4>ELECTRIC EQUIPMENT</h4></td>
    												</tr>
    												<tr>
    													<th>Equipment Name</th>
    													<th>Brand</th>
    													<th>Power</th>
    													<th>Purchasing Date</th>
    													<th>
    														<div class="btn-group" style="float: right;">
    															<button type="button" class="btn btn-info btn-sm addElecEqui"><i class="fa fa-plus"></i></button>
    															<button type="button" class="btn btn-danger btn-sm deleteElecEqui"><i class="fa fa-minus"></i></button>
    														</div>
    													</th>
    												</tr>
    											</thead>
    											<tbody id="tbodyElecEqui">
    												<?php  foreach ($electric->result() as $key => $value) { ?>
    													<tr id="elec<?= $value->equ_id;?>">
    														<td>
    															<select class="form-control" name="equi[]" required="">	
    																<option value="<?= $value->name;?>"><?= $value->name;?></option>
    																<option value="">select equipment</option>
    																<option value="UPS">UPS</option>
    																<option value="Generator">Generator</option>
    																<option value="Battery">Battery</option>
    																<option value="AC">AC</option>
    															</select>
    														</td>
    														<td><input type="text" name="brand[]" class="form-control" placeholder="brand" required="" value="<?= $value->brand;?>"></td>
    														<td><input type="text" name="power[]" class="form-control" placeholder="power" required="" value="<?= $value->power;?>"></td>
    														<td><input type="date" name="purchdate[]" class="form-control" placeholder="date" required="" value="<?= $value->purchasing_date;?>"></td>
    														<td><button type="button" class="btn btn-danger btn-sm deleteEqui" data-id="<?= $value->equ_id;?>"><i class="fa fa-minus"></i></button></td>
    													</tr>
    												<?php } if($electric->num_rows() <= 0 ){?>
    													<tr>
    														<td>
    															<select class="form-control" name="equi[]" required="">
    																<option value="">select equipment</option>
    																<option value="UPS">UPS</option>
    																<option value="Generator">Generator</option>
    																<option value="Battery">Battery</option>
    																<option value="AC">AC</option>
    															</select>
    														</td>
    														<td><input type="text" name="brand[]" class="form-control" placeholder="brand" required=""></td>
    														<td><input type="text" name="power[]" class="form-control" placeholder="power" required=""></td>
    														<td><input type="date" name="purchdate[]" class="form-control" placeholder="quantity" required=""></td>
    														<td><button type="button" class="btn btn-danger btn-sm" disabled=""><i class="fa fa-minus"></i></button></td>
    													</tr>
    												<?php } ?>
    											</tbody>
    										</table>
    									</div>
    									<?php if(access_crud('electric equipment','update')){ ?>
    										<button type="submit" class="btn btn-secondary" style="float: right;">Update</button>
    									<?php } ?>
    								</form>
    								<!-- electric end -->
    							</div>
    						<?php } if (in_array("network equipment", access_subCat() )){ ?>
    							<div role="tabpanel" class="tab-pane fade show" id="tab3" aria-labelledby="home-tab">
    								<!--  -->
    								<form id="networkUpdform">

    									<input type="hidden" name="popid" value="<?= $data->pop_id;?>">
    									<div style="overflow-x: auto">
    										<table class="table table-bordered table-fixed" id="networkEqu">
    											<thead>
    												<tr>
    													<td colspan="5"><h4>NETWORK EQUIPMENT</h4></td>
    												</tr>
    												<tr>
    													<th>Equipment Name</th>
    													<th>Brand</th>
    													<th>Detail</th>
    													<th>QTY</th>
    													<th>
    														<div class="btn-group" style="float: right;">
    															<button type="button" class="btn btn-info btn-sm addNetEqui"><i class="fa fa-plus"></i></button>
    															<button type="button" class="btn btn-danger btn-sm deleteNetEqui"><i class="fa fa-minus"></i></button>
    														</div>
    													</th>
    												</tr>
    											</thead>
    											<tbody id="tbodyNetEqui">
    												<?php  foreach ($network->result() as $key => $value) {
    													?>
    													<tr id="equi<?= $value->equ_id;?>" >
    														<td>
    															<select class="form-control" name="equi[]" required="">
    																<option value="<?= $value->name;?>"><?= $value->name;?></option>
    																<option value="Switch">Switch</option>
    																<option value="Router">Router</option>
    																<option value="Camera">Camera</option>
    																<option value="IP Phone">IP Phones</option>
    																<option value="Backup Drivers">Backup Drivers</option>
    																<option value="GPON OLT">GPON OLT</option>
    															</select>
    														</td>
    														<td><input type="text" name="brand[]" class="form-control" placeholder="brand" required="" value="<?= $value->brand;?>"></td>
    														<td><input type="text" name="detail[]" class="form-control" placeholder="detail" required="" value="<?= $value->detail;?>"></td>
    														<td><input type="number" name="qty[]" class="form-control" placeholder="quantity" required="" value="<?= $value->qty;?>"></td>
    														<td><button type="button" class="btn btn-danger btn-sm deleteEqui" data-id="<?= $value->equ_id;?>"><i class="fa fa-minus"></i></button></td>
    													</tr>
    													<?php
    												} if($network->num_rows() <= 0 ){?>
    													<tr>
    														<td>
    															<select class="form-control" name="equi[]" required="">
    																<option value="">select equipment</option>
    																<option value="Switch">Switch</option>
    																<option value="Router">Router</option>
    																<option value="Camera">Camera</option>
    																<option value="IP Phone">IP Phones</option>
    																<option value="Backup Drivers">Backup Drivers</option>
    																<option value="GPON OLT">GPON OLT</option>
    															</select>
    														</td>
    														<td><input type="text" name="brand[]" class="form-control" placeholder="brand" required=""></td>
    														<td><input type="text" name="detail[]" class="form-control" placeholder="detail" required=""></td>
    														<td><input type="number" name="qty[]" class="form-control" placeholder="quantity" required=""></td>
    														<td><button type="button" class="btn btn-danger btn-sm" disabled=""><i class="fa fa-minus"></i></button></td>
    													</tr>
    												<?php } ?>
    											</tbody>

    										</table>
    									</div>
    									<?php if(access_crud('network equipment','update')){ ?>
    										<button type="submit" class="btn btn-secondary" style="float: right;">Update</button>
    									<?php } ?>
    								</form>

    								<!--  -->
    							</div>
    						<?php } if (in_array("responsible person", access_subCat() )){ ?>
    							<div role="tabpanel" class="tab-pane fade show" id="tab4" aria-labelledby="home-tab">
    								<!--  -->
    								<div class="row">
    									<div class="col-md-12">
    										<div style="overflow-x: auto">
    											<form id="formRespPerson">
    												<input type="hidden" name="popid" value="<?= $data->pop_id;?>">
    												<table class="table table-bordered table-fixed" id="respPerson">
    													<thead>
    														<tr>
    															<td colspan="3"><h4>RESPONSIBLE PERSONS</h4></td>
    														</tr>
    														<?php  if ($status == 'admin'){ ?>
    															<tr><td colspan="3">
    																<label>Select Username</label>
    																<select class="form-control select2" multiple="multiple" name="resp_person[]" id="resp_person">
    																	<?php foreach ($user->result() as $key => $value) { 

    																		if(in_array($value->id, $person)){
    																			$select='selected';
    																		}else{
    																			$select=null;
    																		}
    																		?>
    																		<option value="<?= $value->id;?>" <?= $select;?> ><?= $value->username;?></option>
    																	<?php } ?>

    																</select>
    															</td>
    														</tr>
    													<?php }  ?>
    													<tr>
    														<th>Name</th>
    														<th>Email</th>
    														<th>Address</th>
    													</tr>
    												</thead>
    												<tbody>

    												</tbody>
    											</table>
    										</form>
    									</div>
    								</div>
    								<!--  -->
    							</div>

    						</div>
    					<?php } ?>
    				</div>
    			</div>
    		</div>



    	</div>
    	<!-- ============================================================== -->
    	<!-- End PAge Content -->
    	<!-- ============================================================== -->
    	<!-- ============================================================== -->
    	<!-- Right sidebar -->
    	<!-- ============================================================== -->
    	<!-- .right-sidebar -->
    	<!-- ============================================================== -->
    	<!-- End Right sidebar -->
    	<!-- ============================================================== -->
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<?php $this->load->view('footer');?>
<script src="<?php echo base_url();?>assets/libs/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>assets/libs/select2/dist/js/select2.min.js"></script>
<script src="<?php echo base_url();?>dist/js/pages/forms/select2/select2.init.js"></script>
<!--  -->
<script type="text/javascript">
	$(document).ready(function(){
		get_person_info(<?= $data->pop_id;?>);
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.checkbox').on('change', function(){
			var clas = $(this).attr('data-class');
			if ($($(this)).prop('checked')) {
				$('.'+clas).attr('readonly',false);
			}else{
				$('.'+clas).attr('readonly',true);
				$('.'+clas).val('');
			}
		});
	});

</script>
<script type="text/javascript">
	$('#resp_person').on("change",function(){
		$.ajax({
			type: "POST",
			url: '<?php echo base_url();?>pop/update_pop_resp_person',
			data:$("#formRespPerson").serialize(),
			success: function (data) {
               // snack('#59b35a',data,'check-square-o');
               get_person_info(<?= $data->pop_id;?>);
           },
           error: function(jqXHR, text, error){
// Displaying if there are any errors
}
});
	});
</script>
<script type="text/javascript">
	function get_person_info(val){
		var loader = `<tr><td colspan="3" class="text-center"><img src="<?php echo base_url();?>assets/img/loading.gif" alt="loading..."></td></tr>`;
		$("#respPerson tbody").html(loader);
		$.ajax({
			type: "POST",
			url: '<?php echo base_url();?>pop/resp_person_detail',
			data:'popid='+val,
			success: function (data) {
				$("#respPerson tbody").html(data);
			},
			error: function(jqXHR, text, error){
// Displaying if there are any errors
}
});
	}
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#electUpdform").submit(function() {
			$.ajax({
				type: "POST",
				url: '<?php echo base_url();?>pop/update_pop_electric_equ',
				data:$("#electUpdform").serialize(),
				success: function (data) {
					snack('#59b35a',data,'check-square-o');
				},
				error: function(jqXHR, text, error){
// Displaying if there are any errors

}
});
			return false;
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#networkUpdform").submit(function() {
			$.ajax({
				type: "POST",
				url: '<?php echo base_url();?>pop/update_pop_network_equ',
				data:$("#networkUpdform").serialize(),
				success: function (data) {
					snack('#59b35a',data,'check-square-o');
				},
				error: function(jqXHR, text, error){
// Displaying if there are any errors

}
});
			return false;
		});
	});
</script>
<script type="text/javascript">
	$(".addNetEqui").on('click',function(){
		var markup = "<tr><td><select class='form-control' name='equi[]' required><option value=''>select equipment</option><option value='Switch'>Switch</option><option value='Router'>Router</option><option value='Camera'>Camera</option><option value='IP Phone'>IP Phones</option><option value='Backup Drivers'>Backup Drivers</option><option value='GPON OLT'>GPON OLT</option></select></td><td><input type='text' name='brand[]' class='form-control' placeholder='brand' required></td><td><input type='text' name='detail[]' class='form-control' placeholder='detail' required></td><td><input type='number' name='qty[]' class='form-control' placeholder='quantity' required></td><td><button type='button' class='btn btn-danger btn-sm disabled '><i class='fa fa-minus'></i></button></td></tr>";

		$("#tbodyNetEqui").append(markup);
	});
	$(".deleteNetEqui").on('click',function(){
		$("#tbodyNetEqui tr:last-child").remove();
	});
	$(".deleteEqui").on('click',function(){
		$rowid = $(this).attr('data-id');
		$("#equi"+$rowid).remove();
	});

</script>
<script type="text/javascript">
	$(".addElecEqui").on('click',function(){
		var markup = "<tr><td><select class='form-control' name='equi[]' required=''><option value=''>select equipment</option><option value='UPS'>UPS</option><option value='Generator'>Generator</option><option value='Battery'>Battery</option><option value='AC'>AC</option></select></td><td><input type='text' name='brand[]' class='form-control' placeholder='brand' required=''></td><td><input type='text' name='power[]' class='form-control' placeholder='power' required=''></td><td><input type='date' name='purchdate[]' class='form-control' placeholder='quantity' required=''></td><td><button type='button' class='btn btn-danger btn-sm' disabled=''><i class='fa fa-minus'></i></button></td></tr>";

		$("#tbodyElecEqui").append(markup);
	});
	$(".deleteElecEqui").on('click',function(){
		$("#tbodyElecEqui tr:last-child").remove();
	});
	$(".deleteEqui").on('click',function(){
		$rowid = $(this).attr('data-id');
		$("#elec"+$rowid).remove();
	});

</script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".lastcheckin").on('click',function() {
			$.ajax({
				type: "POST",
				url: '<?php echo base_url();?>pop/last_checkin',
				data:'popid=<?= $data->pop_id;?>',
				success: function (data) {
					snack('#59b35a',data,'check-square-o');
				},
				error: function(jqXHR, text, error){
// Displaying if there are any errors

}
});
			return false;

		});
	});
</script>
<script type="text/javascript">
	// $(document).ready(function() {
	// 	$(".lastcheckin").on('click',function() {
		function update_location(lat,long){
			if(confirm("Do you really want to proceed?")){

			$.ajax({
				type: "POST",
				url: '<?php echo base_url();?>pop/update_pop_location',
				data:'popid=<?php echo $data->pop_id;?>&lat='+lat+'&long='+long,
				success: function (data) {
					snack('#59b35a',data,'check-square-o');
                    setTimeout(function(){ location.reload(); }, 3000);
				},
				error: function(jqXHR, text, error){
// Displaying if there are any errors

}
});
			return false;
		}
}
	// 	});
	// });
</script>