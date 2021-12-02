<div class="modal fade" id="leads_tasklist_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card-body">
                    <div class="row d-none">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Logged ID</label>
                                <input type="text" class="form-control" id="tasks_logged" name="tasks_logged" value="<?php echo decrypt($_COOKIE['user_id']); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row d-none">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Unique ID</label>
                                <input type="text" class="form-control" id="lead_task_id" name="lead_task_id" placeholder="ID">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Project_UID</label>
                                <input type="text" class="form-control" id="task_lead_project_id" name="task_lead_project_id" placeholder="ID">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6" id="project_div">
                            <div class="form-group">
                                <label>Project</label>
                                
                                <select class="form-control" id="project_id" name="project_id">
                                    
                                </select>
                            </div>
                        </div>
                         <div class="col-12 col-sm-6" id="lead_div">
                            <div class="form-group">
                                <label>Lead</label>
                                
                                <select class="form-control" id="lead_id" name="lead_id">
                                    
                                </select>
                                
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 d-none">
                            <div class="form-group">
                                <label>Existing Task Name</label>
                                
                                
                                <input type="text" class="form-control" id="existing_task_name" name="existing_task_name" placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            
                            <div class="form-group">
                                <label>Task Name</label>
                                
                                <input type="text" class="form-control" id="task_name" name="task_name" placeholder="Task Name">
                                    
                                </select>
                                
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 d-none">
                            <div class="form-group">
                                <label>Existing Status</label>
                                <select class="form-control" id="existing_status_id" name="existing_status_id">
                                    
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" id="task_status_id" name="task_status_id">
                                    
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-12 col-sm-6 d-none">
                            <div class="form-group">
                                <label>Existing Managed By</label>
                                <select class="form-control" id="existing_assigned_to" name="existing_assigned_to">
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Assigned To</label>
                                <select class="form-control" id="task_assigned_to" id="task_assigned_to">
                                
                                    
                                </select>
                            </div>
                           
                        </div>
                        <div class="col-12 col-sm-6 d-none">
                            <div class="form-group">
                                <label>Existing Description</label>
                                <textarea class="form-control" rows="2" id="existing_task_description" name="existing_task_description" maxlength="150"></textarea>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="2" id="task_description" name="task_description" maxlength="150" placeholder="Description"></textarea>
                            </div>
                        
                       
                    </div>
                        
                        
                    </div>
                    
                    
                    
                    
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save_tasklist" name="save_tasklist">Save</button>
            </div>
        </div>
    </div>
</div>