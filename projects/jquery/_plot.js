function load_block_Plots()
{
    var block_id = $("#block_id").val();
    if (block_id == "")
    {
        add_hidden('add_button_plot');
    } else if (block_id != "")
    {
        remove_hidden('add_button_plot');
    }
    $('#max_plot_no').val('')
    var block_id = $("#block_id").val();
    var project_uid = $("#project_uid").val();
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/get_block_plots.php",
                data: {block_id: block_id, project_uid: project_uid},
                dataType: 'json',
                success: function (result)
                {
                    $('#lst_plots').empty();
                    var len = result.length;
                    $('#max_plot_no').val(len);
                    if (len != 0)
                    {
                        for (var i = 0; i < len; i++)
                        {
                            var plot_name = result[i]['plot_name'];
                            var plot_no_1 = result[i]['plot_no_1'];
                            var plot_id = result[i]['plot_id'];
                            var square_feet = result[i]['square_feet'];
                            var in_cent = result[i]['in_cent'];
                            var sqft_value = result[i]['sqft_value'];
                            plot_no = 0;
                            if (len > 0)
                            {
                                $("#lst_plots").append("<li class='row col-12 lst_plots'><div class='col-md-12'><input type='hidden' class='plotid' value ='" + plot_id + "'><input type='hidden' class='plotno' value ='" + plot_no_1 + "'><input class='col-md-3 plotname' placeholder='Plot Name' type='text' value ='" + plot_name + "'><input class='col-md-3 plotsqft' placeholder='In SQFt' type='number' value ='" + square_feet + "' onchange='SqftCent(this)'><input class='col-md-2 plotsqftvalue' placeholder='Sqft Value' type='number' value ='" + sqft_value + "'><input class='col-md-2 plotcent' onchange='CentSqft(this)' placeholder='In Cents' type='number' value ='" + in_cent + "'><button type='button' class='btn btn-danger' value ='" + plot_id + "' onclick='plot_delete(this)' style='height: 30px; width: 60px; '>Delete</button></div></li> ");
                            }
                        }
                    }
                }
            });
}
$("#add_plot").click(function ()
{
    var max_plot_no = $('#max_plot_no').val();
    var block_id = $("#block_id").val();
    var block_name = $("#block_id option:selected").text();
    var project_uid = $("#project_uid").val();
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/get_new_plotname.php",
                data: {block_id: block_id, project_uid: project_uid},
                dataType: 'json',
                success: function (result)
                {
                    var len = result.length;
                    if (len != 0)
                    {
                        var i = 0;
                        if (max_plot_no == '' || max_plot_no == 0) {
                            max_plot_no = parseInt(result[i]['plot_no']) - 1;
                        }
                        var plot_no = parseInt(result[i]['plot_no']);
                        if (plot_no >= max_plot_no) {
                            if (plot_no == max_plot_no) {
                                plot_no = parseInt(plot_no) + 1;
                            }
                        } else {
                            plot_no = parseInt(max_plot_no) + 1;
                        }
                        $('#max_plot_no').val(plot_no);
                        var plot_name = generatePlotName(block_name, plot_no);
                        var square_feet = 0; 
                        var in_cent = 0; 
                        plot_id = 0;
                        if (len > 0)
                        {
                            $("#lst_plots").append("<li class='row col-12 block_li'><div class='col-md-12 block_div'><input type='hidden' class='plotid' name='plot_id'value ='" + plot_id + "'><input type='hidden' class='plotno' value ='" + plot_no + "'><input class='col-md-3 plotname' placeholder='Plot Name' type='text' value ='" + plot_name + "'><input class='col-md-3 plotsqft' onchange='SqftCent(this)' placeholder='In SQFt' type='number' ><input class='col-md-2 plotsqftvalue' placeholder='Sqft Value' type='number' ><input class='col-md-2 plotcent' onchange='CentSqft(this)' placeholder='In Cents' type='number' ><button type='button' class='btn btn-danger' onclick='plot_delete(this)' style='height: 30px; width: 60px; '>Delete</button></div></li> ");
                        }
                    }
                }
            });
});
$("#save_plot").click(function ()
{
    var datas = [];
    $('#lst_plots li').each(function (i) {
        var plotdetail = {};
        plotdetail.project = $("#project_uid").val();
        plotdetail.blockid = $("#block_id").val();
        plotdetail.plotid = $(this).find(".plotid").val();
        plotdetail.plotno = $(this).find(".plotno").val();
        plotdetail.plotname = $(this).find(".plotname").val();
        plotdetail.plotsqft = $(this).find(".plotsqft").val();
        plotdetail.plotsqftvalue = $(this).find(".plotsqftvalue").val();
        plotdetail.plotcent = $(this).find(".plotcent").val();
        datas.push(plotdetail);
    })
    $.ajax({
        url: "_dbPage/_insert_plots.php",
        method: 'POST',
        data: JSON.stringify(datas),
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (result)
        {
            if (result != 0)
            {
                modal_hide('plot_modal_box');
                toastr_success('Plot Added Success..!', '');
            } else if (result == 0)
            {
                toastr_error();
            }
        }
    });
});
function generatePlotName(blockName, plotNo) {
    var _number = parseInt(plotNo) + 10000;
    var _strnumber = blockName + _number.toString().substring(1, 5);
    return _strnumber;
}
function SqftCent(sqft_value) {
    var sqft_ = $(sqft_value).val();
    $(sqft_value).parent('div').find('.plotcent').val(calcSqftCent(sqft_));

}
function CentSqft(cent_value) {
var cent_ = $(cent_value).val();
    $(cent_value).parent('div').find('.plotsqft').val(calcentSqft(cent_));
}
$(document).ready(function () {
    var project_uid = $("#project_uid").val();
    count_plots('plot_count', project_uid);
});
function plot_delete(e)
{
    var plotid = $(e).val();
    var plotcount = $('#max_plot_no').val();
    if (plotid == '') {
        $(e).parent().parent().remove();
        $('#max_plot_no').val(plotcount -1);
        return false;
    }
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_delete_plot.php",
                data: 'id=' + plotid,
                datatype: "html",
                success: function (result)
                {
                    if (result == 1)
                    {
                        $('#max_plot_no').val(plotcount -1);
                        load_block_Plots();
                        toastr_success_no_redirect('Deleted Successfully..!', '');
                    } else
                    {
                        toastr_error();
                    }
                }
            });
}