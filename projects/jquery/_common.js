$("#land_id").change(function ()
{
    var land_id = $("#land_id").val();
    if (land_id == "")
    {
        $("#land_location").val('');
        $("#land_landmark").val('');
        $("#land_latitude").val('');
        $("#land_longitude").val('');
    }
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/assign_land_info.php",
                data: {land_id: land_id},
                dataType: 'json',
                success: function (result)
                {
                    var len = result.length;
                    if (len != 0)
                    {
                        var i = 0
                        var land_location = result[i]['land_location'];
                        var landmark = result[i]['landmark'];
                        var latitude = result[i]['latitude'];
                        var longitude = result[i]['longitude'];
                        if (len > 0)
                        {
                            $("#land_location").val(land_location);
                            $("#land_landmark").val(landmark);
                            $("#land_latitude").val(latitude);
                            $("#land_longitude").val(longitude);
                        }
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
});
$("#easy_emi_checkbox").click(function ()
{
    if ($("#easy_emi_checkbox").is(':checked')) {
        $("#easy_emi").val('1');
        $('#easy_emi_checkbox').prop('checked', true);
    } else {
        $("#easy_emi").val('0');
        $('#easy_emi_checkbox').prop('checked', false);
    }
});
$("#dtcp_status_checkbox").click(function () {
     if ($("#dtcp_status_checkbox").is(':checked')) {
        $("#dtcp_status").val('1');
        $('#dtcp_status_checkbox').prop('checked', true);
    } else {
        $("#dtcp_status").val('0');
        $('#dtcp_status_checkbox').prop('checked', false);
    }
});
$("#patta_status_checkbox").click(function () {
    if ($("#patta_status_checkbox").is(':checked')) {
        $("#patta_status").val('1');
        $('#patta_status_checkbox').prop('checked', true);
    } else {
        $("#patta_status").val('0');
        $('#patta_status_checkbox').prop('checked', false);
    }
});
$("#chitta_status_checkbox").click(function () {
    if ($("#chitta_status_checkbox").is(':checked')) {
        $("#chitta_status").val('1');
        $('#chitta_status_checkbox').prop('checked', true);
    } else {
        $("#chitta_status").val('0');
        $('#chitta_status_checkbox').prop('checked', false);
    }
});
$("#easy_emi").val() == '1' ? $('#easy_emi_checkbox').prop('checked', true) : $('#easy_emi_checkbox').prop('checked', false);
$("#dtcp_status").val() == '1' ? $('#dtcp_status_checkbox').prop('checked', true) : $('#dtcp_status_checkbox').prop('checked', false);
$("#patta_status").val() == '1' ? $('#patta_status_checkbox').prop('checked', true) : $('#patta_status_checkbox').prop('checked', false);
$("#chitta_status").val() == '1' ? $('#chitta_status_checkbox').prop('checked', true) : $('#chitta_status_checkbox').prop('checked', false);