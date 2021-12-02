var url_string = window.location.href;
var url = new URL(url_string);
var _filter = url.searchParams.get("id");
$.ajax({
    url: "viewlist/_payments_viewlist.php",
    type: "POST",
    data: {filter: _filter},
    cache: false,
    success: function (data) {
        $('#_index_payments_report').html(data);
        generateDTable('payments_report');
    }
});
$(document).ready(function () {
    load_Plots('plot_id');
    check_lead_sales();
    load_salesinvoive('sales_invoice');
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
                    toastr_success('Leads Added Successfully..!', '');
                } else if (isNew == false)
                {
                    add_disabled('update_leads');
                    toastr_success('Leads Updated Successfully..!', '');
                }
            } else
            {
                toastr_error();
            }

        }
    });
    e.preventDefault();
});
$("#save_payments").click(function ()
{
    var isNew = false;
    var payments_uid = $("#payments_uid").val();
    var sales_invoice = $("#sales_invoice").val();
    var lead_id = $("#lead_id").val();
    var payments_date = $("#payments_date").val();
    var payments_reference_auto_no = $("#payments_reference_auto_no").val();
    var payments_reference_auto_name = $("#payments_reference_auto_name").val();
    var plot_id = $("#plot_id").val();
    var payments_amount = $("#payments_amount").val();
    var payments_ref = $("#payments_ref").val();
    var sms_email_value = $("#sms_email_value").val();
    var payments_order_ref = $("#payments_order_ref").val();
    var payment_method = $("#payment_method").val() == '' ? 0 : $("#payment_method").val();
    var img_name = $("#img_name").val();
    if (payments_uid == '')
    {
        isNew = true;
    }
    if(payment_method == 1 && img_name =='')
    {
        $("#image_required").html('Receipt Should be upload');
        return false;

    }
    else{removehidden_class('save_payments');}

    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_manage_payments.php",
                data: 'isNew=' + isNew.toString() + '&payments_uid=' + payments_uid + '&sales_invoice=' + sales_invoice + '&lead_id=' + lead_id + '&payments_date=' + payments_date + '&payments_reference_auto_no=' + payments_reference_auto_no + '&payments_reference_auto_name=' + payments_reference_auto_name + '&plot_id=' + plot_id + '&payments_amount=' + payments_amount + '&payments_ref=' + payments_ref + '&payments_order_ref=' + payments_order_ref + '&payment_method=' + payment_method + '&img_name=' + img_name + '&sms_email_value=' + sms_email_value,
                datatype: "html",
                success: function (result)
                {
                    if (result == 1)
                    {
                        if (isNew == true)
                        {
                            modal_hide('payments_modal_box');
                            toastr_success('Payment Added Successfully..!', '');
                        } else if (isNew == false)
                        {
                            modal_hide('payments_modal_box');
                            toastr_success('Payment Updated Successfully..!', '');
                        }
                    } else
                    {
                        toastr_error();
                    }
                }
            });
});
$("#payment_delete").click(function ()
{
    var uid = $("#deletepayment_id").val();
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_delete_payment.php",
                data: 'uid=' + uid,
                datatype: "html",
                success: function (result)
                {
                    if (result == 1)
                    {
                        modal_hide('deletepayment_modal_box');
                        toastr_success('Payment Deleted Successfully..!', '');
                    } else
                    {
                        toastr_error();
                    }
                }
            });
});
function update_payment(id)
{
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_get_payment_details.php",
                data: {id: id},
                dataType: 'json',
                success: function (result)
                {
                    var len = result.length;
                    if (len != 0)
                    {
                        for (var i = 0; i < len; i++)
                        {
                            var payment_id = result[i]['payment_id'];
                            var sales_id = result[i]['sales_id'];
                            var payment_date = result[i]['payment_date'];
                            var lead_id = result[i]['lead_id'];
                            var payment_auto_number = result[i]['payment_auto_number'];
                            var payment_auto_name = result[i]['payment_auto_name'];
                            var plot_id = result[i]['plot_id'];
                            var payment_amount = result[i]['payment_amount'];
                            var payment_reference = result[i]['payment_reference'];
                            var order_reference = result[i]['order_reference'];
                            var payment_method = result[i]['payment_method'];
                            var receipt_imgname = result[i]['receipt_imgname'];
                            var sms_email_value = result[i]['sms_email_value'];
                            var is_paid = result[i]['is_paid'];
                            if (len > 0)
                            {
                                $("#payments_uid").val(payment_id);
                                $("#sales_invoice").val(sales_id);
                                $("#lead_id").val(lead_id);
                                $("#payments_reference_auto_no").val(payment_auto_number);
                                $("#payments_reference_auto_name").val(payment_auto_name);
                                $("#payments_date").val(payment_date);
                                $("#plot_id").val(plot_id);
                                $("#existing_payments_amount").val(payment_amount);
                                $("#payments_amount").val(payment_amount);
                                $("#payments_ref").val(payment_reference);
                                $("#payments_order_ref").val(order_reference);
                                $("#payment_method").val(payment_method);
                                $("#img_name").val(receipt_imgname);
                                $("#sms_email_value").val(sms_email_value);
                                $("#paid_status").val(is_paid);
                                if (payment_method == 1) {
                                    removehidden_class('receipt_div');
                                    addhidden_class('online_div');
                                    removehidden_class('image_display_div');
                                    $("#receipt_display").attr("src", "/payment_receipt/" + receipt_imgname);
                                } else if (payment_method == 2 || payment_method == 3)
                                {
                                    addhidden_class('receipt_div');
                                    addhidden_class('image_display_div');
                                    removehidden_class('online_div');
                                }
                                
                            }
                        }
                    }
                  payment_amount_update();
                }
            });
}
function check_lead_sales()
{
    var lead_id = $("#leads_uid").val();
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_check_leadsales.php",
                data: 'id=' + lead_id,
                datatype: "html",
                success: function (result)
                {
                    if (result > 0)
                    {
                        removehidden_class('payment_section');
                    } else
                    {
                        addhidden_class('payment_section');
                    }
                }
            });
}
$("#payment_method").change(function () {

    var payment_method = $("#payment_method").val();
    if (payment_method == 1)
    {
        removehidden_class('receipt_div');
        addhidden_class('online_div');
    } else if (payment_method == 2 || payment_method == 3)
    {
        addhidden_class('receipt_div');
        removehidden_class('online_div');
        addhidden_class('image_display_div');
        $("#img_name").val('');
        $("#sms_email_value").val($("#leads_email").val());
    }
});
$("#image_upload").change(function () {
    $("#button_upload_image").click();
});
$("#button_upload_image").click(function () {

    var fd = new FormData();
    var files = $('#image_upload')[0].files;

    // Check file selected or not
    if (files.length > 0) {
        fd.append('image_upload', files[0]);

        $.ajax({
            url: '_dbPage/_receipt_upload.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response != 0) {
                    $("#img_name").val(response);
                    $("#receipt_display").attr("src", "/payment_receipt/" + response);
                    removehidden_class('image_display_div');
                } else {
                    alert('file not uploaded');
                }
            },
        });
    } else {
        alert("Please select a file.");
    }
});
$("#sales_invoice").change(function () {
    var sales_invoice = $("#sales_invoice").val();
    payment_amount();
});
function payment_amount()
{
    
    var sales_invoice = $("#sales_invoice").val();
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_get_salespending_amt.php",
                data: {sales_invoice: sales_invoice},
                dataType: 'json',
                success: function (result)
                {
                    var len = result.length;
                    if (len != 0)
                    {
                        for (var i = 0; i < len; i++)
                        {
                            var paid_amount = result[i]['paid_amount'];
                            var plot_id = result[i]['plot_id'];

                            if (len > 0)
                            {
                                $("#payments_amount").val(paid_amount);
                                 $("#existing_payments_amount").val(paid_amount);
                                $("#plot_id").val(plot_id);
                                if (paid_amount == 0)
                                {
                                    addhidden_class('save_payments');
                                }
                            }
                        }
                    }
                }
            });
}
function payment_amount_update()
{
    
    var sales_invoice = $("#sales_invoice").val();
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_get_salespending_amt.php",
                data: {sales_invoice: sales_invoice},
                dataType: 'json',
                success: function (result)
                {
                    var len = result.length;
                    if (len != 0)
                    {
                        for (var i = 0; i < len; i++)
                        {
                            var paid_amount = result[i]['paid_amount'];
                            var plot_id = result[i]['plot_id'];

                            if (len > 0)
                            {
                                
                                 $("#existing_payments_amount").val(paid_amount);
                                $("#plot_id").val(plot_id);
                                if (paid_amount == 0)
                                {
                                    addhidden_class('save_payments');
                                }
                            }
                        }
                    }
                }
            });
}
function add_payment()
{
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_get_paymentnumber.php",
                data: {},
                dataType: 'json',
                success: function (result)
                {
                    var len = result.length;
                    if (len > 0)
                    {
                        var i = 0;
                        var payment_number = parseInt(result[i]['payment_number']);
                        new_payment_number = payment_number + 1;
                        var payment_name = generatepaymentname(new_payment_number);
                        $("#payments_reference_auto_no").val(new_payment_number);
                        $("#payments_reference_auto_name").val(payment_name);
                    }
                }
            });
}
function generatepaymentname(new_payment_number) {
    var _number = parseInt(new_payment_number) + 1000000000;
    var _strnumber = "RC-" + _number.toString().substring(1, 10);
    return _strnumber;
}
function amount_check()
{
    var existing_amount = parseFloat($("#existing_payments_amount").val());
    var payments_amount = parseFloat($("#payments_amount").val());
    if(existing_amount < payments_amount)
    {
        $("#num_word").html('Amount Entered exceeds');
       add_disabled('save_payments');
    }else{
        remove_disabled('save_payments');
        $("#num_word").html('');
    }
}