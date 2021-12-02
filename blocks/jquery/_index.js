var url_string = window.location.href;
var url = new URL(url_string);
var _filter = url.searchParams.get("filter");
$.ajax({
    url: "viewlist/blocks_viewlist.php",
    type: "POST",
    data: {filter: _filter},
    cache: false,
    success: function (data) {
        $('#_index_blocks_list').html(data);
        generateDTable('blocks_list');
    }
});
$("#save_button").click(function ()
{
    var isNew = false;
    var blocks_id = $("#blocks_id").val();
    var blocks_name = $("#blocks_name").val();
    if (blocks_id == '')
    {
        isNew = true;
    }
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_manage_blocks.php",
                data: 'isNew=' + isNew.toString() + '&blocks_id=' + blocks_id + '&blocks_name=' + blocks_name,
                datatype: "html",
                success: function (result)
                {
                    if (result.trim() == 1)
                    {
                        if (isNew == true)
                        {
                            modal_hide('blocks_modal_box');
                            toastr_success('Block Added Successfully..!', '');
                        } else
                        {
                            modal_hide('blocks_modal_box');
                            toastr_success('Block Updated Successfully..!', '');
                        }
                    } else
                    {
                        toastr_error();
                    }
                }
            });
});
$("#delete_button").click(function ()
{
    var uid = $("#delete_uid").val();
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_delete_blocks.php",
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
function update_blocks(id)
{
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_get_blocks.php",
                data: {id: id},
                dataType: 'json',
                success: function (result)
                {
                    var len = result.length;
                    if (len != 0)
                    {
                        for (var i = 0; i < len; i++)
                        {
                            var block_name = result[i]['block_name'];
                            if (len > 0)
                            {
                                $("#blocks_id").val(id);
                                $("#blocks_name").val(block_name);
                            }
                        }
                    }
                }
            });
}
function delete_blocks(id)
{
    $("#delete_uid").val(id);
}