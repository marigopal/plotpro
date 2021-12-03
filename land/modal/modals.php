<div class="modal fade" id="land_modal_box">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card-body">
                    <div class="row" hidden="">
                        <div class="col-12" >
                            <div class="form-group">
                                <label>Land Unique ID</label>
                                <input type="text" class="form-control" id="land_id" name="land_id" placeholder="Land ID" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Land Name<span class="required text-red">*</span></label>
                                <input type="text" class="form-control" id="land_name" name="land_name" placeholder="Land Name" onkeyup="input_remove_error_notification('land_name');">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Landmark</label> 
                                <input type="text" class="form-control" id="land_landmark" name="land_landmark" placeholder="Land Mark" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">

                                <label>Location</label>
                                <input type="text" class="form-control" id="land_location" cname="land_location" placeholder="Location">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Total Acers</label>
                                <input type="number" class="form-control" id="land_acers" name="land_acers" placeholder="Land Acers" onkeyup="input_remove_error_notification('firstname');">
                            </div>
                            <div class="form-group">
                                <label>Total Value</label>
                                <input type="number" class="form-control" id="land_value" name="land_value" placeholder="Land Value" onkeyup="num_word(this.value);">
                            </div>
                        </div><div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Total Cent</label>
                                <input type="number" class="form-control" id="land_cent" name="land_cent" placeholder="Land Cent" onkeyup="input_remove_error_notification('password');">
                            </div>
                            <div class="form-group">
                                <label>Square Feet Value</label>
                                <input type="number" class="form-control" id="land_square_feet" name="land_square_feet" placeholder="Square Feet" onkeyup="input_remove_error_notification('password'); num_word(this.value);" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 d-none">
                            <div class="form-group">
                                <label>Latitude</label>
                                <input type="text" class="form-control" id="land_latitude" name="land_latitude" placeholder="Land Latitude" onkeyup="input_remove_error_notification('firstname');">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 d-none">
                            <div class="form-group">
                                <label>Longitude</label>
                                <input type="text" class="form-control" id="land_longitude" name="land_longitude" placeholder="Longitude" onkeyup="input_remove_error_notification('password');">
                            </div>
                        </div>
                    </div>
                    <span id="num_word" class="help-block" style="color:red;font-weight:bold"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save_button" name="save_button">Save</button>
            </div>
        </div>
    </div>
</div>
<!--Delete Modal Box-->
<div class="modal fade" id="deleteland_modal_box">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-body">
                <p>Are you sure you want to delete ?</p>
                <div class="row" hidden="">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Unique ID<span class="required text-red">*</span></label>
                            <input type="text" class="form-control" id="deleteland_uid" name="deleteland_uid" placeholder="Unique ID" onkeyup="input_remove_error_notification('firstname');">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-outline-light" id="delete_land" name="delete_land">Yes</button>
            </div>
        </div>
    </div>
</div>