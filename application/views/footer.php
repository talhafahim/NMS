 <!-- ============================================================== -->
 <!-- footer -->
 <!-- ============================================================== -->
 <footer class="footer text-center">
     All Rights Reserved by LOGON BROADBAND. Designed and Developed by <a href="http://logon.com.pk/">LOGON</a>.
 </footer>
 <!-- ============================================================== -->
 <!-- End footer -->
 <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- customizer Panel -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="<?php echo base_url();?>assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?php echo base_url();?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="<?php echo base_url();?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- apps -->
<script src="<?php echo base_url();?>dist/js/app.min.js"></script>
<script src="<?php echo base_url();?>dist/js/app.init.js"></script>
<script src="<?php echo base_url();?>dist/js/app-style-switcher.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?php echo base_url();?>assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="<?php echo base_url();?>dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="<?php echo base_url();?>dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="<?php echo base_url();?>dist/js/feather.min.js"></script>
<script src="<?php echo base_url();?>dist/js/custom.min.js"></script>
<!--This page plugins -->
<script src="<?php echo base_url();?>assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>dist/js/pages/datatable/datatable-basic.init.js"></script>
<script type="text/javascript">
  function snack(color,text,icon) { 
    var x = document.getElementById("snackbar");
    $('#snackbar').css('background-color', color);
    $('#snackbar').html('<i class="fa fa-'+icon+'"></i> '+text);
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
  }
</script>

<!--  -->
<div id="action_loader" class="overlay">
  <div class="col-md-12">
    <center>

      <div style="width: 300px;background-color: white;padding: 10px;border-radius: 5px;"> 
        <img  src="<?php echo base_url();?>assets/img/action_loader.gif" width="100px">
        <h3>L O A D I N G...</h3>
        <!-- <h4>Please wait</h4> -->
    </div>
</center>
</div>
</div>
<div id="snackbar"></div>
</body>


<!-- Mirrored from www.wrappixel.com/demos/admin-templates/xtreme-admin/html/ltr/starter-kit.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jun 2020 05:24:52 GMT -->
<?php
$this->load->view('popup/add_segment');
$this->load->view('popup/add_pop');
$this->load->view('popup/add_module');
?>
</html>.