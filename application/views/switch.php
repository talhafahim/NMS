<?php $this->load->view('header'); ?>
<head>


	<style type="text/css">
		.filterhide select{
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
        <h4 class="page-title">Switch</h4>
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
                              <?php if(access_crud('switch','create')){ ?>
                                <button type="button" onclick="$('#SWI_Modal').modal('show')" class="btn btn-secondary btn-rounded"><i class="fas fa-plus"></i> Add Switch</button>
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
                            <table class="table table-striped table-bordered dataTable" id="switchTable" width="100%" cellspacing="0">
                             <thead>
                              <tr>
                               <th>#</th>
                               <th>Switch Name</th>
                               <th>IP Address</th>
                               <th>Dealer</th>
                               <th>Area</th>
                               <!-- <th>Version</th> -->
                               <th>Model</th>
                               <th>Primary POP</th>
                               <th>Secondary POP</th>
                               <th>VLAN</th>
                               <th>City</th>
                                <th>Ping | packet loss</th>
                               <th>Last Update</th>
                               <th>Last Update By</th>
                               <th>Action</th>
                             </tr>
                             <tr>
                               <td class="filterhide"></td>
                               <td class="filterhide"></td>
                               <td class="filterhide"></td>
                               <td class=""></td>
                               <td class=""></td>
                               <!-- <td id="filterversion"></td> -->
                               <td class="filterhide"></td>
                               <td class=""></td>
                               <td class=""></td>
                               <td class="filterhide"></td>
                               <td class="filterhide"></td>
                               <td class="filterhide"></td>
                               <td class="filterhide"></td>
                               <td class="filterhide"></td>
                               <td class="filterhide"></td>
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
                              <h5 class="modal-title" id="exampleModalLabel">Update Switch</h5>
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
  $this->load->view('popup/add_switch');
  $this->load->view('footer');
  ?>
  <!--  -->
  <script type="text/javascript">
    $(document).on('click','.pop',function(){
      $(this).popover('toggle');
    });
  </script>
  <script type="text/javascript">
   $(document).ready(function() {
    get_data();
  });
</script>
<script>
 function get_data() {
  // 
  var loader = `<tr><td colspan="14" class="text-center"><img src="<?php echo base_url();?>assets/img/loading.gif" alt="loading..."></td></tr>`;
  $('#switchTable').dataTable().fnDestroy();
  $('#switchTable tbody').html(loader);
  $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>switches/get_switches",
  //for posting multiple variable
  // data:'name='+val+'&age='+age,
  success: function(data){
    // for get return data
    $("#switchTable tbody").html(data);
  },
  complete: function(){
   var table = $('#switchTable').DataTable();
   $("#switchTable thead td").each( function ( i ) {
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
  $(document).ready(function() {
    $("#switch_insert_form").submit(function() {
      $('#action_loader').show();
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>switches/insert_switch",
        data:$("#switch_insert_form").serialize(),
        success: function (data) {

          if(data.includes("Success")){
            $('#SWI_Modal').modal('hide');
            $('#action_loader').hide();
            snack('#59b35a',data,'check-square-o');
            $('#switch_insert_form').trigger('reset');
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
<script type="text/javascript">
  $(document).on('click','.delete-swi',function(){
    if (confirm('Do you really want to delete this?')) {
      $switid = $(this).attr('swi-id');
      $.ajax({
        method: 'POST',
        url: '<?php echo base_url();?>switches/delete_switch',
        data:'switid='+$switid,
        success: function(data){
          snack('#59b35a',data,'check-square-o');
          get_data();

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
      url: "<?php echo base_url();?>switches/update_form",
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
        url: '<?php echo base_url();?>switches/update_switch',
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


