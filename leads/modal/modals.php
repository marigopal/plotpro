<div class="modal fade" id="leads_modal_box">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card-body">
                    <div class="row" hidden ="">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Logged ID</label>
                                <input type="text" class="form-control" id="leads_logged" name="leads_logged" value="<?php echo decrypt($_COOKIE['user_id']); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row" hidden="">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Unique ID</label>
                                <input type="text" class="form-control" id="leads_uid" name="leads_uid" placeholder="ID">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-3">
                            <div class="form-group">
                                <label>Title</label>
                                <select class="form-control" id="leads_title" name="leads_title">
                                    <option value="">Select</option>
                                    <option value="Ms">Ms</option>
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" id="leads_firstname" name="leads_firstname" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="form-group">
                                <label>Mid Name</label>
                                <input type="text" class="form-control" id="leads_midname" name="leads_midname" placeholder="Middle Name">
                            </div>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" id="leads_lastname" name="leads_lastname" placeholder="Last Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Address Line1</label>
                                <input type="text" class="form-control" id="leads_address1" name="leads_address1" placeholder="Address Line 1">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Address Line2</label>
                                <input type="text" class="form-control" id="leads_address2" name="leads_address2" placeholder="Address Line 2">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>City </label>
                                <input type="text" class="form-control" id="leads_city" name="leads_city" placeholder="City Name">
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>State</label>
                                <input type="text" class="form-control" id="leads_state" name="leads_state" placeholder="State Name">
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>Zipcode</label>
                                <input type="text" class="form-control" id="leads_zipcode" name="leads_zipcode" placeholder="Zipcode">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>Phone </label>
                                <input type="text" class="form-control" id="leads_phone" name="leads_phone" placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="text" class="form-control" id="leads_mobile" name="leads_mobile" placeholder="Mobile Number">
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="text" class="form-control" id="leads_email" name="leads_email" placeholder="Email Address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Managed By</label>
                                <select class="form-control" id="managed_by" id="managed_by"></select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save_leads" name="save_leads">Save</button>
            </div>
        </div>
    </div>
</div>
<!--Delete Modal Box-->
<div class="modal fade" id="leadsdelete_modal_box">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-body">
                <p>Are you sure you want to delete ?</p>
                <div class="row" hidden="">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Unique ID<span class="required text-red">*</span></label>
                            <input type="text" class="form-control" id="leadsdelete_uid" name="leadsdelete_uid" placeholder="Unique ID">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-outline-light" id="leads_delete" name="leads_delete">Yes</button>
            </div>
        </div>
    </div>
</div>