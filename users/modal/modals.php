<div class="modal fade" id="users_modal_box">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12" hidden="">
                            <div class="form-group">
                                <label>Users Unique ID</label>
                                <input type="text" class="form-control" id="user_id" name="user_id" placeholder="User ID">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Full Name<span class="required text-red">*</span></label>
                                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name">
                                <span id="password_check" class="help-block"></span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Employee ID</label>
                                <input type="text" class="form-control" id="emp_id" name="emp_id" placeholder="Employee ID">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="City">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" onchange="mobnum_validate(this.value)">
                                <span id="password_check" class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" onchange="email_validation('email', 'save_user')" onkeyup="input_remove_error_notification('email')">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Address Line 1</label>
                                <input type="text" class="form-control" id="address1" name="address1" placeholder="Address Line 1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Address Line 2</label>
                                <input type="text" class="form-control" id="address2" name="address2" placeholder="Address Line 2">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>User Name <span class="required text-red">*</span></label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="User Name" onchange="username_validate()">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Password <span class="required text-red">*</span></label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Roles <span class="required text-red">*</span></label>
                                <select class="form-control" id="user_role" name="user_role">
                                    
                                </select>
                            </div>
                        </div>
                        
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save_user" name="save_user" disabled>Save</button>
            </div>
        </div>
    </div>
</div>
<!--Delete Modal Box-->
<div class="modal fade" id="deleteuser_modal_box">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-body">
                <p>Are you sure you want to delete ?</p>
                <div class="row" hidden="">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Unique ID<span class="required text-red">*</span></label>
                            <input type="text" class="form-control" id="deleteuser_uid" name="deleteuser_uid" placeholder="Unique ID">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-outline-light" id="delete_user" name="delete_user">Yes</button>
            </div>
        </div>
    </div>
</div>
