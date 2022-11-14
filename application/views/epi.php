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
					<h4 class="page-title">Electric POP Inquiry</h4>
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
                            	<?php if(access_crud('epi','create')){ ?>
                            		<button type="button" onclick="$('#addnewepi').modal('show');" class="btn btn-secondary btn-rounded"><i class="fas fa-plus"></i> Add New</button>
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
                					<div class="col-md-12">
                						<div class="table-responsive">
                							<table class="table table-striped table-bordered dataTable" id="epitable" width="100%" cellspacing="0">
                								<thead>
                									<tr>
                										<th>#</th>
                										<th>Name</th>
                                                        <th>Address</th>
                                                        <th>Contact#</th>
                                                        <th>POP Name</th>
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

             <div class="modal fade" id="addnewepi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New EPI</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="col-md-12">
                                <form class="form-horizontal form-label-left input_mask" id="addepiform">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Name</label>
                                                <input type="text" class="form-control" name="shopname" id="exampleFormControlInput1" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Address</label>
                                                <input type="text" class="form-control" name="address" id="exampleFormControlInput1" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Contact#</label>
                                                <input type="text" class="form-control" name="contact" id="exampleFormControlInput1" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">POP Name</label>
                                                <select class="form-control" name="pop" id="exampleFormControlSelect1" required="">
                                                    <option value="">select pop</option>
                                                    <?php foreach($pops->result() as $value){?>
                                                        <option value="<?php echo $value->pop_id;?>"><?php echo $value->pop_name;?></option>
                                                    <?php } ?>      
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


            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <?php $this->load->view('footer');?>
            <script type="text/javascript">
             $(document).ready(function() {
              $("#addepiform").submit(function() {
               $.ajax({
                type: "POST",
                url: '<?php echo base_url();?>pop/add_epi',
                data:$("#addepiform").serialize(),
                success: function (data) {
                 if(data.includes("Success")){
                  snack('#59b35a',data,'check-square-o');
                  $('#addnewepi').modal('hide');
                  $('#addepiform').trigger('reset');
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
          pop_fetchdata();
      });
  //
  function pop_fetchdata(){
  	var loader = `<tr><td colspan="6" class="text-center"><img src="<?php echo base_url();?>assets/img/loading.gif" alt="loading..."></td></tr>`;
  	$('#epitable').dataTable().fnDestroy();
  	$('#epitable tbody').html(loader);
  	$.ajax({
  		method: 'POST',
  		url: '<?php echo base_url();?>pop/epi_list',
  		success: function(data){
  			$('#epitable tbody').html(data);
  			$('#epitable').DataTable();
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
				url: '<?php echo base_url();?>pop/delete_epi',
				data:'serial='+$popid,
				success: function(data){
					pop_fetchdata();
					snack('#59b35a',data,'check-square-o');
				}
			})
		}

	})
</script>
