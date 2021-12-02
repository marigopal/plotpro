var url_string = window.location.href;
var url = new URL(url_string);
var _filter = url.searchParams.get("id");
if(_filter != '')
{
   
    update_lead(_filter);
}
$.ajax({
    url: "viewlist/task_viewlist.php",
    type: "POST",
    data: {filter: _filter},
    cache: false,
    success: function (data) {
        $('#_index_task_report').append(data);
        generateDTable('leads_task_report');
    }
});

$("#update_leads").on("submit", function (e) {
    var dataString = $(this).serialize();
    var isNew = true;
    var leads_uid = $('#leads_uid').val();
    if (leads_uid != '')
    {
        isNew = false;
    }
    $.ajax({
        type: "POST",
        url: "_dbPage/_manage_leads.php",
        data: dataString + '&isNew=' + isNew.toString(),
        success: function (result)
        {
            if (result != '')
            {
                if (isNew == true)
                {
                   add_disabled('update_leads');
                    toastr_success('Update Success..!', '');
                } else if (isNew == false)
                {
                    add_disabled('update_leads');
                    toastr_success('Update Success..!', '');
                }
            } else
            {
                toastr_error();
            }

        }
    });
    e.preventDefault();
});
$("#save_lead_project").click(function ()
{
    var isNew = false;
    var tasks_logged = $("#tasks_logged").val();
    var lead_project_id = $("#lead_project_id").val();
    var project_id = $("#project_id").val();
    var project_name = $("#project_id").find("option:selected").text();
    var lead_id = $("#lead_id").val();
    var status_id = $("#status_id").val();
    var assigned_to = $("#assigned_to").val();
    var lead_project_description = $("#lead_project_description").val();
    // alert(project_name);
    if(lead_project_id == '')
    {
        isNew = true;
    }
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_manage_lead_project.php",
                data: 'isNew='+ isNew.toString() + '&tasks_logged=' + tasks_logged +'&lead_project_id=' + lead_project_id +'&project_id=' + project_id +'&lead_id=' + lead_id +'&status_id=' + status_id +'&assigned_to=' + assigned_to + '&lead_project_description=' + lead_project_description + '&project_name=' + project_name,
                datatype: "html",
                success: function (result)
                {
                //    if(result.trim() == 1)
                //    {
                //        if (isNew == true)
                //        {
                //            modal_hide('leads_project_modal');
                //            toastr_success('Lead Project Added Successfully..!','');
                //        }
                //        else 
                //        {
                //             modal_hide('leads_project_modal');
                //            toastr_success('Lead Project Updated Successfully..!','');
                //        }
                //     }
                //    else
                //    {
                //        toastr_error();
                //    }
                }
            });
});
$("#save_lead_tasks").click(function(){

    var isNew = false;
    var tasks_logged = $("#tasks_logged").val();
    var lead_task_id = $("#lead_task_id").val();
    var task_lead_project_id = $("#task_lead_project_id").val();
    var existing_task_name = $("#existing_task_name").val();
    var task_name = $("#task_name").val();
    var existing_status_id = $("#existing_status_id").val();
    var existing_status_name = $("#existing_status_id").find("option:selected").text();
    var task_status_id = $("#task_status_id").val();
    var task_status_name = $("#task_status_id").find("option:selected").text();
    var existing_assigned_to = $("#existing_assigned_to").val();
    var existing_assigned_to_name = $("#existing_assigned_to").find("option:selected").text();
    var task_assigned_to = $("#task_assigned_to").val();
    var task_assigned_to_name = $("#task_assigned_to").find("option:selected").text();
    var existing_task_description = $("#existing_task_description").val();
    var task_description = $("#task_description").val();
    if(lead_task_id == '')
    {
        isNew = true;
    }
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_manage_lead_tasks.php",
                data: 'isNew='+ isNew.toString() + '&tasks_logged=' + tasks_logged +'&lead_task_id=' + lead_task_id +'&task_lead_project_id=' + task_lead_project_id +'&existing_task_name=' + existing_task_name + '&task_name=' + task_name + '&existing_status_id=' + existing_status_id + '&existing_status_name=' + existing_status_name + '&task_status_id=' + task_status_id + '&task_status_name=' + task_status_name + '&existing_assigned_to=' + existing_assigned_to + '&existing_assigned_to_name=' + existing_assigned_to_name + '&task_assigned_to=' + task_assigned_to + '&task_assigned_to_name=' + task_assigned_to_name + '&existing_task_description=' + existing_task_description+ '&task_description=' + task_description,
                datatype: "html",
                success: function (result)
                {
                   if(result.trim() == 1)
                   {
                       if (isNew == true)
                       {
                           modal_hide('leads_task_modal');
                           toastr_success('Task Added Successfully..!','');
                       }
                       else 
                       {
                            modal_hide('leads_task_modal');
                           toastr_success('Task Updated Successfully..!','');
                       }
                    }
                   else
                   {
                       toastr_error();
                   }
                }
            });
});
$(document).ready(function(){

    load_assigned_to('assigned_to');
    load_assigned_to('task_assigned_to');
    load_assigned_to('existing_assigned_to');
    load_assigned_to('managed_by');
    load_Project('project_id');
    load_leadstatus('status_id');
    load_leadstatus('existing_status_id');
    load_leadstatus('task_status_id');
   
 
});
function update_lead_project(id)
{
    $.ajax
    ({
        type: "POST",
        url: "_dbPage/_get_leadproject_details.php",
        data: {id: id},
        dataType: 'json',
        success: function (result)
        {   
            var len = result.length;
            if (len != 0)
                    {
                        for (var i = 0; i < len; i++)
                        {
                        var lead_project_id = result[i]['lead_project_id'];
                        var lead_id = result[i]['lead_id'];
                        var project_id = result[i]['project_id'];
                        var status_id = result[i]['status_id'];
                        var managed_by = result[i]['managed_by'];
                        var lead_project_description = result[i]['lead_project_description'];
                       
                        if (len > 0)
                            { 
                                $("#lead_project_id").val(lead_project_id);
                                $("#project_id").val(project_id);
                                $("#lead_id").val(lead_id);
                                $("#status_id").val(status_id);
                                $("#assigned_to").val(managed_by);
                                $("#lead_project_description").val(lead_project_description);
                                
                                

                            }
            
                        }}
        }
});
}
function update_task(id)
{
   
    $.ajax
    ({
        type: "POST",
        url: "_dbPage/_get_task_details.php",
        data: {id: id},
        dataType: 'json',
        success: function (result)
        {   
            var len = result.length;
            if (len != 0)
                    {
                        for (var i = 0; i < len; i++)
                        {
                        var lead_task_id = result[i]['lead_task_id'];
                        var lead_project_id = result[i]['lead_project_id'];
                        var task_name = result[i]['task_name'];
                        var task_description = result[i]['task_description'];
                        var assigned_to = result[i]['assigned_to'];
                        var status_id = result[i]['status_id'];
                       
                        if (len > 0)
                            { 
                                $("#lead_task_id").val(lead_task_id);
                                $("#task_lead_project_id").val(lead_project_id);
                                $("#existing_task_name").val(task_name);
                                $("#task_name").val(task_name);
                                $("#existing_status_id").val(status_id);
                                $("#task_status_id").val(status_id);
                                $("#existing_assigned_to").val(assigned_to);
                                $("#task_assigned_to").val(assigned_to);
                                $("#existing_task_description").val(task_description);
                                $("#task_description").val(task_description);
                            }
            
                        }}
        }
});
}
function add_task(id)
{
 
    $("#task_lead_project_id").val(id);
}