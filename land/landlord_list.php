<?php
include ("../include/menu/menu.php");
$id = $_GET['id'];
$sql = "SELECT * FROM `tbl_lands` WHERE `is_deleted` = '0' AND`land_id` = '$id'";
$result = mysqli_query($con, $sql); // select query
$data = mysqli_fetch_array($result);
include ("modal/modals_landlord.php");
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Land Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/land/index">Lands</a></li>
                        <li class="breadcrumb-item active">Land Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-body">
                    <form id="update_land" method="post">  
                        <div class="row" hidden="">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Unique ID</label>
                                    <input type="text" class="form-control" id="land_uid" name="land_uid" placeholder="Land Unique ID" value="<?php echo $data[0]; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Land Name</label>
                                    <input type="text" class="form-control" id="land_name" name="land_name" placeholder="Land Name" value="<?php echo $data[1] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Land Location</label>
                                    <input type="text" class="form-control" id="land_location" name="land_location" placeholder="Land Location" value="<?php echo $data[2] ?>">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Landmark</label>
                                    <input type="text" class="form-control" id="landlord_landmark" name="land_landmark" placeholder="Landmark" value="<?php echo $data[3] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Total Acers</label>
                                    <input type="text" class="form-control" id="land_acers" name="land_acers" placeholder="Land Acers" value="<?php echo $data[6] ?>" onkeyup="calacre_cent(this);">
                                </div>
                                <div class="form-group">
                                    <label>Total Value</label>
                                    <input type="text" class="form-control" id="land_value" name="land_value" placeholder="Land Value" value="<?php echo $data[7] ?>" onchange="num_word(this.value);">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Total Cent</label>
                                    <input type="text" class="form-control" id="land_cent" name="land_cent" placeholder="Land Cent" value="<?php echo $data[9] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Square Feet</label>
                                    <input type="text" class="form-control" id="land_square_feet" name="land_square_feet" placeholder="Square Feet" value="<?php echo $data[8] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row d-none">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Latitude</label>
                                    <input type="text" class="form-control" id="land_latitude" name="land_latitude" placeholder="Land Latitude" value="<?php echo $data[4] ?>">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Longitude</label>
                                    <input type="text" class="form-control" id="land_longitude" name="land_longitude" placeholder="Longitude" value="<?php echo $data[5] ?>">
                                </div>
                            </div>
                        </div>
                        <span id="num_word" name="num_word" class="help-block" style="color:red;font-weight:bold"></span>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="modal-footer pull-right">
                                    <button type="submit" class="btn btn-primary" id="update_land_button">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Landlord List</h5>
                            <a href="#" data-toggle="modal" data-target="#landlord_modal_box"><img src="/img/add_row.png" alt="Smiley face" height="25" width="25" data-toggle="modal" data-target="#new_users" title="New"></a>
                        </div>
                        <div class="card-body">
                            <table id="landlord_report" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th hidden="">ID</th>
                                        <th hidden="">Land ID</th>
                                        <th>Landlord Name</th>
                                        <th>Bought on</th>
                                        <th>Bought Value</th>
                                        <th>Sold on</th>
                                        <th>Sold Value</th>
                                        <th>Bought From</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="_index_landlord_report"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include ('../include/footer.php'); ?>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
<script src="jquery/_landlord_list.js" type="text/javascript"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeABm6C1O66yUCU4Kic0V90EZgP4o6Vgk&callback=location_autocomplete&libraries=places"></script>