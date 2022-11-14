<?php $this->load->view('header'); ?>
<head>
	<style type="text/css">
		#filterserial select,#filterip select,#filterarea select,#filtervlanname select,#filtervlanid select,#filteraction select,#filterlastupdate select{
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
        <h4 class="page-title">Dealer VLAN Free VLAN ID</h4>
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
                            <table class="table table-striped table-bordered dataTable" id="freeIPsTable" width="100%" cellspacing="0">
                             <thead>
                              <tr>
                               <th>#</th>
                               <th>Segment</th>
                               <th>Free VLAN ID</th>
                             </tr>
                             <tr>
                               <td id="filterserial"></td>
                               <td id="filters"></td>
                               <td id="filterip"></td>
                             </tr>

                           </thead>

                           <tbody>



                           </tbody>
                         </table>
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
 
  <!-- ============================================================== -->
  <!-- End Container fluid  -->
  <!-- ============================================================== -->
  <?php 
  $this->load->view('footer');
  ?>
  <!--  -->
  <script type="text/javascript">
   $(document).ready(function() {
    get_data();
  });
</script>
<script>
 function get_data() {
  // 
  var loader = `<tr><td colspan="3" class="text-center"><img src="<?php echo base_url();?>assets/img/loading.gif" alt="loading..."></td></tr>`;
  $('#freeIPsTable').dataTable().fnDestroy();
  $('#freeIPsTable tbody').html(loader);
  $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>vlan/get_free_vlan",
  //for posting multiple variable
  // data:'name='+val+'&age='+age,
  success: function(data){
    // for get return data
    $("#freeIPsTable tbody").html(data);
  },
  complete: function(){
   var table = $('#freeIPsTable').DataTable();
   $("#freeIPsTable thead td").each( function ( i ) {
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



