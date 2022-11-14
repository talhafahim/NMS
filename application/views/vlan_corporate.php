<?php $this->load->view('header'); ?>
 <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>dist/css/switch_btn.css">
<head>
	<style type="text/css">
		#filterserial select,#filterip select,#filterarea select,#filtervlanname select,#filtervlanid select,#filteraction select,#filteriprange select,#filtersubnet select,#filtertotal select,#filteremail select,#filterpoc select,#filterlastupdate select{
			display: none;
		}
		.id,.p2p,.service{
			display: none;
		}
	</style>
</head>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
	<!-- ============================================================== -->
	<?php $this->load->view('nav');?>
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
					<h4 class="page-title">Corporate VLAN</h4>
					<div class="d-flex align-items-center">
            <!-- <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Library</li>
              </ol>
          </nav> -->
      </div>
  </div>
  <div class="col-7 align-self-center">
  	<div class="d-flex no-block justify-content-end align-items-center">
            <!--  <div class="mr-2">
              <div class="lastmonth"></div>
            </div>
            <div class=""><small>LAST MONTH</small>
            	<h4 class="text-info mb-0 font-medium">$58,256</h4></div> -->
            	<?php if(access_crud('vlan corporate','create')){ ?>
            		<a href="<?= base_url();?>corporate_vlan/free_ips" class="btn btn-success btn-rounded corp-add-btn cir" style="margin-right:10px;color:white;"> Free IPs</a>
            		<button type="button" data-pop="AVLAN_Modal" class="btn btn-secondary btn-rounded corp-add-btn cir"><i class="fas fa-plus"></i> Add New IPT Service</button>
            		<button type="button" data-pop="AVLANID_Modal" class="btn btn-secondary btn-rounded corp-add-btn id"><i class="fas fa-plus"></i> Add New Shared Serice</button>
            		<button type="button" data-pop="AVLANP2P_Modal" class="btn btn-secondary btn-rounded corp-add-btn p2p"><i class="fas fa-plus"></i> Add New P2P Service</button>
            		<button type="button" data-pop="AVLANSER_Modal" class="btn btn-secondary btn-rounded corp-add-btn service"><i class="fas fa-plus"></i> Add New Other Service</button>
            	<?php } ?>
            </div>
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
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item"> <a class="nav-link active" id="cir" data-toggle="tab" href="#tab1" role="tab" aria-controls="home5" aria-expanded="true"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">IPT Services</span></a> </li>
						<li class="nav-item"> <a class="nav-link" id="id" data-toggle="tab" href="#tab2" role="tab" aria-controls="profile"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Shared Services</span></a></li>
						<li class="nav-item"> <a class="nav-link" id="p2p" data-toggle="tab" href="#tab3" role="tab" aria-controls="profile"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">P2P Services</span></a></li>
						<li class="nav-item"> <a class="nav-link" id="service" data-toggle="tab" href="#tab4" role="tab" aria-controls="profile"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Other Services</span></a></li>

					</ul>
					<div class="tab-content tabcontent-border p-20" id="myTabContent">
						<div role="tabpanel" class="tab-pane fade show active" id="tab1" aria-labelledby="home-tab">
							<!--  -->

							<!--  -->
							<div class="table-responsive">
								<table class="table table-striped table-bordered dataTable" id="vlantable_cir" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>#</th>
											<th>Corporate Name</th>
											<th>IP Address</th>
											<!-- <th>IP Range</th> -->
											<!-- <th>Subnet</th> -->
											<!-- <th>Total IPs</th> -->
											<th>Location</th>
											<!-- <th>VLAN Name</th> -->
											<th>VLAN ID</th>
											<th>Package</th>
											<!-- <th>Bandwith</th> -->
											<!-- <th>Primary Pop</th> -->
											<!-- <th>Secondary Pop</th> -->
											<th>Last Update</th>
											<th>Last Update By</th>
											<th>Action</th>
										</tr>
										<tr>
											<td id="filterserial"></td>
											<td id="filtercorporate"></td>
											<td id="filterip"></td>
											<!-- <td id="filteriprange"></td> -->
											<!-- <td id="filtersubnet"></td> -->
											<!-- <td id="filtertotal"></td> -->
											<td id="filterarea"></td>
											<!-- <td id="filtervlanname"></td> -->
											<td id="filtervlanid"></td>
											<td id="filterpkg"></td>
											<!-- <td id="filterbandwith"></td> -->
											<!-- <td id="filterprimpop"></td> -->
											<!-- <td id="filtersecpop"></td> -->
											<td id="filterlastupdate"></td>
											<td id="filterlastupdateby"></td>
											<td id="filteraction"></td>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
						<div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="profile-tab">
							<!--  -->
							<div class="table-responsive">
								<table class="table table-striped table-bordered dataTable" id="vlantable_id" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>#</th>
											<th>ID Number</th>
											<th>Corporate Name</th>
											<th>Location</th>
											<!-- <th>Email</th> -->
											<!-- <th>POC</th> -->
											<!-- <th>VLAN ID</th> -->
											<th>Package</th>
											<!-- <th>Primary Pop</th> -->
											<!-- <th>Secondary Pop</th> -->
											<th>Action</th>
										</tr>
										<tr>
											<td id="filterserial"></td>
											<td id="filteridnum"></td>
											<td id="filtercorporate"></td>
											<td id="filterarea"></td>
											<!-- <td id="filteremail"></td> -->
											<!-- <td id="filterpoc"></td> -->
											<!-- <td id="filtervlanid"></td> -->
											<td id="filterpkg"></td>
											<!-- <td id="filterprimpop"></td> -->
											<!-- <td id="filtersecpop"></td> -->
											<td id="filteraction"></td>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
						<div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="profile-tab">
							<div class="table-responsive">
								<table class="table table-striped table-bordered dataTable" id="vlantable_p2p" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>#</th>
											<th>Corporate Name</th>
											<th>Sub Corporate</th>
											<th>Location</th>
											<!-- <th>Email</th> -->
											<!-- <th>POC</th> -->
											<th>VLAN ID</th>
											<th>Package</th>
											<!-- <th>Point 1</th> -->
											<!-- <th>Point 2</th> -->
											<th>Action</th>
										</tr>
										<tr>
											<td id="filterserial"></td>
											<td id="filtercorporate"></td>
											<td id="filtersubcorp"></td>
											<td id="filterarea"></td>
											<!-- <td id="filteremail"></td> -->
											<!-- <td id="filterpoc"></td> -->
											<td id="filtervlanid"></td>
											<td id="filterpkg"></td>
											<!-- <td id="filterprimpop"></td> -->
											<!-- <td id="filtersecpop"></td> -->
											<td id="filteraction"></td>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
						<div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="profile-tab">
							<div class="table-responsive">
								<table class="table table-striped table-bordered dataTable" id="vlantable_service" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>#</th>
											<th>Corporate Name</th>
											<th>Sub Corporate</th>
											<th>Location</th>
											<!-- <th>Email</th> -->
											<!-- <th>POC</th> -->
											<th>VLAN ID</th>
											<th>Service</th>
											<!-- <th>Point 1</th> -->
											<!-- <th>Point 2</th> -->
											<th>Action</th>
										</tr>
										<tr>
											<td id="filterserial"></td>
											<td id="filtercorporate"></td>
											<td id="filtersubcorp"></td>
											<td id="filterarea"></td>
											<!-- <td id="filteremail"></td> -->
											<!-- <td id="filterpoc"></td> -->
											<td id="filtervlanid"></td>
											<td id="filterservice"></td>
											<!-- <td id="filterprimpop"></td> -->
											<!-- <td id="filtersecpop"></td> -->
											<td id="filteraction"></td>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>

					</div>
					<!-- Modal -->
					<div class="modal fade" id="updateModel" role="dialog">
						<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Update Vlan</h5>
									<button class="close" type="button" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<div id="updatecontent">
									<br>
									<form id="updateuser" class="form-horizontal form-label-left input_mask">
									</form>
								</div>
                    <!--  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div> -->
              </div>
          </div>
      </div>
      <!-- update modal ends -->
       <!-- Modal -->
      <div class="modal fade" id="updateModel2" role="dialog">
      	<div class="modal-dialog">
      		<!-- Modal content-->
      		<div class="modal-content">
      			<div class="modal-header">
      				<h5 class="modal-title" id="exampleModalLabel">Update Vlan</h5>
      				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
      					<span aria-hidden="true">×</span>
      				</button>
      			</div>
      			<div id="updatecontent">
      				<br>
      				<form id="updateuser2" class="form-horizontal form-label-left input_mask">
      				</form>
      			</div>
                    <!--  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div> -->
              </div>
          </div>
      </div>
      <!-- update modal ends -->
      <!-- Modal -->
      <div class="modal fade" id="deleteModel" role="dialog">
      	<div class="modal-dialog">
      		<!-- Modal content-->
      		<div class="modal-content">
      			<div class="modal-header">
      				<h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this?</h5>
      				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
      					<span aria-hidden="true">×</span>
      				</button>
      			</div>
      			<div>
      				<input type="hidden" name="userip" id="userip">
      				<script type="text/javascript">
      					var user=document.getElementById("userip");
      				</script>
      			</div>
      			<div class="modal-footer">
      				<button type="button" onclick="deletethis(user.value);" class="btn btn-danger">Yes</button>
      				<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      			</div>
      		</div>
      	</div>
      </div>
      <!-- delete modal ends -->
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
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<?php
$this->load->view('popup/add_corp_vlan');
$this->load->view('popup/add_corp_vlan_ID');
$this->load->view('popup/add_corp_vlan_P2P');
$this->load->view('popup/add_corp_vlan_service');
$this->load->view('footer');
?>
<script type="text/javascript">
	$('.nav-link').click(function(){
		var id = $(this).attr('id');
		$('.corp-add-btn').hide();
		$('.'+id).show();
        //
        vlan_get_data('vlantable_'+id,'get_vlan_'+id);
//
})
</script>
<script type="text/javascript">
	$(document).ready(function() {
		vlan_get_data('vlantable_cir','get_vlan_cir');
	});
