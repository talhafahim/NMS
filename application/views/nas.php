<?php $this->load->view('header'); ?>
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
					<h4 class="page-title">NAS | Server</h4>
                </div>
                <div class="col-7 align-self-center">
                	<div class="d-flex no-block justify-content-end align-items-center">
                       <!-- <php if(access_crud('City','create')){ ?> -->
                          <button type="button" onclick="$('#addnewcity').modal('show');" class="btn btn-secondary btn-rounded"><i class="fas fa-plus"></i> Add New NAS</button>
                          <!-- <php } ?> -->
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
                           <div class="col-md-12">
                              <div class="table-responsive">
                                 <table class="table table-striped table-bordered dataTable" id="citytable" width="100%" cellspacing="0">
                                    <thead>
                                       <tr>
                                          <th>#</th>
                                          <th>NAS Tag</th>
                                          <th>IP Address</th>
                                          <th>Port</th>
                                          <th>Type</th>
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                   <!--  -->
                               </tbody>
                           </table>
                       </div>
                   </div>
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
<!-- Add City Modal -->
<div class="modal fade" id="addnewcity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New NAS</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <form class="form-horizontal form-label-left input_mask" id="addcityform">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">NAS Tag</label>
                                    <input type="text" class="form-control" name="tag" id="tag" required="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">IP Address</label>
                                    <input type="text" class="form-control" name="ip" id="ip" required="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Port</label>
                                    <input type="text" class="form-control" name="port" id="port" required="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Type</label>
                                    <select class="form-control" id="type" name="type">
                                        <option value="">select type</option>
                                        <option>Juniper</option>
                                        <option>Cisco</option>
                                        <option>Mikrotik</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12"> 
                                <button class="btn btn-secondary" style="float: right;" type="submit">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End Add City Modal -->
<!-- Modal -->
<div class="modal fade" id="updateModel" role="dialog">
   <div class="modal-dialog modal-md">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update NAS</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
           </button>
       </div>

       <div id="updatecontent">

        <br>
        <form id="updatecity" class="form-horizontal form-label-left input_mask">
        </form>
    </div>
                <!--  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div> -->
            </div>
        </div>
    </div>
    <!-- update modal ends -->
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <?php $this->load->view('footer');?>
    <script type="text/javascript">
    	$(document).ready(function() {
    		$("#addcityform").submit(function() {
    			$.ajax({
    				type: "POST",
    				url: '<?php echo base_url();?>nas/add_nas',
    				data:$("#addcityform").serialize(),
    				success: function (data) {
    					if(data.includes("Success")){
    						snack('#59b35a',data,'check-square-o');
    						$('#addnewcity').modal('hide');
    						$('#addcityform').trigger('reset');
    						city_fetchdata();
    					}else{
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
    	$(document).ready(function(){
    		city_fetchdata();
    	});
  //
  function city_fetchdata(){
  	var loader = `<tr><td colspan="9" class="text-center"><img src="<?php echo base_url();?>assets/img/loading.gif" alt="loading..."></td></tr>`;
  	$('#citytable').dataTable().fnDestroy();
  	$('#citytable tbody').html(loader);
  	$.ajax({
  		method: 'POST',
  		url: '<?php echo base_url();?>nas/get_nas',
  		success: function(data){
  			$('#citytable tbody').html(data);
  			$('#citytable').DataTable();
  		}
  	})
  }
</script>
<script type="text/javascript">
	$(document).on('click','.delete-nas',function(){
		if (confirm('Do you really want to delete this?')) {
			var id = $(this).attr('nas-id');
			$.ajax({
				method: 'POST',
				url: '<?php echo base_url();?>nas/delete_nas',
				data:'id='+id,
				success: function(data){
					city_fetchdata();
					snack('#59b35a',data,'check-square-o');
				}
			})
		}

	})
</script>
<script>
	function get_update_content(id) {
    //
    $.ajax({
    	type: "POST",
    	url: "<?php echo base_url();?>nas/update_form",
    	data:'id='+id,
    	success: function(data){
    		$("#updatecity").html(data);
    		$('#updateModel').modal('show');
    	}
    });
}
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#updatecity").submit(function() {
      $.ajax({
        type: "POST",
        url: '<?php echo base_url();?>nas/update_action',
        data:$("#updatecity").serialize(),
        success: function (data) {
            if(data == 1){
                snack('#59b35a','Update Successfully','check-square-o');
                $('#updateModel').modal('hide');
            }else{
                snack('#f62d51',data,'times');
            }
          city_fetchdata();
      },
      error: function(jqXHR, text, error){
    // Displaying if there are any errors
}
});
      return false;
  });
});
</script>
