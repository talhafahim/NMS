<?php
$fname=$this->session->userdata('fname');
$lname=$this->session->userdata('lname');
$status=$this->session->userdata('status');
$fullname = ucfirst($fname).' '.ucfirst($lname);
$this->load->helper('helper1_helper.php');
?>
<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<head>
	<style type="text/css">
		.left-sidebar{
			background-image: url("<?php echo base_url();?>assets/img/nav_back.png");
			background-repeat: no-repeat;
			background-attachment: fixed;
			/*background-position: center;*/
			background-size: contain;
			background-image: linear-gradient(to bottom, #ffffff , #bec1c3);
		}
		#navfooter{
			position: fixed;
			bottom: 0;
			padding: 10px;
			margin-left: 15px;
		}
	</style>
</head>
<header class="topbar">
	<nav class="navbar top-navbar navbar-expand-md navbar-dark" style="background-image: linear-gradient(to right, #017fbf , #072f4e);">
		<div class="navbar-header" style="background-color:#e8eaed; ">
			<!-- This is for the sidebar toggle which is visible on mobile only -->
			<a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
			<!-- ============================================================== -->
			<!-- Logo -->
			<!-- ============================================================== -->
			<a class="navbar-brand" href="">
				<!-- Logo icon -->
				<b class="logo-icon">
					<!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
					<!-- Dark Logo icon -->
					<img src="<?= base_url();?>assets/images/logo-icon.png" alt="homepage" class="dark-logo"  style="width: 48px;" />
					<!-- Light Logo icon -->
					<!-- <img src="<?= base_url();?>assets/images/logo-light-icon.png" alt="homepage" class="light-logo" /> -->
				</b>
				<!--End Logo icon -->
				<!-- Logo text -->
				<span class="logo-text">
					<!-- dark Logo text -->
					<img src="<?= base_url();?>assets/images/logo-text.png" alt="homepage" class="dark-logo" style="width: 140px;"/>
					<!-- Light Logo text -->    
					<!-- <img src="<?= base_url();?>assets/images/logo-light-text.png" class="light-logo" alt="homepage" /> -->
				</span>
			</a>
			<!-- ============================================================== -->
			<!-- End Logo -->
			<!-- ============================================================== -->
			<!-- ============================================================== -->
			<!-- Toggle which is visible on mobile only -->
			<!-- ============================================================== -->
			<a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
		</div>
		<!-- ============================================================== -->
		<!-- End Logo -->
		<!-- ============================================================== -->
		<div class="navbar-collapse collapse" id="navbarSupportedContent">
			<!-- ============================================================== -->
			<!-- toggle and nav items -->
			<!-- ============================================================== -->
			<ul class="navbar-nav float-left mr-auto">
				<li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
				<!-- ============================================================== -->
				<!-- mega menu -->
				<!-- ============================================================== -->

				<!-- ============================================================== -->
				<!-- End mega menu -->
				<!-- ============================================================== -->
				<!-- ============================================================== -->
				<!-- create new -->
				<!-- ============================================================== -->
   <!--  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <span class="d-none d-md-block">Create New <i class="fa fa-angle-down"></i></span>
           <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>   
       </a>
       <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Something else here</a>
    </div>
</li> -->
<!-- ============================================================== -->
<!-- Search -->
<!-- ============================================================== -->
<!-- <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
	<form class="app-search position-absolute">
		<input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
	</form>
</li> -->

</ul>
<!-- ============================================================== -->
<!-- Right side toggle and nav items -->
<!-- ============================================================== -->
<ul class="navbar-nav float-right">
	<!-- ============================================================== -->
	<!-- create new -->
	<!-- ============================================================== -->
	<!-- <li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="mdi mdi-bell font-24"></i>
		</a>
		<div class="dropdown-menu dropdown-menu-right  animated bounceInDown" aria-labelledby="navbarDropdown">
			<a class="dropdown-item" href="#"><i class="flag-icon flag-icon-us"></i> English</a>
			<a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a>
			<a class="dropdown-item" href="#"><i class="flag-icon flag-icon-es"></i> Spanish</a>
			<a class="dropdown-item" href="#"><i class="flag-icon flag-icon-de"></i> German</a>
		</div>
	</li> -->
	<!-- ============================================================== -->
	<!-- Comment -->
	<!-- ============================================================== -->

	<!-- ============================================================== -->
	<!-- End Comment -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- Messages -->
	<!-- ============================================================== -->

	<!-- ============================================================== -->
	<!-- End Messages -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- User profile and search -->
	<!-- ============================================================== -->
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../../assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
		<div class="dropdown-menu dropdown-menu-right user-dd  flipInY"> <!-- i remove animated flipInY -->
			<span class="with-arrow"><span class="bg-primary"></span></span>
			<div class="d-flex no-block align-items-center p-15 bg-default text-white mb-2" style="background-image: linear-gradient(to right, #017fbf , #072f4e);">
				<div class=""><img src="../../assets/images/users/1.jpg" alt="user" class="img-circle" width="60"></div>
				<div class="ml-2">
					<h4 class="mb-0"> <?= $fullname;?> </h4>
					<p class=" mb-0"> <?= $status;?> </p>
				</div>
			</div>
			<!-- <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user mr-1 ml-1"></i> My Profile</a>
			<a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet mr-1 ml-1"></i> My Balance</a>
			<a class="dropdown-item" href="javascript:void(0)"><i class="ti-email mr-1 ml-1"></i> Inbox</a> -->
			<!-- <div class="dropdown-divider"></div> -->
			<a class="dropdown-item" href="<?= base_url();?>account_setting"><i class="ti-settings mr-1 ml-1"></i> Account Setting</a>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="<?= base_url();?>login/logout"><i class="fa fa-power-off mr-1 ml-1"></i> Logout</a>
			<!-- <div class="dropdown-divider"></div> -->
			<!-- <div class="pl-4 p-10"><a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded">View Profile</a></div> -->
		</div>
	</li>
	<!-- ============================================================== -->
	<!-- User profile and search -->
	<!-- ============================================================== -->
