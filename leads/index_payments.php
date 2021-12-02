<?php
include ("../include/menu/menu.php");
$id = $_GET['id'];
$sql = "SELECT * FROM `tbl_leads` WHERE `is_active` = '1' AND `is_deleted` = '0' AND `lead_id` = '$id'";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_array($result);
include ("modal/modals_payments.php");
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lead Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/leads/index">Leads</a></li>
                        <li class="breadcrumb-item active">Lead Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-body">
                    <form id="update_leads" method="post">  
                        <div class="row" hidden="">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Logged ID</label>
                                    <input type="text" class="form-control" id="leads_logged" name="leads_logged" <?php echo $data['login_user_id']; ?>>
                                </div>
                            </div>
                        </div>
                        <div class="row" hidden="">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Unique ID</label>
                                    <input type="text" class="form-control" id="leads_uid" name="leads_uid" placeholder="ID" value="<?php echo $data['lead_id']; ?>" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-3">
                                <div class="form-group">
                                    <label>Title</label>
                                    <select class="form-control" id="leads_title" name="leads_title">
                                        <option value="<?php echo $data['title']; ?>"><?php echo $data['title']; ?></option>
                                        <option value="Ms">Ms</option>
                                        <option value="Mr">Mr</option>
                                        <option value="Mrs">Mrs</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" id="leads_firstname" name="leads_firstname" placeholder="First Name" value="<?php echo $data['first_name']; ?>">
                                </div>
                            </div>
                            <div class="col-12 col-sm-3">
                                <div class="form-group">
                                    <label>Mid Name</label>
                                    <input type="text" class="form-control" id="leads_midname" name="leads_midname" placeholder="Middle Name" value="<?php echo $data['mid_name']; ?>">
                                </div>
                            </div>
                            <div class="col-12 col-sm-3">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" id="leads_lastname" name="leads_lastname" placeholder="Last Name" value="<?php echo $data['last_name']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Address Line1</label>
                                    <input type="text" class="form-control" id="leads_address1" name="leads_address1" placeholder="Address Line 1" value="<?php echo $data['address1']; ?>">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Address Line2</label>
                                    <input type="text" class="form-control" id="leads_address2" name="leads_address2" placeholder="Address Line 2" value="<?php echo $data['address2']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label>City </label>
                                    <input type="text" class="form-control" id="leads_city" name="leads_city" placeholder="City Name" value="<?php echo $data['city']; ?>">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" class="form-control" id="leads_state" name="leads_state" placeholder="State Number" value="<?php echo $data['state']; ?>">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label>Zipcode</label>
                                    <input type="text" class="form-control" id="leads_zipcode" name="leads_zipcode" placeholder="Zipcode" value="<?php echo $data['zipcode']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label>Phone </label>
                                    <input type="text" class="form-control" id="leads_phone" name="leads_phone" placeholder="Phone Number" value="<?php echo $data['phone']; ?>">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input type="text" class="form-control" id="leads_mobile" name="leads_mobile" placeholder="Mobile Number" value="<?php echo $data['mobile']; ?>">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="text" class="form-control" id="leads_email" name="leads_email" placeholder="Email Address" value="<?php echo $data['email']; ?>">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4 d-none">
                                <div class="form-group">
                                    <label>Managed By</label>
                                    <input type="text" class="form-control" id="managed_by" name="managed_by" placeholder="Email Address" value="<?php echo $data['managed_by']; ?>">
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
                                <h5>Payments List</h5>
                                <a href="#" data-toggle="modal" data-target="#payments_modal_box" onclick="add_payment()"><img src="/img/add_row.png" alt="Smiley face" height="25" width="25" data-toggle="modal" data-target="#new_users" title="New"></a>
                            </div>
                            <div class="card-body">
                                <table id="payments_report" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th hidden="">ID</th>
                                            <th>Date</th>
                                            <th>Project</th>
                                            <th>Plot</th>
                                            <th>Total Cost</th>
                                            <th>Pending Cost</th>
                                            <th>Created By</th>
                                        </tr>
                                    </thead>
                                    <tbody id="_index_payments_report"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php include ('../include/footer.php'); ?>
<script src="jquery/_index_payments.js" type="text/javascript"></script>