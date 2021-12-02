var url_string = window.location.href;
var url = new URL(url_string);
var _filter = url.searchParams.get("filter");
$.ajax({
    url: "viewlist/land_viewlist.php",
    type: "POST",
    data: {filter: _filter},
    cache: false,
    success: function (data) {
        $('#_index_land_report').html(data);
        generateDTable('land_report');
    }
});
$("#save_button").click(function ()
{
    var isNew = false;
    var land_id = $("#land_id").val();
    var land_name = $("#land_name").val();
    var land_location = $("#land_location").val();
    var land_landmark = $("#land_landmark").val();
    var land_acers = $("#land_acers").val() == '' ? 0 : parseFloat($("#land_acers").val());
    var land_value = $("#land_value").val() == '' ? 0 : parseFloat($("#land_value").val());
    var land_cent = $("#land_cent").val() == '' ? 0 : parseFloat($("#land_cent").val());
    var land_square_feet = $("#land_square_feet").val() == '' ? 0 : parseFloat($("#land_square_feet").val());
    var land_latitude = $("#land_latitude").val() == '' ? 0 : parseFloat($("#land_latitude").val());
    var land_longitude = $("#land_longitude").val() == '' ? 0 : parseFloat($("#land_longitude").val());
    if (land_id == '')
    {
        isNew = true;
    }
    if (land_name == '')
    {
        inputbox_error_notification('land_name', 'Please Enter Land Name');
    } else {
        $.ajax
                ({
                    type: "POST",
                    url: "_dbPage/_manage_land.php",
                    data: 'isNew=' + isNew.toString() + '&land_id=' + land_id + '&land_name=' + land_name + '&land_location=' + land_location + '&land_landmark=' + land_landmark + '&land_acers=' + land_acers + '&land_value=' + land_value + '&land_cent=' + land_cent + '&land_square_feet=' + land_square_feet + '&land_latitude=' + land_latitude + '&land_longitude=' + land_longitude,
                    datatype: "html",
                    success: function (result)
                    {
                        if (result.trim() != '')
                        {
                            if (isNew == true)
                            {
                                modal_hide('land_modal_box');
                                toastr_success_parameter('Land Added Successfully..!', '/land/landlord_list', result);
                            } else
                            {
                                modal_hide('land_modal_box');
                                toastr_success('Land Updated Successfully..!', '');
                            }
                        } else
                        {
                            toastr_error();
                        }
                    }
                });
    }
});
$("#delete_land").click(function ()
{
    var uid = $("#deleteland_uid").val();
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_delete_land.php",
                data: 'uid=' + uid,
                datatype: "html",
                success: function (result)
                {
                    if (result == 1)
                    {
                        modal_hide('deleteland_modal_box');
                        toastr_success('Deleted Successfully..!', '');
                    } else if (result == 2)
                    {
                        modal_hide('deleteland_modal_box');
                        toastr_error_msg('Landlord records are available.! Please remove Landlord records first..!');
                    } else {
                        toastr_error();
                    }
                }
            });
});
$("#land_acers").change(function () {
    var acres = $(this).val();
    result_cent = acre_cent(acres);
    $("#land_cent").val(result_cent);
});
$("#land_cent").change(function () {
    var cent = $(this).val();
    result_acres = cent_acre(cent);
    $("#land_acers").val(result_acres);
});
function update_land(id)
{
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_getlanddetails.php",
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
                            var landlord_name = result[i]['landlord_name'];
                            var land_location = result[i]['land_location'];
                            var landmark = result[i]['landmark'];
                            var latitude = result[i]['latitude'];
                            var longitude = result[i]['longitude'];
                            var land_total_acres = result[i]['land_total_acres'];
                            var land_total_value = result[i]['land_total_value'];
                            var land_sqft_value = result[i]['land_sqft_value'];
                            var land_total_cent = result[i]['land_total_cent'];
                            if (len > 0)
                            {
                                $('#land_id').val(land_id);
                                $('#land_name').val(landlord_name);
                                $('#land_location').val(land_location);
                                $('#land_landmark').val(landmark);
                                $('#land_acers').val(land_total_acres);
                                $('#land_value').val(land_total_value);
                                $('#land_cent').val(land_total_cent);
                                $('#land_square_feet').val(land_sqft_value);
                                $('#land_latitude').val(latitude);
                                $('#land_longitude').val(longitude);
                            }
                        }
                    }
                }
            });
}
function delete_land(id)
{
    $("#deleteland_uid").val(id);
}