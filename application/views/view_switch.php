<?php $this->load->view('header'); ?>
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
					<h4 class="page-title">Switch Details</h4>
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

        		<div class="col-md-12 col-xs-12">
        			<div class="card">
        				<div class="card-body">
        					<table class="table table-bordered">
        						<tr>
        							<td><b>Switch Name</b></td>
        							<td><?= $data->switch_name?></td>
        						</tr>
        						<tr>
        							<td><b>IP Address</b></td>
        							<td><?= $data->ip_address;?></td>
        						</tr>
        						<tr>
        							<td><b>Dealer</b></td>
        							<td><?= $data->dealer;?></td>
        						</tr>
        						<tr>
        							<td><b>Area</b></td>
        							<td><?= $data->area;?></td>
        						</tr>
        						<tr>
        							<td><b>Version</b></td>
        							<td><?= $data->version;?></td>
        						</tr>
        						<tr>
        							<td><b>Model</b></td>
        							<td><?= $data->model;?></td>
        						</tr>
        						<tr>
        							<td><b>Primary POP</b></td>
        							<td><?= $prim_pop;?></td>
        						</tr>
        						<tr>
        							<td><b>Secondary POP</b></td>
        							<td><?= $sec_pop;?></td>
        						</tr>
        						<tr>
        							<td><b>VLAN</b></td>
        							<td><?= $data->vlan;?></td>
        						</tr>
        						<tr>
        							<td><b>Connected To</b></td>
        							<td><?= $data->connected_to;?></td>
        						</tr>
                                <tr>
                                    <td><b>City</b></td>
                                    <td><?= $city['city_name'];?></td>
                                </tr>
        						<tr>
        							<td><b>Stack Switch</b></td>
        							<?php if($data->stack_switch == 'yes'){ 
        								$color = '#55e455';$class = 'fa-check-circle';
        							}else{
        								$color='#bcbfbc';$class = 'fa-circle';
        							};?> 
        							<td><i class="fas <?= $class;?>" style="color: <?= $color;?>"></i></td>
        						</tr>
        						<tr>
        							<td><b>Ether-Channel</b></td>
        							<?php if($data->ether_channel == 'yes'){ 
        								$color = '#55e455';$class = 'fa-check-circle';
        							}else{
        								$color='#bcbfbc';$class = 'fa-circle';
        							};?> 
        							<td><i class="fas <?= $class;?>" style="color: <?= $color;?>"></i></td>
        						</tr>
        						<tr>
        							<td><b>Last Update</b></td>
        							<td><?= $data->last_update;?></td>
        						</tr>
        						
        						<tr>
        							<td><b>Last Ping Response</b></td>
        							<?php 
                                    $pingRes = (empty($ping) ?  'no ping' :  $ping->ping_response);
                                    $lastping = (empty($ping) ?  '' :  $ping->last_update);
                                     ?>
        							<td><span id="pRes"><?= $pingRes;?> | last ping <?= $lastping;?> </span> | <button class="btn btn-warning btn-xs pingit" data-ip="<?= $data->ip_address;?>">ping</button></td>
        						</tr>
        					</table>
        					
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
        	$('.pingit').click(function(){
        		var loader = `<img width="25px" src="<?php echo base_url();?>assets/img/loading.gif" alt="loading...">`;
        		$("#pRes").html(loader);
        		$ip = $(this).attr('data-ip');
        		$.ajax({
        			type: "POST",
        			url: "<?= base_url();?>Switches/ping_switch",
        			data:'ip='+$ip,
	//for posting multiple variable
	// data:'name='+val+'&age='+age,
	success: function(data){
		// for get return data
		$("#pRes").html(data);
	}
});
        	});
        </script>