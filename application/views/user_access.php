<?php $this->load->view('header'); ?>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>dist/css/switch_btn.css">
    <style type="text/css">
       .accordion .panel-heading{ background: #F2F5F7;
        padding: 13px;
        width: 100%;
        display: block;
    }
    .accordion .panel {
        margin-bottom: 5px;
        border-radius: 0;
        border-bottom: 1px solid #efefef;
    }
    .panel-heading h2{
     font-size: 18px;
     color: #9598a4;
     font-weight: bold;
 }
</style>
</head>
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
                    <h4 class="page-title">User Access</h4>
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

                            <div class="accordion" id="accordion1" role="tablist" aria-multiselectable="true">
                                <!--  -->
                                <?php
                                
                                foreach ($data1 -> result() as $value) {
                                    $id=$value->id;
                                    $username=$value->username;
                                    $status=$value->status;
                                    ?>
                                    <div class="panel">
                                        <a class="panel-heading" role="tab" id="headingOne1" data-toggle="collapse" data-parent="#accordion1" href="#tab<?php echo $id;?>" aria-expanded="true" aria-controls="collapseOne">
                                            <h2><?php echo strtoupper($username);?><small><?php echo " (".$status.")"?></small></h2>
                                        </a>
                                        <div id="tab<?php echo $id;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body table-responsive" style="height: 250px;overflow-y: scroll;">
                                                <table class="table table-striped responsive" style="overflow-x: auto;">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Category</th>
                                                            <th>Module Name</th>
                                                            <th>View</th>
                                                            <th>Create</th>
                                                            <th>Update</th>
                                                            <th>Delete</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $user='user'.$id;
                                                        $num=0;
                                                        
                                                        foreach($data2 -> result() as $value){
                                                            $ser=$value->serial;
                                                            $category=$value->category;
                                                            $module=$value->module;
                                                            $access=$value->$user;
                                                            if($access == 1){
                                                                $check='checked';
                                                            }else{
                                                                $check='';
                                                            }
                                                            $num++;
                                                            ?>
                                                            <tr>
                                                                <th scope="row"><?php echo $num;?></th>
                                                                <td><?php echo ucfirst($category);?></td>
                                                                <td><?php echo $module;?></td>
                                                                <td><!-- Rectangular switch -->
                                                                    <label class="switch">
                                                                        <input type="checkbox" <?php echo $check;?> onchange="flip('<?php echo $module;?>','<?php echo $user;?>')" data-size="mini">
                                                                        <span class="slider"></span>
                                                                    </label>
                                                                </td>
                                                                <?php if(access_crud($module,'create',$id)){
                                                                    $check='checked';
                                                                }else{
                                                                    $check='';
                                                                }?>
                                                                <td><!-- create switch -->
                                                                    <label class="switch">
                                                                        <input type="checkbox" <?php echo $check;?> onchange="crud_flip('<?php echo $module;?>','<?php echo $id;?>','create')" data-size="mini">
                                                                        <span class="slider"></span>
                                                                    </label>
                                                                </td>
                                                                <?php if(access_crud($module,'update',$id)){
                                                                    $check='checked';
                                                                }else{
                                                                    $check='';
                                                                }?>
                                                                <td><!-- create switch -->
                                                                    <label class="switch">
                                                                        <input type="checkbox" <?php echo $check;?> onchange="crud_flip('<?php echo $module;?>','<?php echo $id;?>','update')" data-size="mini">
                                                                        <span class="slider"></span>
                                                                    </label>
                                                                </td>
                                                                <?php if(access_crud($module,'delete',$id)){
                                                                    $check='checked';
                                                                }else{
                                                                    $check='';
                                                                }?>
                                                                <td><!-- create switch -->
                                                                    <label class="switch">
                                                                        <input type="checkbox" <?php echo $check;?> onchange="crud_flip('<?php echo $module;?>','<?php echo $id;?>','delete')" data-size="mini">
                                                                        <span class="slider"></span>
                                                                    </label>
                                                                </td>

                                                            </tr>

                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
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
        <script>
            function flip(mod,user) {
            //
            $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>users/flip",
                data:'module='+mod+'&user='+user,
                success: function(data){
// for get return data
$("#output").html(data);
}
});
        }
    </script>
    <script>
            function crud_flip(mod,user,operation) {
            //
            $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>users/crud_flip",
                data:'module='+mod+'&user='+user+'&operation='+operation,
                success: function(data){
// for get return data
$("#output").html(data);
}
});
        }
    </script>