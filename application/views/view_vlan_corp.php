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
                    <h4 class="page-title">Corporate VLAN Details</h4>
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
                <div class="col-md-3 col-xs-3">
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item"><b>IP Address</b></li>
                                <li class="list-group-item"><b>IP Range</b></li>
                                <li class="list-group-item"><b>Subnet</b></li>
                                <li class="list-group-item"><b>Total IPs</b></li>
                                <li class="list-group-item"><b>Corporate Name</b></li>
                                <li class="list-group-item"><b>Location</b></li>
                                <li class="list-group-item"><b>Email</b></li>
                                <li class="list-group-item"><b>POC</b></li>
                                <li class="list-group-item"><b>Vlan Name</b></li>
                                <li class="list-group-item"><b>Vlan ID</b></li>
                                <li class="list-group-item"><b>Package</b></li>
                                <li class="list-group-item"><b>Bandwidth</b></li>
                                <li class="list-group-item"><b>Primary POP</b></li>
                                <li class="list-group-item"><b>Secondary POP</b></li>
                                <li class="list-group-item"><b>last Update</b></li>
                            </ul>
                        </div>
                    </div>
                </div>
                 <div class="col-md-9 col-xs-9">
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item"><?= $data->ip_address?></li>
                                <li class="list-group-item"><?= $data->ip_range;?></li>
                                <li class="list-group-item"><?= $data->subnet?></li>
                                <li class="list-group-item"><?= $data->total_ips?></li>
                                <li class="list-group-item"><?= $data->corporate;?></li>
                                <li class="list-group-item"><?= $data->area;?></li>
                                <li class="list-group-item"><?= $data->email?></li>
                                <li class="list-group-item"><?= $data->poc?></li>
                                <li class="list-group-item"><?= $data->vlan_name;?></li>
                                <li class="list-group-item"><?= $data->vlan_id?></li>
                                <li class="list-group-item"><?= $data->pkg;?>MB</li>
                                <li class="list-group-item"><?= $data->bandwidth;?></li>
                                <li class="list-group-item"><?= $prim_pop;?></li>
                                <li class="list-group-item"><?= $sec_pop;?></li>
                                <li class="list-group-item"><?= $data->last_update;?></li>
                            </ul>
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