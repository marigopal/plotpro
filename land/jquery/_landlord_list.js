var url_string = window.location.href;
var url = new URL(url_string);
var _filter = url.searchParams.get("id");
if (_filter == '')
{
    window.location.href = '/land/';
}
$.ajax({
    url: "viewlist/landlord_viewlist.php",
    type: "POST",
    data: {filter: _filter},
    cache: false,
    success: function (data) {
        $('#_index_landlord_report').html(data);
        generateDTable('landlord_report');
    }
});
$("#update_land").on("submit", function (e) {
    var dataString = $(this).serialize();
    var isNew = true;
    var land_id = $('#land_uid').val();
    if (land_id != '')
    {
        isNew = false;
    }
    $.ajax({
        type: "POST",
        url: "_dbPage/_manage_land.php",
        data: dataString + '&isNew=' + isNew.toString() + '&land_id=' + land_id,
        success: function (result)
        {
            if (result != '')
            {
                if (isNew == true)
                {
                    toastr_success_parameter('Land Added Successfully..!', 'landlord_list', result)
                } else if (isNew == false)
                {
                    add_disabled('update_land_button');
                    toastr_success('Land Updated Successfully..!', '');
                }
            } else
            {
                toastr_error();
            }
        }
    });
    e.preventDefault();
});

$("#save_landlord").click(function ()
{
    var isNew = false;
    var land_uid = $("#land_uid").val();
    var landlord_uid = $("#landlord_uid").val();
    var landlord_name = $("#landlord_name").val();
    var landlord_bought_from = $("#landlord_bought_from").val();
    var landlord_bought_on = $("#landlord_bought_on").val();
    var landlord_sold_on = $("#landlord_sold_on").val();
    var landlord_bought_value = $("#landlord_bought_value").val() == '' ? 0 : parseFloat($("#landlord_bought_value").val());
    var landlord_sold_value = $("#landlord_sold_value").val() == '' ? 0 : parseFloat($("#landlord_sold_value").val());
    if (landlord_uid == '')
    {
        isNew = true;
    }
    if(landlord_name == '')
    {
        toastr_error_msg('Please Enter Landlord Name.');
    }else{
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_manage_landlord.php",
                data: 'isNew=' + isNew.toString() + '&land_uid=' + land_uid + '&landlord_uid=' + landlord_uid + '&landlord_name=' + landlord_name + '&landlord_bought_from=' + landlord_bought_from + '&landlord_bought_on=' + landlord_bought_on + '&landlord_sold_on=' + landlord_sold_on + '&landlord_bought_value=' + landlord_bought_value + '&landlord_sold_value=' + landlord_sold_value,
                datatype: "html",
                success: function (result)
                {
                    if (result == 1)
                    {
                        if (isNew == true)
                        {
                            modal_hide('landlord_modal_box');
                            toastr_success('Landlord Added Successfully..!', '')
                        } else if (isNew == false)
                        {
                            modal_hide('landlord_modal_box');
                            toastr_success('Landlord Updated Successfully..!', '');
                        }
                    } else
                    {
                        toastr_error();
                    }
                }
            });
        }
});
$("#delete_landlord").click(function ()
{
    var uid = $("#deletelord_uid").val();
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_delete_landlord.php",
                data: 'uid=' + uid,
                datatype: "html",
                success: function (result)
                {
                    if (result == 1)
                    {
                        modal_hide('deletelord_modal_box');
                        toastr_success('Landlord Deleted Successfully..!', '');
                    } else
                    {
                        toastr_error();
                    }
                }
            });
});
$("#landlord_bought_from").change(function () {
    var id = $(this).val();

    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_get_boughtfrom.php",
                data: {id: id},
                dataType: 'json',
                success: function (result)
                {
                    var len = result.length;
                    if (len != 0)
                    {
                        for (var i = 0; i < len; i++)
                        {
                            var sold_on = result[i]['sold_on'];
                            var sold_value = result[i]['sold_value'];
                            if (len > 0)
                            {
                                $("#landlord_bought_on").val(sold_on);
                                $("#landlord_bought_value").val(sold_value);
                            }
                        }
                    }
                }
            });
});
function update_landlord(id)
{
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_get_landlorddetails.php",
                data: {id: id},
                dataType: 'json',
                success: function (result)
                {
                    var len = result.length;
                    if (len != 0)
                    {
                        for (var i = 0; i < len; i++)
                        {
                            var land_id = result[i]['land_id'];
                            var landlord_id = result[i]['landlord_id'];
                            var landlord_name = result[i]['landlord_name'];
                            var bought_on = result[i]['bought_on'];
                            var sold_on = result[i]['sold_on'];
                            var bought_value = result[i]['bought_value'];
                            var sold_value = result[i]['sold_value'];
                            var bought_from_landlord_id = result[i]['bought_from_landlord_id'];
                            if (len > 0)
                            {
                                $('#land_uid').val(land_id);
                                $('#landlord_uid').val(landlord_id);
                                $('#landlord_name').val(landlord_name);
                                $('#landlord_bought_from').val(bought_from_landlord_id);
                                $('#landlord_bought_on').val(bought_on);
                                $('#landlord_sold_on').val(sold_on);
                                $('#landlord_bought_value').val(bought_value);
                                $('#landlord_sold_value').val(sold_value);
                            }
                        }
                    }
                }
            });
}
function delete_landlord(id)
{
    $("#deletelord_uid").val(id);
}
$(document).ready(function () {
    load_landlord('landlord_bought_from');
});
$("#land_acers").keyup(function () {
    var acres = $(this).val();
    result_cent = acre_cent(acres);
    $("#land_cent").val(result_cent);
});
$("#land_cent").keyup(function () {
    var cent = $(this).val();
    result_acres = cent_acre(cent);
    $("#land_acers").val(result_acres);
});