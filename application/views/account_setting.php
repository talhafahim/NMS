<?php $this->load->view('header'); ?>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<head>
    <style type="text/css">
        .errspan {
            float: right;
            margin-right: 6px;
            margin-top: -24px;
            position: relative;
            z-index: 2;
            color: #185899;
        }
    </style>
</head>
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
					<h4 class="page-title">Account Setting</h4>
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
        		<div class="col-12">
        			<div class="card">
        				<div class="card-body">
        					<center class="mt-4"> <img src="<?= base_url();?>assets/images/users/1.jpg" class="rounded-circle" width="150" />
        						<h4 class="card-title mt-2"><?= $user->firstname.' '.$user->lastname;?></h4>
        						<h6 class="card-subtitle"><?= $user->status;?></h6>
        						<div class="row text-center justify-content-md-center">
        							<!-- <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                     <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div> -->
                                 </div>
                             </center>
                         </div>
                     </div>
                 </div>
                 <div class="col-12">
                     <div class="card">
                        <div class="card-body">
                           <form id="acc_setting_form">
                            <input type="hidden" name="userid" value="<?php echo $user->id;?>">
                               <div class="col-md-12">
                                  <div class="row">
                                     <div class="col-md-6 col-xs-12">
                                        <div class="form-group">
                                           <label for="exampleFormControlInput1">Firstname</label>
                                           <input type="text" class="form-control" name="f_name" id="exampleFormControlInput1" required="" value="<?= $user->firstname;?>" readonly>
                                       </div>
                                   </div>
                                   <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                       <label for="exampleFormControlInput1">Lastname</label>
                                       <input type="text" class="form-control" name="l_name" id="exampleFormControlInput1" required="" value="<?= $user->lastname;?>" readonly>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-12">
                          <div class="row">
                             <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                   <label for="exampleFormControlInput1">Email</label>
                                   <input type="email" class="form-control" name="email" id="exampleFormControlInput1" required="" value="<?= $user->email;?>" readonly>
                               </div>
                           </div>
                           <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                               <label for="exampleFormControlInput1">CNIC</label>
                               <input type="text" class="form-control" name="nic" id="exampleFormControlInput1" required="" value="<?= $user->nic;?>" readonly>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="col-md-12">
                  <div class="row">
                     <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                           <label for="exampleFormControlInput1">Username</label>
                           <input type="text" class="form-control" name="username" id="exampleFormControlInput1" required="" value="<?= $user->username;?>" readonly>
                       </div>
                   </div>
                   <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                       <label for="exampleFormControlInput1">Password</label>
                       <input type="password" class="form-control" name="password" id="password"  value="<?php echo $user->pass_string;?>" required>
                       <span class="fa fa-eye errspan"></span>
                   </div>
               </div>
           </div>
       </div>
       <div class="col-md-12">
          <div class="row">
             <div class="col-md-6 col-xs-12">
                <div class="form-group">
                   <label for="exampleFormControlInput1">Mobile#</label>
                   <input type="text" class="form-control" name="mobile" id="exampleFormControlInput1" required="" value="<?= $user->mobilephone;?>" >
               </div>
           </div>
           <div class="col-md-6 col-xs-12">
            <div class="form-group">
               <label for="exampleFormControlInput1">Address</label>
               <input type="text" class="form-control" name="address" id="exampleFormControlInput1" required="" value="<?= $user->address;?>">
           </div>
       </div>
   </div>
</div>
<div class="col-md-12"> 
    <button class="btn btn-secondary" style="float: right;" type="submit">Update</button>
</div>
</form>
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
<?php $this->load->view('footer');?>
<script type="text/javascript">
    $('.errspan').click(function(){
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#acc_setting_form").submit(function() {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url();?>users/update_user',
                data:$("#acc_setting_form").serialize(),
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