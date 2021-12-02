<div class="modal fade" id="payments_modal_box">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card-body">
                    <div class="row" hidden="">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Unique ID</label>
                                <input type="text" class="form-control" id="payments_uid" name="payments_uid" placeholder="ID">
                            </div>
                        </div>
                    </div>
                    <div class="row" hidden="">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Lead ID</label>
                                <input type="text" class="form-control" id="lead_id" name="lead_id" placeholder="Lead Name" value="<?php echo $id; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Payment Date</label>
                                <div class="input-group date" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"  id="payments_date" name="payments_date" data-target="#payments_date">
                                    <div class="input-group-append" data-target="#payments_date" data-toggle="datetimepicker" >
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 d-none">
                            <div class="form-group">
                                <label>Payement Reference Number</label>
                                <input type="number" class="form-control" id="payments_reference_auto_no" name="payments_reference_auto_no" placeholder="Paymanet Reference" readonly="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Payement Reference</label>
                                <input type="text" class="form-control" id="payments_reference_auto_name" name="payments_reference_auto_name" placeholder="Paymanet Reference" readonly="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Sales Invoice</label>
                                <select class="form-control" id="sales_invoice" name="sales_invoice"></select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 d-none">
                            <div class="form-group">
                                <label>Existing Amount</label>
                                <input type="number" class="form-control" id="existing_payments_amount" name="existing_payments_amount" placeholder="Amounts">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="number" class="form-control" id="payments_amount" name="payments_amount" onkeyup="amount_check()" placeholder="Amounts">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 d-none">
                            <div class="form-group">
                                <label>Plot</label>
                                <input type="text" class="form-control" id="plot_id" name="plot_id" placeholder="Plot ID">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6" hidden="">
                            <div class="form-group">
                                <label>Payment Reference</label>
                                <input type="text" class="form-control" id="payments_ref" name="payments_ref" placeholder="Payment Reference">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6" hidden="">
                            <div class="form-group">
                                <label>Order Reference</label>
                                <input type="text" class="form-control" id="payments_order_ref" name="payments_order_ref" placeholder="Order Reference">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Payment Method</label>
                                <select class="form-control" id="payment_method" name="payment_method">
                                    <option value="">Please Select</option>
                                    <option value="1">Cash</option>
                                    <option value="2">Send Link via SMS</option>
                                    <option value="3">Send Link via Email</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 d-none" id="receipt_div">
                            <div class="form-group">
                                <label>Upload</label>
                                <input type="file" id="image_upload" name="file" />
                                <input type="hidden" value="Upload" id="button_upload_image">
                                <input type="hidden" id="img_name"/>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 d-none" id="online_div">
                            <div class="form-group">
                                <label>SMS/Email</label>
                                <input type="text" class="form-control" id="sms_email_value" name="sms_email_value">
                            </div>
                        </div>
                    </div>
                    <div class="row d-none" id="image_display_div">
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <img src="" alt="" width="100" height="100" id="receipt_display"> 
                            </div>
                        </div>
                    </div>
                    
                    <span id="image_required" class="help-block" style="color:red;font-weight:bold"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save_payments" name="save_payments">Save</button>
            </div>
        </div>
    </div>
</div>
<!--Delete Modal Box-->
<div class="modal fade" id="deletepayment_modal_box">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-body">
                <p>Are you sure you want to delete ?</p>
                <div class="row">
                    <div class="col-12 d-none">
                        <div class="form-group">
                            <label>Unique ID<span class="required text-red">*</span></label>
                            <input type="text" class="form-control" id="deletepayment_id" name="deletepayment_id" placeholder="Unique ID">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-outline-light" id="payment_delete" name="payment_delete">Yes</button>
            </div>
        </div>
    </div>
</div>