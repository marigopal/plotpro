<div class="modal fade" id="salesplot_modal_box">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card-body">
                    <div class="row" hidden="">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Unique ID</label>
                                <input type="text" class="form-control" id="plotsales_uid" name="plotsales_uid" placeholder="ID">
                            </div>
                        </div>
                    </div>
                    <div class="row" hidden="">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Sales No</label>
                                <input type="text" class="form-control" id="sales_no" name="sales_no" placeholder="sales_no">
                            </div>
                        </div>
                    </div>
                    <div class="row" hidden="">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Sales Name</label>
                                <input type="text" class="form-control" id="sales_name" name="sales_name" placeholder="sales_name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Lead</label>
                                <select class="form-control" id="lead_id" name="lead_id">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Project</label>
                                <select class="form-control" id="project_id" name="project_id">

                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="form-group">
                                <label>Blocks</label>

                                <select class="form-control" id="block_id" name="block_id">

                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="form-group">
                                <label>Plots</label>
                                <select class="form-control" id="plot_id" name="plot_id">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Square Feet Value</label>
                                <input type="number" class="form-control" id="sqft_value" name="sqft_value" placeholder="Square Feet Value" onkeyup="centvalue()">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Total Square Feet</label>
                                <input type="number" class="form-control" id="total_sqft_value" name="total_sqft_value" placeholder="Total Square Feet Value" onkeyup="SqftCent()">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Cent Value</label>
                                <input type="number" class="form-control" id="cent_value" name="cent_value" placeholder="Cent Value" onkeyup="netcost(); addnetcost_regcost();">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Total Cent</label>

                                <input type="number" class="form-control" id="total_cent" name="total_cent" placeholder="Total Cent" onkeyup="CentSqft()">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Net Cost</label>
                                <input type="number" class="form-control" id="net_cost" name="net_cost" placeholder="Net Cost"  onkeyup="num_word(this.value); addnetcost_regcost();">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 d-none">
                            <div class="form-group">
                                <label>Registration Percentage</label>
                                <input type="number" class="form-control" id="reg_percentage" name="reg_percentage" placeholder="Registration Percentage">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Registration Cost</label>
                                <input type="number" class="form-control" id="reg_cost" name="reg_cost" placeholder="Registration Cost" onkeyup="addnetcost_regcost(); num_word(this.value);">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Total Cost</label>
                                <input type="number" class="form-control" id="total_cost" name="total_cost" placeholder="Total Cost"  onkeyup="num_word(this.value);">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Initial Payment</label>
                                <input type="number" class="form-control" id="initial_amt" name="initial_amt" placeholder="Initial Payment"  onkeyup="num_word(this.value);">
                            </div>
                        </div>
                    </div>
                    <div class="row d-none" id="emi_div">
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>Immediate</label>
                                <input type="radio" class="form-control" id="immediate_checkbox" name="immediate_checkbox">
                                <input type="hidden" class="form-control" id="immediate_value" name="immediate_value">
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>EMI</label>
                                <input type="radio" class="form-control" id="emi_checkbox" name="emi_checkbox">
                                <input type="hidden" class="form-control" id="emi_value" name="emi_value">
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>Flexi</label>
                                <input type="radio" class="form-control" id="flexi_checkbox" name="flexi_checkbox">
                                <input type="hidden" class="form-control" id="flexi_value" name="flexi_value">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 d-none" id="emiamt_div">
                            <div class="form-group">
                                <label>EMI Amount</label>
                                <input type="text" class="form-control" id="emi_amt" name="emi_amt" placeholder="EMI Amount" onkeyup="calcMaxtenure();">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 d-none" id="maximum_month_div">
                            <div class="form-group">
                                <label>Maximum Tenure</label>
                                <input type="number" class="form-control" id="maximum_month" name="maximum_month" placeholder="Max Month Allowed" onkeyup="calcEmiamt();">
                            </div>
                        </div>
                    </div>
                </div>
                <span id="num_word" class="help-block" style="color:red;font-weight:bold"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save_plotsales" name="save_plotsales">Save</button>
            </div>
        </div>
    </div>
</div>
<!--Delete Modal Box-->
<div class="modal fade" id="salesdelete_modal_box">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-body">
                <p>Are you sure you want to delete ?</p>
                <div class="row" hidden="">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Unique ID<span class="required text-red">*</span></label>
                            <input type="text" class="form-control" id="salesdelete_uid" name="salesdelete_uid" placeholder="Unique ID">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-outline-light" id="save_delete" name="save_delete">Yes</button>
            </div>
        </div>
    </div>
</div>