
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!-- End Required meta tags -->
	<!-- Begin SEO tag -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>assets/images/favicon.png">
	<title>NMS | LOGON</title>
	
	
	<link rel="stylesheet" href="<?php echo base_url();?>dist/css/theme.min.css" data-skin="default">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/particles/style.css">
	<style type="text/css">
		.auth-header,.auth{
			background-color: #f3f3f3 !important;
		}
		#output,#output2,#forget_form,#loading,#loading2,#sentOutput{
			display: none;
		}
	</style>
</head>
<body>
	<main class="auth" id="particles-js">
		
		<header id="auth-header" class="auth-header">
			<h1>
				<img src="<?php echo base_url();?>assets/images/Logon_Logo.png" alt="logo" width="230px"/>
			</svg> <span class="sr-only">Sign In</span>
		</h1>
        <!-- <p> Don't have a account? <a href="auth-signup.html">Create One</a>
        </p> -->
    </header><!-- form -->

    <form class="auth-form" id="loginForm">
    	<!-- .form-group -->
    	<div class="alert alert-danger" id="output"></div>
    	<div class="form-group">
    		<div class="form-label-group">
    			<input type="text" id="inputUser" class="form-control" placeholder="Username" autofocus="" name="username" required=""> <label for="inputUser">Username</label>
    		</div>
    	</div><!-- /.form-group -->
    	<!-- .form-group -->
    	<div class="form-group">
    		<div class="form-label-group">
    			<input type="password" id="password" class="form-control" placeholder="Password" name="password" required=""> <label for="inputPassword">Password</label>
    		</div>
    	</div><!-- /.form-group -->
    	<div class="form-group" style="float: left;">
    		<div class="custom-control custom-control-inline custom-checkbox">
    			<input type="checkbox" id="customCheck1" class="custom-control-input checkbox_check"> <label class="custom-control-label" for="customCheck1">Show password</label>
    		</div>
    	</div>
    	<div class="form-group" style="float: right;">
    		<a onclick="showforget()" class="link">Forgot Password?</a>
    	</div>
    	<!-- .form-group -->
    	<div class="form-group">
    		<button class="btn btn-lg btn-primary btn-block" id="loginbtn" type="submit">Sign In</button>
    	</div><!-- /.form-group -->
    	<div id="loading" style="text-align: center;">
    		<img src="<?php echo base_url();?>assets/img/loading.gif" width="20%">
    	</div>
    	<!-- .form-group -->
    	<!-- /.form-group -->
    	<!-- recovery links -->
    	<!-- <div class="text-center">
    		<a onclick="showforget()" class="link">Forgot Password?</a>
    	</div> -->
    	<!-- /recovery links -->
    </form><!-- /.auth-form -->
    <!--  -->
    <form class="auth-form" id="forget_form">
    	<!-- .form-group -->
    	<div class="alert alert-danger" id="output2"></div>
    	<p>your password will be sent to your email id</p>
    	<div class="form-group">
    		<div class="form-label-group">
    			<input type="email"  id="email" class="form-control" placeholder="type email here" name="fp_email" required=""> <label for="email">type email here</label>
    		</div>
    	</div><!-- /.form-group -->
    	<p id="sentOutput"></p>
    	<!-- .form-group -->
    	<div class="form-group">
    		<button class="btn btn-lg btn-primary btn-block" id="loginbtn2" type="submit">Send mail</button>
    	</div><!-- /.form-group -->
    	<div id="loading2" style="text-align: center;">
    		<img src="<?php echo base_url();?>assets/img/loading.gif" width="20%">
    	</div>
    	<!-- .form-group -->
    </form><!-- /.auth-form -->

    <!-- copyright -->
    <footer class="auth-footer"> © 2020 All Rights Reserved.Designed & developed by <a href="http://logon.com.pk/" target="_blank">logon</a>
    </footer>
</main><!-- /.auth -->
<!-- BEGIN BASE JS -->

<script src="<?php echo base_url();?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/libs/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/particles/particles.js"></script>
<script src="<?php echo base_url();?>assets/particles/app.js"></script>
<!-- BEGIN PLUGINS JS -->
</body>
</html>
<script type="text/javascript">
	function showforget(){
		$('#loginForm').hide();
		$('#forget_form').show();
	}
</script>
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
			$("#loginbtn2").hide();
			$("#loading2").show();
			$('#output2').hide();
			$.ajax({
				type: "POST",
				url: '<?php echo base_url();?>login/forgot_password',
				data:$("#forget_form").serialize(),
				success: function (data) {
							// 
							if(data.includes("sent")){
								$("#loading2").hide();
								$('#sentOutput').show();
								$('#sentOutput').html(data);
								setTimeout(function(){ window.location = "<?php echo base_url();?>"; }, 2000);
							}else{
								$("#loginbtn2").show();
								$("#loading2").hide();
									// snack('#d3514d',data,'times');
									$('#output2').show();
									$('#output2').html(data);
								}
								setTimeout(function(){ $('#output2').fadeOut(); }, 2000);
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