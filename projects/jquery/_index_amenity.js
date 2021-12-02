var url_string = window.location.href;
var url = new URL(url_string);
var _filter = url.searchParams.get("filter");
$.ajax({
    url: "viewlist/_amenity_viewlist.php",
    type: "POST",
    data: {filter: _filter},
    cache: false,
    success: function (data) {
        $('#_index_amenity_report').html(data);
        generateDTable('amenity_report');
    }
});
$("#update_project").on("submit", function (e) {
    var dataString = $(this).serialize();
    var isNew = true;
    var project_uid = $('#project_uid').val();
    if (project_uid != '')
    {
        isNew = false;
    }
    $.ajax({
        type: "POST",
        url: "_dbPage/_manage_project.php",
        data: dataString + '&isNew=' + isNew.toString(),
        success: function (result)
        {
            if (result != '')
            {
                if (isNew == true)
                {
                    modal_hide('land_modal_box');
                    toastr_success_parameter('Record Added..!', 'landlord_list', result)
                } else if (isNew == false)
                {
                    add_disabled('update_project');
                    toastr_success('Project Updated Successfully..!', '');
                }
            } else
            {
                toastr_error();
            }
        }
    });
    e.preventDefault();
});
$("#save_amenity").click(function ()
{
    var isNew = false;
    var project_uid = $("#project_uid").val();
    var amenity_uid = $("#amenity_uid").val();
    var amenity_title = $("#amenity_title").val();
    var amenity_description = $("#amenity_description").val();
    if (amenity_uid == '')
    {
        isNew = true;
    }
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_manage_amenity.php",
                data: 'isNew=' + isNew.toString() + '&project_uid=' + project_uid + '&amenity_uid=' + amenity_uid + '&amenity_title=' + amenity_title + '&amenity_description=' + amenity_description,
                datatype: "html",
                success: function (result)
                {
                    if (result == 1)
                    {
                        if (isNew == true)
                        {
                            modal_hide('amenity_modal_box');
                            toastr_success('Added Success..!', '');
                        } else if (isNew == false)
                        {
                            modal_hide('amenity_modal_box');
                            toastr_success('Update Success..!', '');
                        }
                    } else
                    {
                        toastr_error();
                    }
                }
            });
});
$("#deleteamenity_save").click(function ()
{
    var uid = $("#deleteamenity_uid").val();
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_delete_amenity.php",
                data: 'uid=' + uid,
                datatype: "html",
                success: function (result)
                {
                    if (result == 1)
                    {
                        modal_hide('deleteamenity_modal_box');
                        toastr_success('Deleted Successfully..!', '');
                    } else
                    {
                        toastr_error();
                    }
                }
            });
});
function update_amenity(id)
{
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_get_amenitydetails.php",
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
                                $("#amenity_uid").val(result[i]['amenity_id']);
                                $("#amenity_title").val(result[i]['amenity_title']);
                                $("#amenity_description").val(result[i]['amenity_description']);
                            }
                        }
                    }
                }
            });
}
function delete_amenity(id)
{
    $("#deleteamenity_uid").val(id);
}