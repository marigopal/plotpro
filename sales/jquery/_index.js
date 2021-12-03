var url_string = window.location.href;
var url = new URL(url_string);
var _filter = url.searchParams.get("filter");
$.ajax({
    url: "viewlist/sales_viewlist.php",
    type: "POST",
    data: {filter: _filter},
    cache: false,
    success: function (data) {
        $('#_index_sales_report').html(data);
        generateDTable('sales_list');
    }
});
$("#save_plotsales").click(function ()
{
    var max_sales = $('#max_plot_no').val();
    var isNew = false;
    var plotsales_uid = $("#plotsales_uid").val();
    var sales_no = $("#sales_no").val();
    var sales_name = $("#sales_name").val();
    var project_id = $("#project_id").val();
    var block_id = $("#block_id").val();
    var lead_id = $("#lead_id").val();
    var plot_id = $("#plot_id").val();
    var sqft_value = $("#sqft_value").val() == '' ? 0 : parseFloat($("#sqft_value").val());
    var total_sqft_value = $("#total_sqft_value").val() == '' ? 0 : parseFloat($("#total_sqft_value").val());
    var cent_value = $("#cent_value").val() == '' ? 0 : parseFloat($("#cent_value").val());
    var total_cent = $("#total_cent").val() == '' ? 0 : parseFloat($("#total_cent").val());
    var net_cost = $("#net_cost").val() == '' ? 0 : parseFloat($("#net_cost").val());
    var reg_cost = $("#reg_cost").val() == '' ? 0 : parseFloat($("#reg_cost").val());
    var total_cost = $("#total_cost").val() == '' ? 0 : parseFloat($("#total_cost").val());
    var initial_amt = $("#initial_amt").val() == '' ? 0 : parseFloat($("#initial_amt").val());
    var maximum_month = $("#maximum_month").val() == '' ? 0 : parseFloat($("#maximum_month").val());
    var immediate_value = $("#immediate_value").val() == '' ? 0 : parseFloat($("#immediate_value").val());
    var emi_value = $("#emi_value").val() == '' ? 0 : parseFloat($("#emi_value").val());
    var emi_amt = $("#emi_amt").val() == '' ? 0 : parseFloat($("#emi_amt").val());
    var flexi_value = $("#flexi_value").val() == '' ? 0 : parseFloat($("#flexi_value").val());
    if (plotsales_uid == '')
    {
        isNew = true;
    }
    if(lead_id == 0)
    {
        toastr_error_msg('Please Select Lead.');
    }else if(project_id == 0)
    {
        toastr_error_msg('Please Select Project.');
    }else if(block_id == 0)
    {
        toastr_error_msg('Please Select Block.');
    }else if(plot_id == 0)
    {
        toastr_error_msg('Please Select Plot.');
    }else{
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_manage_plosales.php",
                data: 'isNew=' + isNew.toString() + '&plotsales_uid=' + plotsales_uid + '&sales_no=' + sales_no + '&sales_name=' + sales_name + '&project_id=' + project_id + '&block_id=' + block_id + '&lead_id=' + lead_id + '&plot_id=' + plot_id + '&sqft_value=' + sqft_value + '&total_sqft_value=' + total_sqft_value + '&cent_value=' + cent_value + '&total_cent=' + total_cent + '&net_cost=' + net_cost + '&reg_cost=' + reg_cost + '&total_cost=' + total_cost + '&initial_amt=' + initial_amt + '&immediate_value=' + immediate_value + '&maximum_month=' + maximum_month + '&emi_value=' + emi_value + '&emi_amt=' + emi_amt + '&flexi_value=' + flexi_value,
                datatype: "html",
                success: function (result)
                {
                    if (result == 1)
                    {
                        if (isNew == true)
                        {
                            modal_hide('salesplot_modal_box');
                            toastr_success('Sales Addeded Successfully..!', '');
                        } else
                        {
                            modal_hide('salesplot_modal_box');
                            toastr_success('Sales Updated Successfully..!', '');
                        }
                    } else
                    {
                        toastr_error();
                    }
                }
            });
        }
});
$("#save_delete").click(function () 
{
    var salesdelete_uid = $("#salesdelete_uid").val();

    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_delete_plotsales.php",
                data: 'uid=' + salesdelete_uid,
                datatype: "html",
                success: function (result)
                {
                    if (result == 1)
                    {
                        modal_hide('salesdelete_modal_box');
                        toastr_success('Sales Deleted Successfully..!', '');
                    } else
                    {
                        toastr_error();
                    }
                }
            });

});
$("#emi_value").val() == '1' ? $('#emi_checkbox').prop('checked', true) : $('#emi_checkbox').prop('checked', false);
$("#flexi_value").val() == '1' ? $('#flexi_checkbox').prop('checked', true) : $('#flexi_checkbox').prop('checked', false);
$("#immediate_value").val() == '1' ? $('#immediate_checkbox').prop('checked', true) : $('#immediate_checkbox').prop('checked', false);
function update_sales(id)
{
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_get_plotsales.php",
                data: {id: id},
                dataType: 'json',
                success: function (result)
                {
                    var len = result.length;
                    if (len != 0)
                    {
                        for (var i = 0; i < len; i++)
                        {
                            var plotsale_id = result[i]['plotsale_id'];
                            var sales_number = result[i]['sales_number'];
                            var sales_name = result[i]['sales_name'];
                            var project_id = result[i]['project_id'];
                            var block_id = result[i]['block_id'];
                            var lead_id = result[i]['lead_id'];
                            var plot_id = result[i]['plot_id'];
                            var sqft_value = result[i]['sqft_value'];
                            var sqft_total = result[i]['sqft_total'];
                            var cent_value = result[i]['cent_value'];
                            var cent_total = result[i]['cent_total'];
                            var net_cost = result[i]['net_cost'];
                            var reg_amt = result[i]['reg_amt'];
                            var total_cost = result[i]['total_cost'];
                            var initial_payment = result[i]['initial_payment'];
                            var is_immediate_payment = result[i]['is_immediate_payment'];
                            var is_emi_converted = result[i]['is_emi_converted'];
                            var emi_amt = result[i]['emi_amt'];
                            var is_flexi_converted = result[i]['is_flexi_converted'];
                            var max_months_allowed = result[i]['max_months_allowed'];
                            if (len > 0)
                            {
                                $("#plotsales_uid").val(plotsale_id);
                                $("#sales_no").val(sales_number);
                                $("#sales_name").val(sales_name);
                                $("#project_id").val(project_id);
                                load_Blocks('block_id', project_id, block_id);
                                $("#lead_id").val(lead_id);
                                load_salesPlots('plot_id', project_id, block_id, plot_id, 1);
                                $("#sqft_value").val(sqft_value);
                                $("#total_sqft_value").val(sqft_total);
                                $("#cent_value").val(cent_value);
                                $("#total_cent").val(cent_total);
                                $("#net_cost").val(net_cost);
                                $("#reg_cost").val(reg_amt);
                                $("#total_cost").val(total_cost);
                                $("#immediate_value").val(is_immediate_payment);
                                $("#initial_amt").val(initial_payment);
                                $("#maximum_month").val(max_months_allowed);
                                $("#emi_value").val(is_emi_converted);
                                $("#emi_amt").val(emi_amt);
                                $("#flexi_value").val(is_flexi_converted);
                                emi_eligible();
                                if (is_emi_converted == 1)
                                {
                                    removehidden_class('emiamt_div');
                                    removehidden_class('maximum_month_div');
                                }
                                if (is_flexi_converted == 1)
                                {
                                    removehidden_class('maximum_month_div');
                                }
                            }
                        }
                    }
                    $("#immediate_value").val() == '1' ? $('#immediate_checkbox').prop('checked', true) : $('#immediate_checkbox').prop('checked', false);
                    $("#emi_value").val() == '1' ? $('#emi_checkbox').prop('checked', true) : $('#emi_checkbox').prop('checked', false);
                    $("#flexi_value").val() == '1' ? $('#flexi_checkbox').prop('checked', true) : $('#flexi_checkbox').prop('checked', false);
                }
            });
}
$(document).ready(function () {
    load_Project('project_id');
    load_leads('lead_id');
    load_Blocks('block_id');
    load_salesPlots('plot_id');
    check_immediate_default();
});
$("#project_id").change(function () {
    var project_id = $("#project_id").val();
    load_Blocks('block_id', project_id, null);
    emi_eligible();
    get_project_percentage('reg_percentage');
});
$("#block_id").change(function () {
    var project_id = $("#project_id").val();
    var block_id = $("#block_id").val();
    load_salesPlots('plot_id', project_id, block_id, null, 0);
});
$("#plot_id").change(function () {
    var id = $(this).val();
    var reg_percentage = $("#reg_percentage").val();
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_get_plot_detail.php",
                data: {id: id},
                dataType: 'json',
                success: function (result)
                {
                    var len = result.length;
                    if (len != 0)
                    {
                        for (var i = 0; i < len; i++)
                        {
                            var square_feet = result[i]['square_feet'];
                            var sqft_value = result[i]['sqft_value'];
                            var in_cent = result[i]['in_cent'];
                            var centvalue = sqft_value * 436;
                            var net_cost = in_cent * centvalue;
                            debugger;
                            var reg_cost = net_cost * reg_percentage / 100;
                            var total_cost = net_cost + reg_cost;
                            if (len > 0)
                            {
                                $("#sqft_value").val(sqft_value);
                                $("#total_sqft_value").val(square_feet);
                                $("#cent_value").val(centvalue);
                                $("#total_cent").val(in_cent);
                                $("#net_cost").val(net_cost);
                                $("#reg_cost").val(reg_cost);
                                $("#total_cost").val(total_cost);
                            }
                        }
                    }
                }
            });
});
function add_sales()
{
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_get_salesnumber.php",
                data: {},
                dataType: 'json',
                success: function (result)
                {
                    var len = result.length;
                    if (len > 0)
                    {
                        var i = 0;
                        var salesno = parseInt(result[i]['sales_number']);
                        new_salesno = salesno + 1;
                        var sales_name = generatesalesname(new_salesno);
                        $("#sales_no").val(new_salesno);
                        $("#sales_name").val(sales_name);
                    }
                }

            });
}
function generatesalesname(new_salesno) {
    var _number = parseInt(new_salesno) + 1000000000;
    var _strnumber = "IN-" + _number.toString().substring(1, 10);
    return _strnumber;
}
function emi_eligible()
{
    var project_id = $("#project_id").val();
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_getemi_eligible.php",
                data: {project_id: project_id},
                dataType: 'json',
                success: function (result)
                {
                    if (result == 1)
                    {
                        removehidden_class('emi_div');

                    } else {
                        addhidden_class('emi_div');
                    }
                }
            });
}
function get_project_percentage(input)
{
    var project_id = $("#project_id").val();
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_get_project_percentage.php",
                data: {project_id: project_id},
                dataType: 'json',
                success: function (result)
                {
                    var len = result.length;
                    if (len > 0)
                    {
                        var i = 0;
                        var reg_percentage = result[i]['reg_percentage'];
                        $("#" + input).val(reg_percentage);
                    }
                }
            });
}
function load_salesPlots(ddlName, projectid, block_id, selectedvalue, isnew) {
    $.ajax({
        type: "POST",
        url: "_dbPage/load_salesplots.php",
        data: {projectid: projectid, block_id: block_id, isnew: isnew},
        success: function (_result)
        {
            var result = JSON.parse(_result.replace('\n', ''));
            $('#' + ddlName).empty();
            var select_li_txt = "<option value='0'>Select</option>";
            $('#' + ddlName).append(select_li_txt);
            if (result != '')
            {
                $.each(result, function (i) {
                    var li_txt = "<option value='" + result[i].plot_id + "'>" + result[i].plot_name + "</option>";
                    $('#' + ddlName).append(li_txt);
                });
                if (selectedvalue != null) {
                    $('#' + ddlName).val(selectedvalue);
                }
            } 
        },
        error: function (err) {
            console.log(err);
        }
    });
}
function SqftCent() {

    $("#total_cent").val(calcSqftCent($("#total_sqft_value").val()));
    netcost();
    addnetcost_regcost();
}

