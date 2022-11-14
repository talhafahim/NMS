<?php $this->load->view('header'); ?>
<head>
	<style type="text/css">
		#filterserial select,#filterip select,#filterarea select,#filtervlanname select,#filtervlanid select,#filteraction select,#filterlastupdate select,#filterassignto select{
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
        <h4 class="page-title">Office VLAN</h4>
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
                              <?php if(access_crud('vlan office','create')){ ?>
                                <button type="button" id="add_vlan" class="btn btn-secondary btn-rounded"><i class="fas fa-plus"></i> Add New VLAN</button>
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

                           <div class="table-responsive">
                            <table class="table table-striped table-bordered dataTable" id="vlantable" width="100%" cellspacing="0">
                             <thead>
                              <tr>
                               <th>#</th>
                               <!-- <th>Segment</th> -->
                               <th>IP Address</th>
                               <th>Subnet</th>
                               <!-- <th>Dealer</th> -->
                               <!-- <th>Area</th> -->
                               <th>VLAN Name</th>
                               <th>VLAN ID</th>
                               <th>Assign To</th>
                               <th>Last Update</th>
                               <th>Last Update By</th>
                               <th>Action</th>
                             </tr>
                             <tr>
                               <td id="filterserial"></td>
                               <!-- <td id="filterseg"></td> -->
                               <td id="filterip"></td>
                               <td id="filtersubnet"></td>
                               <!-- <td id="filterdealer"></td> -->
                               <!-- <td id="filterarea"></td> -->
                               <td id="filtervlanname"></td>
                               <td id="filtervlanid"></td>
                               <td id="filterassignto"></td>
                               <td id="filterlastupdate"></td>
                               <td id="filterlastupdateby"></td>
                               <td id="filteraction"></td>
                             </tr>

                           </thead>

                           <tbody>



                           </tbody>
                         </table>
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
  $this->load->view('popup/add_office_vlan');
  $this->load->view('footer');
  ?>
  <script type="text/javascript">
   $(document).ready(function() {
    get_data();
  });
</script>
<script>
 function get_data() {
  // 
  var loader = `<tr><td colspan="11" class="text-center"><img src="<?php echo base_url();?>assets/img/loading.gif" alt="loading..."></td></tr>`;
  $('#vlantable').dataTable().fnDestroy();
  $('#vlantable tbody').html(loader);
  $.ajax({
  	type: "POST",
  	url: "<?php echo base_url();?>Office_vlan/get_vlan",
  //for posting multiple variable
  // data:'name='+val+'&age='+age,
  success: function(data){
    // for get return data
    $("#vlantable tbody").html(data);
  },
  complete: function(){
   var table = $('#vlantable').DataTable();
   $("#vlantable thead td").each( function ( i ) {
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
	$('#add_vlan').click(function(){
    // alert('working');
    $('#OVLAN_Modal').modal('show');
  })
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#vlan_insert_form").submit(function() {
			$('#action_loader').show();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>Office_vlan/insert",
				data:$("#vlan_insert_form").serialize(),
				success: function (data) {
					if(data.includes("Success")){
						$('#AVLAN_Modal').modal('hide');
						$('#action_loader').hide();
						snack('#59b35a',data,'check-square-o');
						$('#vlan_insert_form').trigger('reset');
						get_data();
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
  url: "<?php echo base_url();?>Office_vlan/update_form",
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
        url: '<?php echo base_url();?>Office_vlan/update_vlan',
        data:$("#updateuser").serialize(),
        success: function (data) {
          snack('#59b35a',data,'check-square-o');
          $('#updateModel').modal('hide');
          get_data();
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
  url: "<?php echo base_url();?>Office_vlan/delete_ip",
  data:'ip='+val,
  success: function(data){
    $('#deleteModel').modal('hide');
    $('#action_loader').hide();
    get_data();
    snack('#59b35a',data,'check-square-o');
  }
});
}
</script>

