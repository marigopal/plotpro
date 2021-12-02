<!--Edit company modal box-->
<div class="modal fade" id="company_modal_box">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card-body">
                    <div class="row" hidden="">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Unique ID</label>
                                <input type="text" class="form-control" id="company_uid" name="company_uid" placeholder="Unique ID">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Company Name<span class="required text-red">*</span></label>
                                <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" onkeyup="input_remove_error_notification('company_name');">
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control" id="company_city" name="company_city" placeholder="City">
                            </div>
                        </div><div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Properitor</label>
                                <input type="text" class="form-control" id="company_properitor" name="company_properitor" placeholder="Properitor">
                            </div>
                            <div class="form-group">
                                <label>Pin Code</label>
                                <input type="text" class="form-control" id="company_zipcode" name="company_zipcode" placeholder="Pin Code">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Office Phone</label>
                                <input type="number" class="form-control" id="company_phone" name="company_phone" placeholder="Office Phone">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="number" class="form-control" id="company_mobile" name="company_mobile" placeholder="Mobile Number">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="text" class="form-control" id="company_email" name="company_email" placeholder="Email Address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Address Line 1</label>
                                <input type="text" class="form-control" id="company_address1" name="company_address1" placeholder="Address Line 1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Address Line 2</label>
                                <input type="text" class="form-control" id="company_address2" name="company_address2" placeholder="Address Line 2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save_button" name="save_button">Save</button>
            </div>
        </div>
    </div>
</div>