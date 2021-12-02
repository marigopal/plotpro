var url_string = window.location.href;
var url = new URL(url_string);
var _filter = url.searchParams.get("filter");
$.ajax({
    url: "viewlist/project_viewlist.php",
    type: "POST",
    data: {filter: _filter},
    cache: false,
    success: function (data) {
        $('#_index_project_report').html(data);
        generateDTable('projects_list');
    }
});
$("#save_project").click(function ()
{
    var isNew = false;
    var project_uid = $("#project_uid").val();
    var handled_by = decryption_parameter($("#handled_by").val());
    var company_uid = $("#company_uid").val();
    var project_name = $("#project_name").val();
    var project_type = $("#project_type").val() == '' ? 0 : parseFloat($("#project_type").val());
    var land_id = $("#land_id").val();
    var land_location = $("#land_location").val();
    var land_landmark = $("#land_landmark").val();
    var land_latitude = $("#land_latitude").val();
    var land_longitude = $("#land_longitude").val();
    var reg_percentage = $("#reg_percentage").val();
    var easy_emi = $("#easy_emi").val();
    var dtcp_status = $("#dtcp_status").val();
    var patta_status = $("#patta_status").val();
    var chitta_status = $("#chitta_status").val();
    if (project_uid == '')
    {
        isNew = true;
    }
    if(project_name == '')
    {
        toastr_error_msg('Please Enter Project Name.');
    }else if(project_type == 0)
    {
        toastr_error_msg('Please Select Project Type.');
    }else if(land_id == '')
    {
        toastr_error_msg('Please Select Land Name.');
    }
    else{
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_manage_project.php",
                data: 'isNew=' + isNew.toString() + '&project_uid=' + project_uid + '&handled_by=' + handled_by + '&company_uid=' + company_uid + '&project_name=' + project_name + '&project_type=' + project_type + '&land_id=' + land_id + '&land_location=' + land_location + '&land_landmark=' + land_landmark + '&land_latitude=' + land_latitude + '&land_longitude=' + land_longitude + '&reg_percentage=' + reg_percentage + '&easy_emi=' + easy_emi + '&dtcp_status=' + dtcp_status + '&patta_status=' + patta_status + '&chitta_status=' + chitta_status,
                datatype: "html",
                success: function (result)
                {
                    if (result.trim() != '')
                    {
                        if (isNew == true)
                        {
                            modal_hide('project_modal_box');
                            toastr_success_parameter('Project Added Successfully..!', '/projects/index_amenity', result);
                        } else
                        {
                            modal_hide('project_modal_box');
                            toastr_success('Project Updated Successfully..!', '');
                        }
                    } else
                    {
                        toastr_error();
                    }
                }
            });
        }
});
$("#deleteproject_save").click(function ()
{
    var uid = $("#deleteproject_uid").val();
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_delete_project.php",
                data: 'uid=' + uid,
                datatype: "html",
                success: function (result)
                {
                    if (result == 1)
                    {
                        modal_hide('deleteproject_modal_box');
                        toastr_success('Project Deleted Successfully..!', '');
                    } else if (result == 2)
                    {
                        modal_hide('deleteproject_modal_box');
                        toastr_error_msg('Amenity records are available.! Please remove Amenity records first..!');
                    } else
                    {
                        toastr_error();
                    }
                }
            });
});
function update_project(id)
{
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_getprojectdetails.php",
                data: {id: id},
                dataType: 'json',
                success: function (result)
                {
                    var len = result.length;
                    if (len != 0)
                    {
                        for (var i = 0; i < len; i++)
                        {
                            if (len > 0)
                            {
                                $('#project_uid').val(result[i]['project_id']);
                                $('#company_uid').val(result[i]['company_id']);
                                $('#project_name').val(result[i]['project_name']);
                                $('#project_type').val(result[i]['projecttype_id']);
                                $('#land_id').val(result[i]['land_id']);
                                $('#land_location').val(result[i]['location']);
                                $('#land_landmark').val(result[i]['landmark']);
                                $('#land_latitude').val(result[i]['latitude']);
                                $('#land_longitude').val(result[i]['longitude']);
                                $('#reg_percentage').val(result[i]['reg_percentage']);
                                $('#easy_emi').val(result[i]['easy_emi_available']);
                                $('#dtcp_status').val(result[i]['dtcp_approved']);
                                $('#patta_status').val(result[i]['patta_available']);
                                $('#chitta_status').val(result[i]['chitta_available']);
                                $("#easy_emi").val() == '1' ? $('#easy_emi_checkbox').prop('checked', true) : $('#easy_emi_checkbox').prop('checked', false);
                                $("#dtcp_status").val() == '1' ? $('#dtcp_status_checkbox').prop('checked', true) : $('#dtcp_status_checkbox').prop('checked', false);
                                $("#patta_status").val() == '1' ? $('#patta_status_checkbox').prop('checked', true) : $('#patta_status_checkbox').prop('checked', false);
                                $("#chitta_status").val() == '1' ? $('#chitta_status_checkbox').prop('checked', true) : $('#chitta_status_checkbox').prop('checked', false);
                            }
                        }
                    }
                }
            });
}
function delete_project(id)
{
    $("#deleteproject_uid").val(id);
}
function projecttype_validate()
{
    var projecttype_name = $("#projecttype_name").val();
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/validate_prjecttype.php",
                data: 'projecttype_name=' + projecttype_name,
                datatype: "html",
                success: function (result)
                {
                    if (result == 1)
                    {
                        toastr_error_msg('Project Type Already Used.');
                    } else
                    {
                        remove_disabled('save_button');
                    }
                }
            });

}