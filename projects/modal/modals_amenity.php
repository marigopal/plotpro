<div class="modal fade" id="amenity_modal_box">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card-body">
                    <div class="row" hidden="">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Amenity Unique ID</label>
                                <input type="text" class="form-control" id="amenity_uid" name="amenity_uid" placeholder="Amenity ID">
                            </div>
                        </div>
                    </div>
                    <div class="row" hidden="" >
                        <div class="col-12">
                            <div class="form-group">
                                <label>Project Unique ID</label>
                                <input type="text" class="form-control" id="project_uid" name="project_uid" placeholder="Project ID" value="<?php echo $data[0]; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" id="amenity_title" name="amenity_title" placeholder="Amenity Title">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" >
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="2" id="amenity_description" name="amenity_description" maxlength="150"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save_amenity" name="save_amenity">Save</button>
            </div>
        </div>
    </div>
</div>
<!--Delete Modal Box-->
<div class="modal fade" id="deleteamenity_modal_box">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-body">
                <p>Are you sure you want to delete ?</p>
                <div class="row" hidden="">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Unique ID<span class="required text-red">*</span></label>
                            <input type="text" class="form-control" id="deleteamenity_uid" name="deleteamenity_uid" placeholder="Unique ID">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-outline-light" id="deleteamenity_save" name="deleteamenity_save">Yes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="plot_modal_box">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-8">
                            <div class="form-group">
                                <select class="form-control " id="block_id" name="block_id" onchange="load_block_Plots()">
                                    <option value="">--Select Blocks --</option>
                                    <?php
                                    $query2 = "SELECT * FROM `tbl_blocks` WHERE `is_deleted` = '0'";
                                    if ($result2 = $con->query($query2)) {
                                        while ($row2 = $result2->fetch_assoc()) {
                                            ?>
                                            <option value="<?= $row2['block_id'] ?>"><?= strtoupper($row2['block_name']) ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <input type="hidden" id="max_plot_no">
                            </div>
                        </div>
                        <div class="col-12 col-sm-4" id="add_button_plot" hidden="">
                            <div class="form-group">
                                <a href="#" data-toggle="modal" data-target="#project_modal_box"><img id="add_plot" src="/img/plus_add.png" alt="Smiley face" height="30" width="30" data-toggle="modal" data-target="#new_users" title="New"></a>
                            </div>
                        </div>
                    </div>
                    <div class="row v-scroll">
                        <ul class="px-0" id="">
                            <li class="row col-12"><div class="col-md-12"><input class="col-md-3 plotname border-0" type="text" value="Name" readonly=""><input class="col-md-3 plotsqft border-0" type="text" value="Sq-Ft" readonly=""><input class="col-md-3 plotsqft border-0" type="text" value="Sq-Value" readonly=""><input class="col-md-3 plotcent border-0" type="text" value="Cent" readonly=""></div></li>
                        </ul> 
                    </div>
                    <div class="row v-scroll">
                        <ul class="px-0 block_ul" id="lst_plots">
                        </ul> 
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save_plot" name="save_plot">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="plotdiagram_modal_box">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 grid-margin" id="diagram_div" >

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>