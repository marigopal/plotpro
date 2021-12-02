<div class="modal fade" id="userprofile_pasword_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card-body">
                    <div class="row d-none">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Users Unique ID</label>
                                <input type="text" class="form-control" id="user_id" name="user_id" placeholder="User ID" value="<?php echo $_COOKIE['user_id']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                <span id="password_check" class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" onkeyup="password_check()">
                            </div>
                        </div>
                    </div>
                </div>
                <span id="error_" class="help-block" style="color:red;font-weight:bold"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save_password" name="save_password">Save</button>
            </div>
        </div>
    </div>
</div>