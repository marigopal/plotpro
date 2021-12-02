<?php
include ("../include/menu/menu.php");
$id = $_GET['id'];
// $sql = "SELECT * FROM `tbl_leads` WHERE `is_active` = '1' AND `is_deleted` = '0' AND `lead_id` = '$id'";
// //echo $sql;
// $result = mysqli_query($con, $sql); // select query
// $data = mysqli_fetch_array($result);
include ("modal/modals_task.php");
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lead Task</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/_lead_user/index">Leads</a></li>
                        <li class="breadcrumb-item active">Lead Task</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-primary">

                <div class="card-body">
                   <form id="update_leads" method="post">  
                   <div class="row" hidden="">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Logged ID</label>
                                <input type="text" class="form-control" id="leads_logged" name="leads_logged" >
                            </div>
                        </div>
                    </div>
                    <div class="row" hidden="">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Unique ID</label>
                                <input type="text" class="form-control" id="leads_uid" name="leads_uid" placeholder="ID"  >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-3">
                            <div class="form-group">
                                <label>Title</label>
                                <select class="form-control" id="leads_title" name="leads_title">
                                
                                    <option value="Ms">Ms</option>
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>
                                </select>
                            </div>
                        </div>
                         <div class="col-12 col-sm-3">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" id="leads_firstname" name="leads_firstname" placeholder="First Name" value="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="form-group">
                                <label>Mid Name</label>
                                <input type="text" class="form-control" id="leads_midname" name="leads_midname" placeholder="Middle Name" >
                            </div>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" id="leads_lastname" name="leads_lastname" placeholder="Last Name" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Address Line1</label>
                                <input type="text" class="form-control" id="leads_address1" name="leads_address1" placeholder="Address Line 1" >
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Address Line2</label>
                                <input type="text" class="form-control" id="leads_address2" name="leads_address2" placeholder="Address Line 2" >
                            </div>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>City </label>
                                <input type="text" class="form-control" id="leads_city" name="leads_city" placeholder="City Name" >
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>State</label>
                                <input type="text" class="form-control" id="leads_state" name="leads_state" placeholder="State Number" >
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>Zipcode</label>
                                <input type="text" class="form-control" id="leads_zipcode" name="leads_zipcode" placeholder="Zipcode" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>Phone </label>
                                <input type="text" class="form-control" id="leads_phone" name="leads_phone" placeholder="Phone Number" >
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="text" class="form-control" id="leads_mobile" name="leads_mobile" placeholder="Mobile Number" >
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="text" class="form-control" id="leads_email" name="leads_email" placeholder="Email Address" >
                            </div>
                        </div>
                    </div>
                    <div class="row d-none">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Managed By</label>
                                
                                <input type="text" class="form-control" id="managed_by" name="managed_by" placeholder="" >
                                
                                    
                                
                            </div>
                        </div>
                       
                    </div>  
                   
                    <div class="row">
                        <div class="col-md-12">
                            <div class="modal-footer pull-right">
                                <button type="submit" class="btn btn-primary" id="update_leads">Save</button>
                            </div>
                        </div>
                    </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div id="payment_section" class="hidden">
    <section class="content" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                             <h5>Tasks List</h5>
                             <a href="#" data-toggle="modal" data-target="#leads_project_modal"><img src="/img/add_row.png" alt="Smiley face" height="25" width="25" data-toggle="modal" data-target="#new_users" title="New"></a>
                        </div>
                        <div class="card-body">
                            <table id="leads_task_report" class="table table-bordered table-striped">
                            <thead>
                                    <tr>
                                        <th>#</th>
                                        <th hidden="">ID</th>
                                        <th>Date</th>
                                        <th>Project</th>
                                        <th>Lead</th>
                                        <th>Status</th>
                                        <th>Managed By</th>
                                        <th>Action</th>
                                       
                                    </tr>
                                </thead>
                            <tbody id="_index_task_report">
                                

                            </tbody>
</table>

                            

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>
    <!-- Main content -->

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include ('../include/footer.php'); ?>
<script src="jquery/common.js" type="text/javascript"></script>
<script src="jquery/_index_tasks.js" type="text/javascript"></script>

