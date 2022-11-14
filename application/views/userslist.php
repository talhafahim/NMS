<?php $this->load->view('header'); ?>
<head>
	<style type="text/css">
		
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
					<h4 class="page-title">Users</h4>
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
                            	<button type="button" onclick="$('#addnewModel').modal('show');" class="btn btn-secondary btn-rounded"><i class="fas fa-user-plus"></i> Add New User</button>
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

                					<div class="table-responsive">
                						<table class="table table-striped table-bordered dataTable" id="table1">
                							<thead>
                								<tr>
                									<th>#</th>
                									<th>Username</th>
                									<th>First Name</th>
                									<th>Last Name</th>
                									<th>Email</th>
                									<th>Mobile</th>
                									<th>Status</th>
                									<th>Action</th>
                								</tr>
                							</thead>
                							<tbody id="tbody1">

                							</tbody>
                						</table>
                					</div>
                					<!-- Modal -->
                					<div class="modal fade" id="updateModel" role="dialog">
                						<div class="modal-dialog">
                							<!-- Modal content-->
                							<div class="modal-content">
                								<div class="modal-header">
                									<h5 class="modal-title" id="exampleModalLabel">Update User</h5>
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

    				<input type="hidden" name="duserid" id="duserid">
    				<script type="text/javascript">
    					var user=document.getElementById("duserid");
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
$this->load->view('popup/add_user');
$this->load->view('footer');
?>
<script>
	$(document).ready(function(){
		user_fetchdata();
	});
  //
  function user_fetchdata(){
  	var loader = `<tr><td colspan="8" class="text-center"><img src="<?php echo base_url();?>assets/img/loading.gif" alt="loading..."></td></tr>`;
  	$('#table1').dataTable().fnDestroy();
  	$('#tbody1').html(loader);
  	$.ajax({
  		method: 'POST',
  		url: '<?php echo base_url();?>users/show_users',
  		success: function(data){
  			$('#tbody1').html(data);
  			$('#table1').DataTable();
  		}
  	})
  }
</script>
<script>
	function deletethis(val) {
//
$.ajax({
	type: "POST",
	url: "<?php echo base_url();?>users/delete_user",
	data:'user='+val,
	success: function(data){
		$('#deleteModel').modal('hide');
		user_fetchdata();
		snack('#59b35a','User Deleted Successfully','check-square-o');
	}
});
}
</script>
<script>
	function get_update_content(val) {
//
$.ajax({
	type: "POST",
	url: "<?php echo base_url();?>users/update_form",
	data:'userid='+val,
	success: function(data){
		$("#updateuser").html(data);
		$('#updateModel').modal('show');
	}
});
}
</script>
<!--  -->
<script type="text/javascript">
	$(document).ready(function() {
		$("#adduserform").submit(function() {
			$.ajax({
				type: "POST",
				url: '<?php echo base_url();?>users/add_user',
				data:$("#adduserform").serialize(),
				success: function (data) {
					snack('#59b35a',data,'check-square-o');
					$('#addnewModel').modal('hide');
					user_fetchdata();
				},
				error: function(jqXHR, text, error){
// Displaying if there are any errors
$('#addoutput').hide();
$('#error').show();
$('#error').html('Error:Username already exist');

}
});
			return false;
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#updateuser").submit(function() {
			$.ajax({
				type: "POST",
				url: '<?php echo base_url();?>users/update_user',
				data:$("#updateuser").serialize(),
				success: function (data) {
					snack('#59b35a',data,'check-square-o');
					$('#updateModel').modal('hide');
					user_fetchdata();
				},
				error: function(jqXHR, text, error){
// Displaying if there are any errors

}
});
			return false;
		});
	});
</script>



