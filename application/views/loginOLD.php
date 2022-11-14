<!DOCTYPE html>
<html dir="ltr">


<!-- Mirrored from www.wrappixel.com/demos/admin-templates/xtreme-admin/html/ltr/authentication-login1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jun 2020 05:25:02 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>assets/images/favicon.png">
	<title>NMS | LOGON</title>
	<link rel="canonical" href="https://www.wrappixel.com/templates/xtremeadmin/" />
	<!-- Custom CSS -->
	<link href="<?php echo base_url();?>dist/css/style.min.css" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style type="text/css">
	#loading,#floading{
		display: none;
	}
	#loginbtn{
		background-color: #0d71a7 !important;
		border-color: #0d71a7 !important;
	}
	#output{
		display: none;
	}
	.bg{
		background: url(../../assets/images/big/auth-bg.jpg) no-repeat center center fixed; 
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		position: absolute;
		top: 0;
		bottom: 0;
		left: 0;
		right: 0;
		transition: all 3s ease-in-out;
	}
</style>
</head>

<body>
	<div class="main-wrapper">
		<!-- ============================================================== -->
		<!-- Preloader - style you can find in spinners.css -->
		<!-- ============================================================== -->
		<div class="preloader">
			<div class="lds-ripple">
				<div class="lds-pos"></div>
				<div class="lds-pos"></div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- Preloader - style you can find in spinners.css -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Login box.scss -->
		<!-- ============================================================== -->

		<div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="">
			<div class="bg"></div>
			<div class="auth-box" style="border-radius: 5px;z-index: 999;">
				<div id="loginform">
					<div class="logo">
						<span class="db"><img src="<?php echo base_url();?>assets/images/Logon_Logo.png" alt="logo" width="180px"/></span>
						<h5 class="font-medium mb-3"></h5>
					</div>
					<!-- Form -->
					<div class="row">
						<div class="col-12">
							<div class="alert alert-danger" id="output"></div>
							<form class="form-horizontal mt-3" id="loginForm">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
									</div>
									<input type="text" name="username" class="form-control form-control-lg" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required="">
								</div>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon2"><i class="ti-pencil"></i></span>
									</div>
									<input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1"required="" >
								</div>
								<div class="form-group row">
									<div class="col-md-12">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input checkbox_check" id="customCheck1">
											<label class="custom-control-label" for="customCheck1">Show password</label>
											<a href="javascript:void(0)" id="to-recover" class="text-dark float-right"><i class="fa fa-lock mr-1"></i> Forgot pwd?</a>
										</div>
									</div>
								</div>
								<div class="form-group text-center">
									<div class="col-xs-12 pb-3">
										<button class="btn btn-block btn-lg btn-info" id="loginbtn" type="submit">Log In</button>

									</div>
									<!-- <span id="output" style="color: red;"></span> -->
									<div id="loading">
										<img src="<?php echo base_url();?>assets/img/loading.gif" width="20%">
									</div>
								</div>
                               <!--  <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2 text-center">
                                        <div class="social">
                                            <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="" data-original-title="Login with Facebook"> <i aria-hidden="true" class="fab  fa-facebook"></i> </a>
                                            <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="" data-original-title="Login with Google"> <i aria-hidden="true" class="fab  fa-google-plus"></i> </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0 mt-2">
                                    <div class="col-sm-12 text-center">
                                        Don't have an account? <a href="authentication-register1.html" class="text-info ml-1"><b>Sign Up</b></a>
                                    </div>
                                </div> -->
                            </form>
                        </div>
                    </div>
                </div>
                <div id="recoverform">
                	<div class="logo">
                		<span class="db">
                			<!-- <img src="<?php echo base_url();?>assets/images/Logon_Logo.png" alt="logo" width="180px"/> -->
                		</span>
                		<h5 class="font-medium mb-3">Recover Password</h5>
                		<span>Enter your Email and instructions will be sent to you!</span>
                	</div>
                	<div class="row mt-3">
                		<!-- Form -->
                		<form class="col-12" id="forget_form">
                			<!-- email -->
                			<div class="form-group row">
                				<div class="col-12">
                					<input class="form-control form-control-lg" name="fp_email" type="email" required="" placeholder="type your email here">
                				</div>
                			</div>
                			<!-- pwd -->
                			<div class="row mt-3">
                				<div class="col-12">
                					<button class="btn btn-block btn-lg btn-danger" id="fpbtn" type="submit" name="action">Reset</button>
                					<div id="floading">
                						<center><img src="<?php echo base_url();?>assets/img/loading.gif" width="20%"></center>
                					</div>
                					<p id="for_output"></p>
                				</div>
                			</div>
                		</form>
                	</div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url();?>assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url();?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script type="text/javascript">
    	$('.checkbox_check').click(function(){
    		var x = document.getElementById("password");
    		if ($($(this)).prop('checked')) { 	
    			x.type = "text";
    		} else {
    			x.type = "password";
    		}
    	});
    </script>
    <script>
    	$('[data-toggle="tooltip"]').tooltip();
    	$(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
    	$("#loginform").slideUp();
    	$("#recoverform").fadeIn();
    });
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#loginForm").submit(function() {
			$("#loginbtn").hide();
			$("#loading").show();
			$('#output').hide();
			$.ajax({
				type: "POST",
				url: '<?php echo base_url();?>login/loginCheck',
				data:$("#loginForm").serialize(),
				success: function (data) {
					if (data == 1){
						setTimeout(function(){ window.location = "<?php echo base_url();?>"; }, 1000);
					}else{
						$("#loginbtn").show();
						$("#loading").hide();
									// snack('#d3514d',data,'times');
									$('#output').show();
									$('#output').html(data);
								}
		// Inserting html into the result div on success
		$('#output').html(data);
		setTimeout(function(){ $('#output').fadeOut(); }, 2000);
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
		$("#forget_form").submit(function() {
			$('#for_output').html('');
			$('#fpbtn').hide();
			$('#floading').show();
			$.ajax({
				type: "POST",
				url: '<?php echo base_url();?>login/forgot_password',
				data:$("#forget_form").serialize(),
				success: function (data) {
							// 
							$('#floading').hide();
							$('#for_output').html(data);
							setTimeout(function(){ 
								$('#for_output').html(''); 
								$('#fpbtn').show();	
								if(data.includes("sent")){
									// 
									$('#forget_form').trigger('reset');
									$('#loginform').show();
									$('#recoverform').hide();	
								}
							}, 2000);
							
						},
						error: function(jqXHR, text, error){
	// Displaying if there are any errors
	$('#for_output').html(error);
}
});
			return false;
		});
	});
</script>
<script>
$(document).ready(function(){
	// setTimeout(function(){  $(".bg").css("filter","blur(5px)"); }, 1000);
});
</script>

</body>


<!-- Mirrored from www.wrappixel.com/demos/admin-templates/xtreme-admin/html/ltr/authentication-login1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jun 2020 05:25:02 GMT -->
</html>