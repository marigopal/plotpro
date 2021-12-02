var url_string = window.location.href;
var url = new URL(url_string);
var _filter = url.searchParams.get("filter");
$.ajax({
    url: "viewlist/product_type_viewlist.php",
    type: "POST",
    data: {filter: _filter},
    cache: false,
    success: function (data) {
        $('#_index_product_type_list').html(data);
        generateDTable('product_type_list');
    }
});
$("#save_button").click(function ()
{
    var isNew = false;
    var projecttype_id = $("#projecttype_id").val();
    var projecttype_name = $("#projecttype_name").val();
    if (projecttype_id == '')
    {
        isNew = true;
    }
    if (projecttype_name == '')
    {
        inputbox_error_notification('projecttype_name', 'Please Enter Project Type Name');
    } else {
        $.ajax
                ({
                    type: "POST",
                    url: "_dbPage/_manage_product_type.php",
                    data: 'isNew=' + isNew.toString() + '&projecttype_id=' + projecttype_id + '&projecttype_name=' + projecttype_name,
                    datatype: "html",
                    success: function (result)
                    {
                        if (result.trim() == 1)
                        {
                            if (isNew == true)
                            {
                                modal_hide('projecttype_modal_box');
                                toastr_success('Added Successfully..!', '');
                            } else
                            {
                                modal_hide('projecttype_modal_box');
                                toastr_success('Updated Successfully..!', '');
                            }
                        } else
                        {
                            toastr_error();
                        }

                    }
                });
    }
});
$("#delete_button").click(function ()
{
    var uid = $("#delete_uid").val();
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_delete_product_type.php",
                data: 'uid=' + uid,
                datatype: "html",
                success: function (result)
                {
                    if (result == 1)
                    {
                        modal_hide('delete_modal_box');
                        toastr_success('Deleted Successfully..!', '');
                    } else
                    {
                        toastr_error();
                    }
                }
            });
});
function update_projecttype(id)
{
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_get_projecttype.php",
                data: {id: id},
                dataType: 'json',
                success: function (result)
                {
                    var len = result.length;
                    if (len != 0)
                    {
                        for (var i = 0; i < len; i++)
                        {
                            var projecttype_id = result[i]['projecttype_id'];
                            var projectype_name = result[i]['projectype_name'];
                            if (len > 0)
                            {
                                $("#projecttype_id").val(projecttype_id);
                                $("#projecttype_name").val(projectype_name);
                            }

                        }
                    }
                }
            });
}
function delete_projecttype(id)
{
    $("#delete_uid").val(id);
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