</script>
<script>
	function vlan_get_data(tab,funct) {
    //
    var loader = `<tr><td colspan="14" class="text-center"><img src="<?php echo base_url();?>assets/img/loading.gif" alt="loading..."></td></tr>`;
    $('#'+tab).dataTable().fnDestroy();
    $('#'+tab+' tbody').html(loader);
    $.ajax({
    	type: "POST",
    	url: "<?php echo base_url();?>corporate_vlan/"+funct,
    //for posting multiple variable
    // data:'name='+val+'&age='+age,
    success: function(data){
    // for get return data
    $("#"+tab+" tbody").html(data);
},
complete: function(){
	var table = $('#'+tab).DataTable();
	$("#"+tab+" thead td").each( function ( i ) {
		var select = $('<select class="form-control"><option value="">Show All</option></select>')
		.appendTo( $(this).empty() )
		.on( 'change', function () {
			table.column( i )
			.search( $(this).val() )
			.draw();
		} );
		table.column( i ).data().unique().sort().each( function ( d, j ) {
			select.append( '<option value="'+d+'">'+d+'</option>' )
		} );
	} );
}
});
}
</script>

<script type="text/javascript">
	$('.corp-add-btn').click(function(){
		var popid = $(this).attr('data-pop');
		$('#'+popid).modal('show');
	})
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#vlan_insert_form").submit(function() {
			$('#action_loader').show();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>corporate_vlan/insert",
				data:$("#vlan_insert_form").serialize(),
				success: function (data) {
					if(data.includes("Success")){
						$('#AVLAN_Modal').modal('hide');
						$('#action_loader').hide();
						snack('#59b35a',data,'check-square-o');
						$('#vlan_insert_form').trigger('reset');
						vlan_get_data('vlantable_cir','get_vlan_cir');
					}else{
						$('#action_loader').hide();
						snack('#d3514d',data,'times');
					}
				},
				error: function(jqXHR, text, error){
    // Displaying if there are any errors
    $('#output').html(error);
}
});
			return false;
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#vlanID_insert_form").submit(function() {
			$('#action_loader').show();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>corporate_vlan/insert_vlan_id",
				data:$("#vlanID_insert_form").serialize(),
				success: function (data) {
					if(data.includes("Success")){
						$('#AVLANID_Modal').modal('hide');
						$('#action_loader').hide();
						snack('#59b35a',data,'check-square-o');
						$('#vlanID_insert_form').trigger('reset');
						vlan_get_data('vlantable_id','get_vlan_id');
					}else{
						$('#action_loader').hide();
						snack('#d3514d',data,'times');
					}
				},
				error: function(jqXHR, text, error){
    // Displaying if there are any errors
    $('#output').html(error);
}
});
			return false;
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#vlanService_insert_form").submit(function() {
			$('#action_loader').show();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>corporate_vlan/insert_vlan_service",
				data:$("#vlanService_insert_form").serialize(),
				success: function (data) {
					if(data.includes("Success")){
						$('#AVLANSER_Modal').modal('hide');
						$('#action_loader').hide();
						snack('#59b35a',data,'check-square-o');
						$('#vlanService_insert_form').trigger('reset');
						vlan_get_data('vlantable_service','get_vlan_service');
					}else{
						$('#action_loader').hide();
						snack('#d3514d',data,'times');
					}
				},
				error: function(jqXHR, text, error){
    // Displaying if there are any errors
    $('#output').html(error);
}
});
			return false;
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#vlanP2P_insert_form").submit(function() {
			$('#action_loader').show();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>corporate_vlan/insert_vlan_p2p",
				data:$("#vlanP2P_insert_form").serialize(),
				success: function (data) {
					if(data.includes("Success")){
						$('#AVLANP2P_Modal').modal('hide');
						$('#action_loader').hide();
						snack('#59b35a',data,'check-square-o');
						$('#vlanP2P_insert_form').trigger('reset');
						vlan_get_data('vlantable_p2p','get_vlan_p2p');
					}else{
						$('#action_loader').hide();
						snack('#d3514d',data,'times');
					}
				},
				error: function(jqXHR, text, error){
    // Displaying if there are any errors
    $('#output').html(error);
}
});
			return false;
		});
	});
