<?php
include ("../include/menu/menu.php");
$id = decrypt($_GET['id']);
$sql = "SELECT * FROM `tbl_users` WHERE `user_id` = '$id' ";
$result = mysqli_query($con, $sql); 
$data = mysqli_fetch_array($result);
include('modal/userprofile_modals.php')
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
            <!--                  <img class="profile-user-img img-fluid img-circle"
                                   src="../../dist/img/user4-128x128.jpg"
                                   alt="User profile picture">-->
                            </div>
                            <h3 class="profile-username text-center"><?php echo $data['full_name']; ?></h3>
            <!--<p class="text-muted text-center">Software Engineer</p>-->
                        </div>
                    </div>
                    <div class="card card-primary">	
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i>Email</strong>
                            <p class="text-muted">
                                <?php echo $data['email']; ?>
                            </p>
                            <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                            <p class="text-muted">
                                <?php echo $data['address1'];
                                echo '</br>';
                                echo $data['address2'];
                                echo '</br>';
                                echo $data['city'];?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card"><div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <form id="update_userprofile" method="post">  
                                    <div class="row">
                                        <div class="col-12" hidden="">
                                            <div class="form-group">
                                                <label>Users Unique ID</label>
                                                <input type="text" class="form-control" id="user_id" name="user_id" placeholder="User ID" value="<?php echo $data['user_id'];?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-6" >
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name" value="<?php echo $data['full_name'];?>">
                                                <span id="password_check" class="help-block"></span>
                                            </div>
                                        </div>
                                         <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>User Name</label>
                                                <input type="text" class="form-control" id="username" name="username" placeholder="User Name" value="<?php echo $data['username'];?>" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 d-none">
                                            <div class="form-group">
                                                <label>Employee ID</label>
                                                <input type="text" class="form-control" id="emp_id" name="emp_id" placeholder="Employee ID" value="<?php echo $data['employee_id'];?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?php echo $data['city'];?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Mobile Number</label>
                                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" value="<?php echo $data['mobile_number'];?>">
                                                <span id="password_check" class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" value="<?php echo $data['email'];?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Address Line 1</label>
                                                <input type="text" class="form-control" id="address1" name="address1" placeholder="Address Line 1" value="<?php echo $data['address1'];?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Address Line 2</label>
                                                <input type="text" class="form-control" id="address2" name="address2" placeholder="Address Line 2" value="<?php echo $data['address2'];?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                               
                                                <input type="checkbox" class="" id="password_checkbox" name="password_checkbox" data-toggle="modal" data-target="#userprofile_pasword_modal" onclick="update_project('<?= $row[0]; ?>')">
                                                 <label>Are you want to change password?</label>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" >Update</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include ('../include/footer.php'); ?>
<script src="jquery/_index.js" type="text/javascript"></script>
<script src="jquery/_profile.js" type="text/javascript"></script>