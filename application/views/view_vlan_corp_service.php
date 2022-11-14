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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <center><h3>Other Service</h3></center>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-3">
                    <center><i class="fas fa-sitemap" style="font-size: 100px;margin:15px;"></i></center>
                    <!-- <div class="card">
                        <div class="card-body">
                            <ul class="list-group">
                            <li class="list-group-item"><b>Corporate Name</b></li>
                            <li class="list-group-item"><b>Sub Corporate</b></li>
                            <li class="list-group-item"><b>Primary POP</b></li>
                            <li class="list-group-item"><b>Secondary POP</b></li>
                            <li class="list-group-item"><b>VLAN ID</b></li>
                            <li class="list-group-item"><b>Service</b></li>
                            <li class="list-group-item"><b>Location</b></li>
                            <li class="list-group-item"><b>Email</b></li>
                            <li class="list-group-item"><b>POC</b></li>
                            <li class="list-group-item"><b>Last Update</b></li>
                                
                            </ul>
                        </div>
                    </div> -->
                </div>
                 <div class="col-md-9 col-xs-9">
                    <div class="card">
                        <div class="card-body">
                            <!-- <ul class="list-group">
                                <li class="list-group-item"><?= $data->corp_name;?></li>
                                <li class="list-group-item"><?= $data->sub_corp;?></li>
                                <li class="list-group-item"><?= $prim_pop;?></li>
                                <li class="list-group-item"><?= $sec_pop;?></li>
                                <li class="list-group-item"><?= $data->vlan_id;?></li>
                                <li class="list-group-item"><?= $data->service;?></li>
                                <li class="list-group-item"><?= $data->location;?></li>
                                <li class="list-group-item"><?= $data->email;?></li>
                                <li class="list-group-item"><?= $data->poc;?></li>
                                <li class="list-group-item"><?= $data->last_update;?></li>
                               
                                
                            </ul> -->
                            <table class="table table-bordered">
                                <tr>
                                    <td><b>Corporate Name</b></td><td><?= $data->corp_name?></td>
                                </tr>
                                <tr>
                                    <td><b>Sub Corporate</b></td><td><?= $data->sub_corp?></td>
                                </tr>
                                <tr>
                                    <td><b>Primary POP</b></td><td><?= $prim_pop?></td>
                                </tr>
                                <tr>
                                    <td><b>Secondary POP</b></td><td><?= $sec_pop?></td>
                                </tr>
                                <tr>
                                    <td><b>Vlan ID</b></td><td><?= $data->vlan_id?></td>
                                </tr>
                                <tr>
                                    <td><b>Service</b></td><td><?= $data->service?></td>
                                </tr>
                                <tr>
                                    <td><b>Location</b></td><td><?= $data->location?></td>
                                </tr>
                                <tr>
                                    <td><b>Email</b></td><td><?= $data->email?></td>
                                </tr>
                                <tr>
                                    <td><b>POC</b></td><td><?= $data->poc?></td>
                                </tr>
                                <tr>
                                    <td><b>Latitude</b></td><td><?= $data->latitude;?></td>
                                </tr>
                                <tr>
                                    <td><b>Longitude</b></td><td><?= $data->longitude;?></td>
                                </tr>
                                <tr>
                                    <td><b>Connected To</b></td><td><?= $data->connected_to;?></td>
                                </tr>
                                <tr>
                                    <td><b>Last Update</b></td><td><?= $data->last_update?></td>
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