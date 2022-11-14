<!DOCTYPE html>
<html dir="ltr" lang="en">


<!-- Mirrored from www.wrappixel.com/demos/admin-templates/xtreme-admin/html/ltr/starter-kit.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jun 2020 05:24:52 GMT -->
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
	<!-- <link rel="canonical" href="https://www.wrappixel.com/templates/xtremeadmin/" /> -->
	<!-- Custom CSS -->
	<link href="<?php echo base_url();?>dist/css/style.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>dist/css/snackbar.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css"
	href="<?php echo base_url();?>assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css">
	 <link rel="stylesheet" href="<?= base_url();?>dist/css/font-awesome-animation.min.css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style type="text/css">
	.sidebar-link .fa{
		font-size: 15px !important;
	}
	.overlay {
		height: 100%;
		width: 100%;
		display: none;
		position: fixed;
		z-index: 1051;
		top: 0;
		left: 0;
		background-color: #0000007a;
		margin: 0 auto;
	}
	#action_loader .col-md-12{
		display: flex;
		justify-content: center;
		align-items: center;
		vertical-align: middle;
		width: 100%;
		top: 100px;
	}
	@media only screen and (max-width: 600px) {
		.mobileHide {
			display: none;
		}
	}
	.btn-group{
		border: 3px solid white;
	}
	.fa-circle,.fa-check-circle{
		font-size: 20px;
	}
	::-webkit-scrollbar {
		width: 4px;
	}

	/* Track */
	::-webkit-scrollbar-track {
		background: #f1f1f1; 
	}
	
	/* Handle */
	::-webkit-scrollbar-thumb {
		background: #194279; 
	}
</style>
</head>

<body>
	<!-- ============================================================== -->
	<!-- Preloader - style you can find in spinners.css -->
	<!-- ============================================================== -->
    <!-- <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div> -->