</script>
<script>
	function get_update_content(val) {
    //
    $.ajax({
    	type: "POST",
    	url: "<?php echo base_url();?>corporate_vlan/update_form",
    	data:'ip='+val,
    	success: function(data){
    		$("#updateuser").html(data);
    		$('#updateModel').modal('show');
    	}
    });
}
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#updateuser").submit(function() {
			$.ajax({
				type: "POST",
				url: '<?php echo base_url();?>corporate_vlan/update_vlan',
				data:$("#updateuser").serialize(),
				success: function (data) {
					snack('#59b35a',data,'check-square-o');
					$('#updateModel').modal('hide');
					vlan_get_data('vlantable_cir','get_vlan_cir');
				},
				error: function(jqXHR, text, error){
    // Displaying if there are any errors
}
});
			return false;
		});
	});
</script>
<script>
	function deletethis(val) {
    //
    $('#action_loader').show();
    $.ajax({
    	type: "POST",
    	url: "<?php echo base_url();?>corporate_vlan/delete_ip",
    	data:'ip='+val,
    	success: function(data){
    		$('#deleteModel').modal('hide');
    		$('#action_loader').hide();
    		vlan_get_data('vlantable_cir','get_vlan_cir');
    		snack('#59b35a',data,'check-square-o');
    	}
    });
}
</script>
<script type="text/javascript">
	$(document).on('click','.deletevlanid',function(){
		$id = $(this).attr('data-id');
		if(confirm('Do you realy want to delete this?')){
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>corporate_vlan/delete_vlanid",
				data:'ser='+$id,
				success: function(data){
					vlan_get_data('vlantable_id','get_vlan_id');
					snack('#59b35a',data,'check-square-o');
				}
			});
		}
	});
