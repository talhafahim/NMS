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
					<h4 class="page-title">POPs</h4>
                    <!-- <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Library</li>
                            </ol>
                        </nav>
                    </div> -->
                </div>
                <div class="col-7 align-self-center">
                	<div class="d-flex no-block justify-content-end align-items-center">
                           <!--  <div class="mr-2">
                                <div class="lastmonth"></div>
                            </div>
                            <div class=""><small>LAST MONTH</small>
                            	<h4 class="text-info mb-0 font-medium">$58,256</h4></div> -->
                            	<?php if(access_crud('pop','create')){ ?>
                            		<button type="button" onclick="$('#addnewpop').modal('show');" class="btn btn-secondary btn-rounded"><i class="fas fa-plus"></i> Add New POP</button>
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
                                        <li class="nav-item"> <a class="nav-link active" id="cir" data-toggle="tab" href="#tab1" role="tab" aria-controls="home5" aria-expanded="true"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Main POPs</span></a> </li>
                                        <li class="nav-item"> <a class="nav-link" id="id" data-toggle="tab" href="#tab2" role="tab" aria-controls="profile"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Sub POPs</span></a></li>
                                        <li class="nav-item"> <a class="nav-link" id="p2p" data-toggle="tab" href="#tab3" role="tab" aria-controls="profile"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Rental POPs</span></a></li>

                                    </ul>
                                    <div class="tab-content tabcontent-border p-20" id="myTabContent">
                                        <div role="tabpanel" class="tab-pane fade show active" id="tab1" aria-labelledby="home-tab">




                                          <div class="table-responsive">
                                           <table class="table table-striped table-bordered dataTable" id="poptable" width="100%" cellspacing="0">
                                            <thead>
                                             <tr>
                                              <th>#</th>
                                              <th>POP Name</th>
                                              <th>Location</th>
                                              <th>Longitude</th>
                                              <th>Latitude</th>
                                              <th>K-Electric Bill#</th>
                                              <th>LA#</th>
                                              <th>City</th>
                                              <th>Sub Meter</th>
                                              <th>Action</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                         <!--  -->
                                     </tbody>
                                 </table>
                             </div>


                         </div>



                         <div role="tabpanel" class="tab-pane fade" id="tab2" aria-labelledby="home-tab">




                            <div class="table-responsive">
                                <table class="table table-striped table-bordered dataTable" id="poptable2" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>POP Name</th>
                                            <th>Location</th>
                                            <th>Longitude</th>
                                            <th>Latitude</th>
                                            <th>K-Electric Bill#</th>
                                            <th>LA#</th>
                                            <th>City</th>
                                            <th>Sub Meter</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--  -->
                                    </tbody>
                                </table>
                            </div>


                        </div>



                        <div role="tabpanel" class="tab-pane fade" id="tab3" aria-labelledby="home-tab">




                            <div class="table-responsive">
                                <table class="table table-striped table-bordered dataTable" id="poptable3" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>POP Name</th>
                                            <th>Location</th>
                                            <th>Longitude</th>
                                            <th>Latitude</th>
                                            <th>K-Electric Bill#</th>
                                            <th>LA#</th>
                                            <th>City</th>
                                            <th>Sub Meter</th>
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
<!-- Modal -->
<div class="modal fade" id="updateModel" role="dialog">
 <div class="modal-dialog modal-lg">
  <!-- Modal content-->
  <div class="modal-content">
   <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Update POP</h5>
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
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <?php $this->load->view('footer');?>
    <script type="text/javascript">
    	$(document).ready(function() {
    		$("#addpopform").submit(function() {
    			$.ajax({
    				type: "POST",
    				url: '<?php echo base_url();?>pop/add_pop',
    				data:$("#addpopform").serialize(),
    				success: function (data) {
    					if(data.includes("Success")){
    						snack('#59b35a',data,'check-square-o');
    						$('#addnewpop').modal('hide');
    						$('#addpopform').trigger('reset');
    						pop_fetchdata();
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
            pop_fetchdata('main','poptable');
            pop_fetchdata('sub','poptable2');
            pop_fetchdata('rental','poptable3');
        });
  //
  function pop_fetchdata(cat,table){
  	var loader = `<tr><td colspan="10" class="text-center"><img src="<?php echo base_url();?>assets/img/loading.gif" alt="loading..."></td></tr>`;
  	$('#'+table).dataTable().fnDestroy();
  	$('#'+table+' tbody').html(loader);
  	$.ajax({
  		method: 'POST',
  		url: '<?php echo base_url();?>pop/pops',
        data:'cat='+cat,
        success: function(data){
           $('#'+table+' tbody').html(data);
           $('#'+table).DataTable();
       }
   })
  }
</script>
<script type="text/javascript">
	$(document).on('click','.delete-pop',function(){
		if (confirm('Do you really want to delete this?')) {
			$popid = $(this).attr('pop-id');
			$.ajax({
				method: 'POST',
				url: '<?php echo base_url();?>pop/delete_pop',
				data:'popid='+$popid,
				success: function(data){
					pop_fetchdata('main','poptable');
                    pop_fetchdata('sub','poptable2');
                    pop_fetchdata('rental','poptable3');
                    snack('#59b35a',data,'check-square-o');
                }
            })
		}

	})
</script>
<script>
	function get_update_content(val) {
    //
    $.ajax({
    	type: "POST",
    	url: "<?php echo base_url();?>pop/update_form",
    	data:'id='+val,
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
        url: '<?php echo base_url();?>pop/update_pop',
        data:$("#updateuser").serialize(),
        success: function (data) {
          snack('#59b35a',data,'check-square-o');
          $('#updateModel').modal('hide');
          pop_fetchdata('main','poptable');
          pop_fetchdata('sub','poptable2');
          pop_fetchdata('rental','poptable3');
      },
      error: function(jqXHR, text, error){
    // Displaying if there are any errors
}
});
      return false;
  });
});
</script>
