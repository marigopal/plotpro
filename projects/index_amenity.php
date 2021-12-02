<?php
include ("../include/menu/menu.php");
$id = $_GET['id'];
$sql = "SELECT a.`project_id`,a.`project_name`,a.`projecttype_id`,a.`company_id`,a.`land_id`,a.`handled_by`,a.`location`,a.`landmark`,a.`latitude`,a.`longitude`,a.`is_active`,a.`is_cancelled`,a.`cancelled_reason`,a.`easy_emi_available`,a.`dtcp_approved`,a.`patta_available`,a.`chitta_available`,a.`is_deleted`,a.`reg_percentage`,b.land_id,b.landlord_name,c.projecttype_id,c.projectype_name FROM tbl_projects a LEFT JOIN tbl_lands b on a.land_id = b.land_id LEFT JOIN tbl_projecttype c on a.projecttype_id = c.projecttype_id WHERE a.is_deleted = '0' and a.project_id = '$id' ";
$result = mysqli_query($con, $sql); // select query
$data = mysqli_fetch_array($result);
include ("modal/modals_amenity.php");
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Project Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/projects/">Projects</a></li>
                        <li class="breadcrumb-item active">Project Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-body">
                    <form id="update_project" method="post">  
                        <div class="row" hidden="">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Project Unique ID</label>
                                    <input type="text" class="form-control" id="project_uid" name="project_uid" placeholder="Project ID" value="<?php echo $data['project_id']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row" hidden="">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Company Unique ID</label>
                                    <input type="text" class="form-control" id="company_uid" name="company_uid" placeholder="Company ID" value="<?php echo $_SESSION['company_id']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Project Name</label>
                                    <input type="text" class="form-control" id="project_name" name="project_name" placeholder="Project Name" value = "<?php echo $data['project_name']; ?>">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Project Type</label>
                                    <select class="form-control" id="project_type" name="project_type">
                                        <option value="<?php echo $data['projecttype_id']; ?>"><?php echo $data['projectype_name']; ?></option>
                                        <?php
                                        $current_product_type = $data["projecttype_id"];
                                        $query2 = "SELECT * FROM `tbl_projecttype` WHERE `is_deleted` = '0' and projecttype_id != '$current_product_type'";
                                        if ($result2 = $con->query($query2)) {
                                            while ($row2 = $result2->fetch_assoc()) {
                                                ?>
                                                <option value="<?= $row2['projecttype_id'] ?>"><?= strtoupper($row2['projectype_name']) ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                       
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Land Name</label>
                                    <select class="form-control" id="land_id" name="land_id">
                                        <option value="<?php echo $data["land_id"]; ?>"><?php echo $data["landlord_name"]; ?></option>
                                        <?php
                                        $current_landname = $data["land_id"];
                                        $query2 = "SELECT `land_id`,`landlord_name` FROM `tbl_lands` WHERE `is_deleted` = '0' and land_id != '$current_landname' ";
                                        if ($result2 = $con->query($query2)) {
                                            while ($row2 = $result2->fetch_assoc()) {
                                                ?>
                                                <option value="<?= $row2['land_id'] ?>"><?= strtoupper($row2['landlord_name']) ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <option value="">-- Please Select --</option>        
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Land Location</label>
                                    <input type="text" class="form-control" id="land_location" name="land_location" placeholder="Land Location" value="<?php echo $data["location"]; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Land Mark</label>
                                    <input type="text" class="form-control" id="land_landmark" name="land_landmark" placeholder="Landmark" value="<?php echo $data["landmark"]; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row d-none">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Latitude</label>
                                    <input type="text" class="form-control" id="land_latitude" name="land_latitude" placeholder="Latitude" value="<?php echo $data["latitude"]; ?>">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Longitude</label>
                                    <input type="text" class="form-control" id="land_longitude" name="land_longitude" placeholder="Longitude" value="<?php echo $data["longitude"]; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <input type="checkbox" class="" id="easy_emi_checkbox" name="easy_emi_checkbox">
                                    <label>Easy EMI</label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <input type="checkbox" class="" id="dtcp_status_checkbox" name="dtcp_status_checkbox">
                                    <label>DTCP Approved</label>
                                </div>
                            </div>
                        </div>
                        <div class="row d-none">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="easy_emi" name="easy_emi" value="<?php echo $data["easy_emi_available"]; ?>">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="dtcp_status" name="dtcp_status" value="<?php echo $data["dtcp_approved"]; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <input type="checkbox" class="" id="patta_status_checkbox" name="patta_status_checkbox">
                                    <label>Patta Available</label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <input type="checkbox" class="" id="chitta_status_checkbox" name="chitta_status_checkbox">
                                    <label>Chitta Available</label>
                                </div>
                            </div>
                        </div>
                        <div class="row d-none">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="patta_status" name="patta_status" value="<?php echo $data["patta_available"]; ?>">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="chitta_status" name="chitta_status" value="<?php echo $data["chitta_available"]; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row d-none">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="handled_by" name="handled_by" placeholder="Handled By" value="<?php echo decrypt($_COOKIE['user_id']); ?>">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <input type="number" class="form-control" id="reg_percentage" name="reg_percentage" placeholder="Registration Percentage" value="<?php echo $data["reg_percentage"]; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="modal-footer pull-right">
                                    <span id="plot_count" class="help-block" style="color:green;font-weight:bold"></span>
                                    <span id="plot_name" class="help-block d-none" style="color:green;font-weight:bold"> Plots</span>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#plotdiagram_modal_box" onclick="get_block()">Plot Diagram</button>    
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#plot_modal_box">Manage Plot</button>    
                                    <button type="submit" class="btn btn-primary" id="update_project" name="update_project" >Save</button>
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
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Amenity List</h5>
                            <a href="#" data-toggle="modal" data-target="#amenity_modal_box"><img src="/img/add_row.png" alt="Smiley face" height="25" width="25" data-toggle="modal" data-target="#new_users" title="New"></a>
                        </div>
                        <div class="card-body">
                            <table id="amenity_report" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th hidden="">ID</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="_index_amenity_report"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include ('../include/footer.php'); ?>
<script src="jquery/_index_amenity.js" type="text/javascript"></script>
<script src="jquery/_common.js" type="text/javascript"></script>
<script src="jquery/_plot.js" type="text/javascript"></script>
<script src="jquery/plot_diagram.js" type="text/javascript"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeABm6C1O66yUCU4Kic0V90EZgP4o6Vgk&callback=location_autocomplete&libraries=places"></script>