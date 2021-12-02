<div class="modal fade" id="landlord_modal_box">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card-body">
                    <div class="row" hidden="" >
                        <div class="col-12">
                            <div class="form-group">
                                <label>Land ID<span class="required text-red">*</span></label>
                                <input type="text" class="form-control" id="land_uid" name="land_uid" placeholder="Unique ID" value="<?php echo $data[0]; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row" hidden="">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Unique ID<span class="required text-red">*</span></label>
                                <input type="text" class="form-control" id="landlord_uid" name="landlord_uid" placeholder="Unique ID">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Landlord Name<span class="required text-red">*</span></label>
                                <input type="text" class="form-control" id="landlord_name" name="landlord_name" placeholder="Landlord Name" onkeyup="input_remove_error_notification('landlord_name');">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Bought From</label>
                                <select class="form-control" id="landlord_bought_from" name="landlord_bought_from">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Bought On</label>
                                <div class="input-group date" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" id="landlord_bought_on" name="landlord_bought_on" data-target="#landlord_bought_on"/>
                                    <div class="input-group-append" data-target="#landlord_bought_on" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Sold On</label>
                                <div class="input-group date"  data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" id="landlord_sold_on" name ="landlord_sold_on" data-target="#landlord_sold_on"/>
                                    <div class="input-group-append" data-target="#landlord_sold_on" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Bought Value</label>
                                <input type="number" class="form-control" id="landlord_bought_value" name="landlord_bought_value" placeholder="Bought Value"  onkeyup="num_word(this.value);">
                            </div>
                            <div class="form-group">
                                <label>Sold Value</label>
                                <input type="number" class="form-control" id="landlord_sold_value" name="landlord_sold_value" placeholder="Sold Value"  onkeyup="num_word(this.value);">
                            </div>
                        </div>
                    </div>
                </div>
                <span id="num_word" class="help-block" style="color:red;font-weight:bold"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save_landlord" name="save_landlord">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deletelord_modal_box">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-body">
                <p>Are you sure you want to delete ?</p>
                <div class="row" hidden="">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Unique ID<span class="required text-red">*</span></label>
                            <input type="text" class="form-control" id="deletelord_uid" name="deletelord_uid" placeholder="Unique ID" onkeyup="input_remove_error_notification('firstname');">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-outline-light" id="delete_landlord" name="delete_landlord">Yes</button>
            </div>
        </div>
    </div>
</div>