<div class="modal fade" id="project_modal_box">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card-body">
                    <div class="row" hidden="">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Project Unique ID</label>
                                <input type="text" class="form-control" id="project_uid" name="project_uid" placeholder="Project ID">
                            </div>
                        </div>
                    </div>
                    <div class="row d-none">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Project Unique ID</label>
                                <input type="text" class="form-control" id="handled_by" name="handled_by" placeholder="Handled By" value="<?php echo $_COOKIE['user_id']; ?>">
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
                                <input type="text" class="form-control" id="project_name" name="project_name" placeholder="Project Name">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Project Type</label>
                                <select class="form-control" id="project_type" name="project_type">
                                    <option value="0">--Please Select --</option>
                                    <?php
                                    $query2 = "SELECT * FROM `tbl_projecttype` WHERE `is_deleted` = '0'";
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
                                    <option value="">--Please Select --</option>
                                    <?php
                                    $query2 = "SELECT `land_id`,`landlord_name` FROM `tbl_lands` WHERE `is_deleted` = '0'";
                                    if ($result2 = $con->query($query2)) {
                                        while ($row2 = $result2->fetch_assoc()) {
                                            ?>
                                            <option value="<?= $row2['land_id'] ?>"><?= strtoupper($row2['landlord_name']) ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Land Mark</label>
                                <input type="text" class="form-control" id="land_landmark" name="land_landmark" placeholder="Landmark">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Land Location</label>
                                <input type="text" class="form-control" id="land_location" name="land_location" placeholder="Land Location">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 d-none">
                            <div class="form-group">
                                <label>Latitude</label>
                                <input type="text" class="form-control" id="land_latitude" name="land_latitude" placeholder="Latitude">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 d-none">
                            <div class="form-group">
                                <label>Longitude</label>
                                <input type="text" class="form-control" id="land_longitude" name="land_longitude" placeholder="Longitude">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Registration Cost (%)</label>
                                <input type="number" class="form-control" id="reg_percentage" name="reg_percentage" placeholder="Registration Percentage">
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
                                <input type="text" class="form-control" id="easy_emi" name="easy_emi">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="dtcp_status" name="dtcp_status">
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
                                <input type="text" class="form-control" id="patta_status" name="patta_status">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="chitta_status" name="chitta_status">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save_project" name="save_project">Save</button>
            </div>
        </div>
    </div>
</div>
<!--Delete Modal Box-->
<div class="modal fade" id="deleteproject_modal_box">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-body">
                <p>Are you sure you want to delete ?</p>
                <div class="row" hidden="">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Unique ID<span class="required text-red">*</span></label>
                            <input type="text" class="form-control" id="deleteproject_uid" name="deleteproject_uid" placeholder="Unique ID">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-outline-light" id="deleteproject_save" name="deleteproject_save">Yes</button>
            </div>
        </div>
    </div>
</div>