function CentSqft() {
    $("#total_sqft_value").val(calcentSqft($("#total_cent").val()));
    netcost();
    addnetcost_regcost();
}
function centvalue()
{
    $("#cent_value").val(calCentvalue($("#sqft_value").val()));
    netcost();
    addnetcost_regcost();
}
function netcost()
{
    $("#net_cost").val(calcNetCost($("#cent_value").val(), $("#total_cent").val()));
}
function addnetcost_regcost() {
    var net_cost = parseInt($("#net_cost").val());
    var reg_cost = parseInt($("#reg_cost").val());
    new_totalcost = net_cost + reg_cost;
    $("#total_cost").val(new_totalcost);
}
function calcEmiamt()
{
    var totalcost = parseInt($("#total_cost").val());
    var emi_tenure = parseInt($("#maximum_month").val());
    $("#emi_amt").val(totalcost / emi_tenure);
}
function calcMaxtenure()
{
    var totalcost = parseInt($("#total_cost").val());
    var emi_amt = parseInt($("#emi_amt").val());
    $("#maximum_month").val((totalcost / emi_amt).toFixed(0));
}
function check_immediate_default()
{
    var immediate_value = $("#immediate_value").val();
    if (immediate_value == '')
    {
        $('#immediate_checkbox').prop('checked', true);
        $("#immediate_value").val('1');
    }
}
$("#emi_checkbox").click(function ()
{
    if ($("#emi_checkbox").is(':checked')) {
        $("#emi_value").val('1');
        $("#flexi_value").val('0');
        $("#immediate_value").val('0');
        $('#emi_checkbox').prop('checked', true);
        $('#flexi_checkbox').prop('checked', false);
        $('#immediate_checkbox').prop('checked', false);
        removehidden_class('emiamt_div');
        removehidden_class('maximum_month_div');
    }
});
$("#flexi_checkbox").click(function () {
    if ($("#flexi_checkbox").is(':checked')) {
        $("#flexi_value").val('1');
        $("#emi_value").val('0');
        $("#immediate_value").val('0');
        $('#flexi_checkbox').prop('checked', true);
        $('#emi_checkbox').prop('checked', false);
        $('#immediate_checkbox').prop('checked', false);
        addhidden_class('emiamt_div');
        removehidden_class('maximum_month_div');
        $("#emi_amt").val(0);
        $("#maximum_month").val('');
    }
});
$("#immediate_checkbox").click(function () {
    if ($("#immediate_checkbox").is(':checked')) {
        $("#flexi_value").val('0');
        $("#emi_value").val('0');
        $("#immediate_value").val('1');
        $('#immediate_checkbox').prop('checked', true);
        $('#flexi_checkbox').prop('checked', false);
        $('#emi_checkbox').prop('checked', false);
        addhidden_class('emiamt_div');
        addhidden_class('maximum_month_div');
        $("#emi_amt").val(0);
        $("#maximum_month").val('');
    }
});