</ul>
</div>
</nav>
</header>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
	<!-- Sidebar scroll-->
	<div class="scroll-sidebar">
		<!-- Sidebar navigation-->
		<nav class="sidebar-nav">
			<ul id="sidebarnav">
				<!-- User Profile-->
				<li>
					<!-- User Profile-->
					<div class="user-profile d-flex no-block dropdown mt-3">
						<div class="user-pic"><img src="../../assets/images/users/1.jpg" alt="users" class="rounded-circle" width="40" /></div>
						<div class="user-content hide-menu ml-2">
							<a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<h5 class="mb-0 user-name font-medium"> <?= $fullname;?> <i class="fa fa-angle-down"></i></h5>
								<span class="op-5 user-email"><span class="__cf_email__" data-cfemail="89ffe8fbfce7c9eee4e8e0e5a7eae6e4"> <?= $status;?> </span></span>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
								<!-- <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user mr-1 ml-1"></i> My Profile</a>
								<a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet mr-1 ml-1"></i> My Balance</a>
								<a class="dropdown-item" href="javascript:void(0)"><i class="ti-email mr-1 ml-1"></i> Inbox</a> -->
								<!-- <div class="dropdown-divider"></div> -->
								<a class="dropdown-item" href="<?= base_url();?>account_setting"><i class="ti-settings mr-1 ml-1"></i> Account Setting</a>
								<!-- <div class="dropdown-divider"></div> -->
								<!-- <a class="dropdown-item" href="<?= base_url();?>login/logout"><i class="fa fa-power-off mr-1 ml-1"></i> Logout</a> -->
							</div>
						</div>
					</div>
					<!-- End User Profile-->
				</li>
				<li class="sidebar-item"> 
					<a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url();?>" aria-expanded="false">
						<i class="fas fa-home"></i>
						<span class="hide-menu">  Home</span>
					</a>
				</li>

				<?php if ($status == 'admin'){ ?>

					<li class="sidebar-item"> 
						<a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
							<i class="fas fa-users"></i>
							<span class="hide-menu"> User Management</span>
						</a>

						<ul aria-expanded="false" class="collapse first-level">

							<li class="sidebar-item">
								<a href="<?= base_url();?>users" class="sidebar-link">
									<i class="fas fa-angle-double-right"></i>
									<span class="hide-menu"> Show Users</span>
								</a>
							</li>

							<li class="sidebar-item">
								<a href="<?= base_url();?>users/user_access" class="sidebar-link">
									<i class="fas fa-angle-double-right"></i>
									<span class="hide-menu"> Access Control</span>
								</a>
							</li>
							<li class="sidebar-item">
								<a href="#" onclick="$('#AM_modal').modal('show');" class="sidebar-link">
									<i class="fas fa-angle-double-right"></i>
									<span class="hide-menu"> Add Module</span>
								</a>
							</li>
							<li class="sidebar-item">
								<a href="<?= base_url();?>city/index" class="sidebar-link">
									<i class="fas fa-angle-double-right"></i>
									<span class="hide-menu"> Manage City</span>
								</a>
							</li>
						</ul>
					</li>
				<?php } if (in_array("pop", access_cat() )){ ?>
					<li class="sidebar-item"> 
						<a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
							<i class="fas fa-map-marker-alt"></i>
							<span class="hide-menu"> POPs</span>
						</a>

						<ul aria-expanded="false" class="collapse first-level">
							<?php if (in_array("pop", access_subCat() )){ ?>
								<li class="sidebar-item">
									<a href="<?= base_url();?>pop" class="sidebar-link">
										<i class="fas fa-angle-double-right"></i>
										<span class="hide-menu"> Show POPs</span>
									</a>
								</li>
							<?php } if (in_array("epi", access_subCat() )){ ?>
								<li class="sidebar-item">
									<a href="<?= base_url();?>pop/epi" class="sidebar-link">
										<i class="fas fa-angle-double-right"></i>
										<span class="hide-menu"> EPI</span>
									</a>
								</li>
							<?php } ?>
						</ul>
					</li>
				<?php } if (in_array("vlan", access_cat() )){ ?>
					<li class="sidebar-item"> 
						<a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
							<i class="fas fa-sitemap"></i>
							<span class="hide-menu"> VLANs</span>
						</a>
						<ul aria-expanded="false" class="collapse first-level">
							<?php if (in_array("segment", access_subCat() )){ ?>
								<li class="sidebar-item">
									<a onclick="$('#addnewseg').modal('show')" href="#" class="sidebar-link">
										<i class="fas fa-angle-double-right"></i>
										<span class="hide-menu"> Add Segment</span>
									</a>
								</li>
							<?php } if (in_array("vlan dealer", access_subCat() )){ ?>
								<li class="sidebar-item">
									<a href="<?= base_url();?>dealer_vlan" class="sidebar-link">
										<i class="fas fa-angle-double-right"></i>
										<span class="hide-menu"> Dealer VLANs</span>
									</a>
								</li>
								<!--  -->
								
								<!-- <li class="sidebar-item">
									<a href="<?= base_url();?>corporate_vlan" class="sidebar-link">
										<i class="fas fa-angle-double-right"></i>
										<span class="hide-menu"> Corporate VLANs</span>
									</a>
								</li> -->
							<?php } if (in_array("vlan office", access_subCat() )){ ?>
								<li class="sidebar-item">
									<a href="<?= base_url();?>office_vlan" class="sidebar-link">
										<i class="fas fa-angle-double-right"></i>
										<span class="hide-menu"> Office VLANs</span>
									</a>
								</li>
							<?php } ?>
						</ul>
					</li>
				<?php } if (in_array("corporate", access_cat() )){ ?>
					<li class="sidebar-item"> 
						<a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url();?>corporate_vlan" aria-expanded="false">
							<i class="fas fa-sitemap"></i>
							<span class="hide-menu"> Corporate </span>
						</a>
					</li>
				<?php } if (in_array("switch", access_cat() )){ ?>
					<li class="sidebar-item"> 
						<a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
							<i class="fas fa-server"></i>
							<span class="hide-menu"> Switch Logon</span>
						</a>
						<ul aria-expanded="false" class="collapse first-level">
							<li class="sidebar-item">
								<a href="<?php echo base_url();?>switches" class="sidebar-link">
									<i class="fas fa-angle-double-right"></i>
									<span class="hide-menu"> All Switch</span>
								</a>
							</li>
							<?php  if (in_array("free ips", access_subCat() )){ ?>
								<li class="sidebar-item">
									<a href="<?php echo base_url();?>switches/free_ips" class="sidebar-link">
										<i class="fas fa-angle-double-right"></i>
										<span class="hide-menu"> Free IPs</span>
									</a>
								</li>
							<?php } ?>
						</ul>
					</li>
				<?php } if (in_array("SwitchSpark", access_cat() )){ ?>
					<li class="sidebar-item"> 
						<a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
							<i class="fas fa-server"></i>
							<span class="hide-menu"> Switch Spark</span>
						</a>
						<ul aria-expanded="false" class="collapse first-level">
							<li class="sidebar-item">
								<a href="<?php echo base_url();?>switches_spark" class="sidebar-link">
									<i class="fas fa-angle-double-right"></i>
									<span class="hide-menu"> All Switch</span>
								</a>
							</li>
							<?php  if (in_array("free ips", access_subCat() )){ ?>
								<li class="sidebar-item">
									<a href="<?php echo base_url();?>switches_spark/free_ips" class="sidebar-link">
										<i class="fas fa-angle-double-right"></i>
										<span class="hide-menu"> Free IPs</span>
									</a>
								</li>
							<?php } ?>
						</ul>
					</li>
				<?php } if (in_array("NAS", access_cat() )){ ?>
					<li class="sidebar-item"> 
						<a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url();?>nas" aria-expanded="false">
							<i class="fas fa-sitemap"></i>
							<span class="hide-menu"> NAS | Server </span>
						</a>
					</li>
				<?php } ?>
			</ul>
			<div class="hide-menu" id="navfooter">powered by <img src="<?= base_url();?>assets/images/logon.png" style="width: 60px;"></div>
		</nav>
		<!-- End Sidebar navigation -->
	</div>
	<!-- End Sidebar scroll-->
</aside>

<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ==============================================================