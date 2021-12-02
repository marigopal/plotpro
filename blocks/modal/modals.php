<!--Add the users modal box-->
<div class="modal fade" id="blocks_modal_box">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group" hidden="">
                                <label>Unique ID<span class="required text-red">*</span></label>
                                <input type="text" class="form-control" id="blocks_id" name="blocks_id" placeholder="Project Type ID" onkeyup="input_remove_error_notification('firstname');">
                            </div>
                            <div class="form-group">
                                <label>Name<span class="required text-red">*</span></label>
                                <input type="text" class="form-control" id="blocks_name" name="blocks_name" placeholder="Block Name" onkeyup="input_remove_error_notification('blocks_name');"  onchange="blockname_validate()">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save_button" name="save_button" disabled>Save</button>
            </div>
        </div>
    </div>
</div>
<!--Delete Modal Box-->
<div class="modal fade" id="delete_modal_box">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-body">
                <p>Are you sure you want to delete ?</p>
                <div class="row" hidden="">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Unique ID<span class="required text-red">*</span></label>
                            <input type="text" class="form-control" id="delete_uid" name="delete_uid" placeholder="Unique ID" onkeyup="input_remove_error_notification('firstname');">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-outline-light" id="delete_button" name="delete_button">Yes</button>
            </div>
        </div>
    </div>
</div>