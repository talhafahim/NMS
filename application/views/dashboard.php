<?php $this->load->view('header'); ?>

<style type="text/css">
	.card{
		background-color: #e8eaed !important;
	}
	a.nostyle:link {
		text-decoration: none;
		color: #3e5569;
		cursor: auto;
	}
	a.nostyle:visited {
		text-decoration: none;
		color: #3e5569;
		cursor: auto;
	}
	
</style>
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
					<h4 class="page-title">LOGON NETWORK MANAGEMENT SYSTEM</h4>
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
        		<?php  if (in_array("pop", access_subCat() )){ ?>
        			<div class="col-sm-12 col-lg-4">
        				<div class="card card-hover">
        					<a href="<?= base_url();?>pop" class="nostyle">
        						<div class="card-body">
        							<div class="d-flex align-items-center">
        								<div class="mr-2">
        									<span>Total POPs</span>
        									<h2><?= $pops;?></h2>
        								</div>
        								<div class="ml-auto">
        									<!-- <div class="" id="ravenue">fsdf</div> -->
        									<div class="mr-2"><span class="text-blue display-5"><i class="fas fa-map-marker-alt"></i></span></div>
        								</div>
        							</div>
        						</div>
        					</a>
        				</div>
        			</div>
        		<?php } if (in_array("vlan dealer", access_subCat() )){  ?>
        			<div class="col-sm-12 col-lg-4">
        				<div class="card card-hover">
        					<a href="<?= base_url();?>dealer_vlan" class="nostyle">
        						<div class="card-body">
        							<div class="d-flex align-items-center">
        								<div class="mr-2">
        									<span>Dealer VLANs</span>
        									<h2><?= $dealerVLAN;?></h2>
        								</div>
        								<div class="ml-auto">
        									<!-- <div class="" id="ravenue"></div> -->
        									<div class="mr-2"><span class="text-blue display-5"><i class="fas fa-sitemap"></i></span></div>
        								</div>
        							</div>
        						</div>
        					</a>
        				</div>
        			</div>
        		<?php } if (in_array("vlan office", access_subCat() )){ ?>
        			<div class="col-sm-12 col-lg-4">
        				<div class="card card-hover">
        					<a href="<?= base_url();?>office_vlan" class="nostyle">
        						<div class="card-body">
        							<div class="d-flex align-items-center">
        								<div class="mr-2">
        									<span>Office VLANs</span>
        									<h2><?= $officeVLAN;?></h2>
        								</div>
        								<div class="ml-auto">
        									<!-- <div class="" id="ravenue"></div> -->
        									<div class="mr-2"><span class="text-blue display-5"><i class="fas fa-sitemap"></i></span></div>
        								</div>
        							</div>
        						</div>
        					</a>
        				</div>
        			</div>
        		<?php }?>
        	</div>
        	<div class="row">
        		<?php if (in_array("corporate", access_cat() )){ ?>
        			<div class="col-md-5 col-sm-6">
        				<div class="card card-hover">
        					<a href="<?= base_url();?>corporate_vlan" class="nostyle">
        						<div class="card-body">
        							<div class="d-md-flex align-items-center">
        								<div>
        									<h4 class="card-title">Corporate VLAN</h4>
        									<!-- <h5 class="card-subtitle">Overview of Email Campaigns</h5> -->
        								</div>

        							</div>
        							<!-- column -->
        							<div class="row mt-5">
        								<!-- column -->
        								<div class="col-lg-6">
        									<div id="visitor" style="height:290px; width:100%;" class="mt-3"></div>
        								</div>
        								<!-- column -->
        								<div class="col-lg-6">
        									<h1 class="display-6 mb-0 font-medium"><?= $corpTotal;?></h1>
        									<span>Corporate VLANs by Services</span>
        									<ul class="list-style-none">
        										<?php foreach($corparray as $corpvalue){?>
        											<li class="mt-3"><i class="fas fa-circle mr-1 font-12" style="color:<?= $corpvalue['color'];?>"></i> <?= $corpvalue['name']?> <span class="float-right"><?= $corpvalue['count']?></span></li>
        										<?php } ?>
        									</ul>
        								</div>
        							</div>
        							<!-- column -->
        						</div>
        					</a>
        				</div>
        			</div>
        		<?php } if (in_array("switch", access_cat() )){ ?>
        			<div class="col-md-3 col-sm-6">
        				<div class="card card-hover" style="height: 425px;">
        					<a href="<?= base_url();?>switches" class="nostyle">
        						<div class="card-body" >
        							<div class="pt-3 text-center">
        								<i class="fas fa-server" style="font-size: 3.5rem;"></i>
        								<span class="display-4 d-block font-medium" id="allswit">0</span>
        								<span>Total Switches</span>
        								<!-- Progress -->
        								<div class="progress mt-5" style="height:4px;">

        								</div>
        								<!-- Progress -->
        								<!-- row -->
        								<div class="row mt-4 mb-3">
        									<!-- column -->
        									<div class="col-6 border-right text-left">
        										<h3 class="mb-0 font-medium" id="reach">0%</h3><small><i class="fa fa-circle faa-flash animated pop" style="font-size: 10px;color: #28a745;"></i> Reachable</small></div>
        										<!-- column -->
        								<!-- <div class="col-4 border-right">
        									<h3 class="mb-0 font-medium">28%</h3>Mobile
        								</div> -->
        								<!-- column -->
        								<div class="col-6 text-right">
        									<h3 class="mb-0 font-medium" id="unreach">0%</h3><small><i class="fa fa-circle faa-flash animated pop" style="font-size: 10px;color: #dc3545;"></i> Unreachable</small></div>
        								</div>
        								<a href="<?= base_url();?>switches" class="waves-effect waves-light mt-3 btn btn-xs btn-info accent-4 mb-3">View More Details</a>
        							</div>
        						</div>
        					</a>
        				</div>
        			</div>
        		<?php } ?>
        		<div class="col-md-4 col-sm-6">
        			<div class="card card-hover" style="height: 425px;">
        				<div class="card-body">
        					<h4 class="card-title">Last Update</h4>
        					<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        						<?php if (in_array("vlan dealer", access_subCat() )){?>
        						<li class="nav-item">
        							<a class="nav-link active" onclick="get_lastUpdate('get_dealerVLAN','dealerVLAN')" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Dealer VLAN</a>
        						</li>
        					<?php } if (in_array("corporate", access_cat() )){ ?>
        						<li class="nav-item">
        							<a class="nav-link" onclick="get_lastUpdate('get_corpVLAN','corpVLAN')" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Corporate VLAN</a>
        						</li>
        					<?php } if (in_array("switch", access_cat() )){?>
        						<li class="nav-item">
        							<a class="nav-link" onclick="get_lastUpdate('get_switch','switch')" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Switch</a>
        						</li>
        					<?php } ?>
        					</ul>
        					<div class="tab-content" id="pills-tabContent">
        						<?php if (in_array("vlan dealer", access_subCat() )){?>
        						<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" style="overflow-y: auto;height: 295px;">
        							<table class="table table-striped table-bordered" id="dealerVLAN">
        								<thead>
        									<tr>
        										<th>IP</th><th>Date Time</th>	
        									</tr>
        								</thead>
        								<tbody>
                            							<!-- <tr>
                            								<td>192.168.100.2</td><td>2020-09-21 12:00:00</td>
                            							</tr> -->
                            							
                            						</tbody>
                            					</table>
                            				</div>
                            			<?php } if (in_array("corporate", access_cat() )){?>
                            				<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" style="overflow-y: auto;height: 295px;">
                            					<table class="table table-striped table-bordered" id="corpVLAN">
                            						<thead>
                            							<tr>
                            								<th>IP</th><th>Date Time</th>	
                            							</tr>
                            						</thead>
                            						<tbody>
                            							<!-- <tr>
                            								<td>192.168.100.2</td><td>2020-09-21 12:00:00</td>
                            							</tr> -->
                            							
                            						</tbody>
                            					</table>
                            				</div>
                            			<?php } if (in_array("switch", access_cat() )){?>
                            				<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" style="overflow-y: auto;height: 295px;">
                            					<table class="table table-striped table-bordered" id="switch">
                            						<thead>
                            							<tr>
                            								<th>IP</th><th>Date Time</th>	
                            							</tr>
                            						</thead>
                            						<tbody>
                            							<!-- <tr>
                            								<td>192.168.100.2</td><td>2020-09-21 12:00:00</td>
                            							</tr> -->
                            							
                            						</tbody>
                            					</table>
                            				</div>
                            			<?php } ?>
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
                    <?php $this->load->view('footer');?>
                    <!--chartis chart-->
                    <script src="<?= base_url();?>assets/libs/chartist/dist/chartist.min.js"></script>
                    <script src="<?= base_url();?>assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
                    <!--c3 charts -->
                    <script src="<?= base_url();?>assets/extra-libs/c3/d3.min.js"></script>
                    <script src="<?= base_url();?>assets/extra-libs/c3/c3.min.js"></script>
                    <!--chartjs -->
                    <!-- <script src="<?= base_url();?>dist/js/pages/dashboards/dashboard1.js"></script> -->
                    <script type="text/javascript">
                    	$(document).ready(function(){
                    		var loader1 = `<img src="<?php echo base_url();?>assets/img/loading.gif" alt="loading..." style="width:40px;">`;
                    		var loader2 = `<img src="<?php echo base_url();?>assets/img/loading.gif" alt="loading..." style="width:30px;">`;
                    		$("#allswit").html(loader1);
                    		$("#reach,#unreach").html(loader2);
                    		get_switch();
                    		get_lastUpdate("get_dealerVLAN","dealerVLAN");
                    	});
                    	function get_switch() {
                    		$.ajax({
                    			dataType: "json",
                    			type: "POST",
                    			url: "<?= base_url();?>Dashboard/switch",
                    			success: function(data){
                    				$("#allswit").html(data.switch);
                    				$("#reach").html(data.reach+"%");
                    				$("#unreach").html(data.unreach+"%");
                    				setTimeout(function(){ get_switch(); }, 5000);
                    			}
                    		});
                    	}
                    	//
                    	function get_lastUpdate($function,$table){
                    		var loader = `<tr><td colspan="2"><center><img src="<?php echo base_url();?>assets/img/loading.gif" alt="loading..." style="width:40px;"></center></td></tr>`;
                    		$("#"+$table+" tbody").html(loader);
                    		$.ajax({
                    			type: "POST",
                    			url: "<?= base_url();?>Dashboard/"+$function,
                    			success: function(data){
                    				$("#"+$table+" tbody").html(data);
                    			}
                    		});	
                    	}
                    </script>
                    <script type="text/javascript">
                    	$(function() {
                    		"use strict";
    // ============================================================== 
    // Newsletter
    // ============================================================== 

    var chart = new Chartist.Line('.campaign', {
    	labels: [1, 2, 3, 4, 5, 6, 7, 8],
    	series: [
    	[0, 5, 6, 8, 25, 9, 8, 24],
    	[0, 3, 1, 2, 8, 1, 5, 1]
    	]
    }, {
    	low: 0,
    	high: 28,

    	showArea: true,
    	fullWidth: true,
    	plugins: [
    	Chartist.plugins.tooltip()
    	],
    	axisY: {
    		onlyInteger: true,
    		scaleMinSpace: 40,
    		offset: 20,
    		labelInterpolationFnc: function(value) {
    			return (value / 1) + 'k';
    		}
    	},

    });

    // Offset x1 a tiny amount so that the straight stroke gets a bounding box
    // Straight lines don't get a bounding box 
    // Last remark on -> http://www.w3.org/TR/SVG11/coords.html#ObjectBoundingBox
    chart.on('draw', function(ctx) {
    	if (ctx.type === 'area') {
    		ctx.element.attr({
    			x1: ctx.x1 + 0.001
    		});
    	}
    });

    // Create the gradient definition on created event (always after chart re-render)
    chart.on('created', function(ctx) {
    	var defs = ctx.svg.elem('defs');
    	defs.elem('linearGradient', {
    		id: 'gradient',
    		x1: 0,
    		y1: 1,
    		x2: 0,
    		y2: 0
    	}).elem('stop', {
    		offset: 0,
    		'stop-color': 'rgba(255, 255, 255, 1)'
    	}).parent().elem('stop', {
    		offset: 1,
    		'stop-color': 'rgba(64, 196, 255, 1)'
    	});
    });


    var chart = [chart];
    
    // ============================================================== 
    // Our Visitor
    // ============================================================== 

    var chart = c3.generate({
    	bindto: '#visitor',
    	data: {
    		columns: [
    		<?php foreach($corparray as $corpvalue){
    			echo "['".$corpvalue['name']."',".$corpvalue['per']."],";
    		}?>
    		// ['talha', 25],
    		// ['Clicked', 25],
    		// ['Un-opened', 25],
    		// ['Bounced', 25],


    		],

    		type: 'donut',
    		tooltip: {
    			show: true
    		}
    	},
    	donut: {
    		label: {
    			show: false
    		},
    		title: "Ratio",
    		width: 35,

    	},

    	legend: {
    		hide: true
            //or hide: 'data1'
            //or hide: ['data1', 'data2']
            
        },
        color: {
        	pattern: [
        	<?php foreach($corparray as $corpvalue){
        		echo "'".$corpvalue['color']."',";
        	}?>
        	// '#40c4ff', '#2961ff', '#3e5569', '#7e74fb'
        	]
        }
    });
    // ============================================================== 
});
</script>