</script>
<script type="text/javascript">
	$(document).on('click','.deletevlanp2p',function(){
		$id = $(this).attr('data-id');
		if(confirm('Do you realy want to delete this?')){
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>corporate_vlan/delete_vlanP2P",
				data:'ser='+$id,
				success: function(data){
					vlan_get_data('vlantable_p2p','get_vlan_p2p');
					snack('#59b35a',data,'check-square-o');
				}
			});
		}
	});
</script>
<script type="text/javascript">
	$(document).on('click','.deletevlanservice',function(){
		$id = $(this).attr('data-id');
		if(confirm('Do you realy want to delete this?')){
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>corporate_vlan/delete_vlanService",
				data:'ser='+$id,
				success: function(data){
					vlan_get_data('vlantable_service','get_vlan_service');
					snack('#59b35a',data,'check-square-o');
				}
			});
		}
	});
</script>
<script type="text/javascript">
	$(document).on('click','.updateIDptopser',function(){
		$form = $(this).attr('data-form');
		$func = $(this).attr('data-func');
		$id = $(this).attr('data-id');
		$tab = $(this).attr('data-tab');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url();?>corporate_vlan/"+$form,
			data:'ser='+$id,
			success: function(data){
				$("#updateuser2").html(data);
				$('#updateModel2').modal('show');
				$('#updateuser2').attr('data-func',$func);
				$('#updateuser2').attr('data-tab',$tab);
			}
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#updateuser2").submit(function() {
			$func = $(this).attr('data-func');
			$tab = $(this).attr('data-tab');
			$.ajax({
				type: "POST",
				url: '<?php echo base_url();?>corporate_vlan/'+$func,
				data:$("#updateuser2").serialize(),
				success: function (data) {
					snack('#59b35a',data,'check-square-o');
					$('#updateModel2').modal('hide');
					vlan_get_data('vlantable_'+$tab,'get_vlan_'+$tab);
				},
				error: function(jqXHR, text, error){
    // Displaying if there are any errors
}
});
			return false;
		});
	});
</script>