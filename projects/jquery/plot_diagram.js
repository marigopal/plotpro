function get_block()
{
    var project_uid = $("#project_uid").val();
    var plots = new Array();
    $.ajax
            ({
                type: "POST",
                url: "/include/_dbPage/load_plots.php",
                data: {projectid: project_uid},
                dataType: 'json',
                success: function (result)
                {
                    var len = result.length;
                    if (len != 0)
                    {
                        plots = result;
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_get_diagram_block.php",
                data: {project_uid: project_uid},
                dataType: 'json',
                success: function (result)
                {
                    var strHTML = "";
                    var len = result.length;
                    var len_plots = plots.length;

                    if (len != 0)
                    {
                        strHTML = "<div class='row><div class='col-md-12 grid-margin' >";
                        for (var i = 0; i < len; i++)
                        {
                            var block_id = result[i]['block_id'];
                            var block_name = result[i]['block_name'];

                            if (len_plots > 0)
                            {
                                strHTML += "<div class=row'><div class='col-md-2'> " + block_name + " </div><div class='row col-md-12 strech-card' id='plot_div'>";

                                for (var j = 0; j < len_plots; j++) {
                                    var btnColor = " btn-secondary ";
                                    var blockid = plots[j]['block_id'];
                                    var plot_name = plots[j]['plot_name'];
                                    var is_sold = plots[j]['is_sold'];
                                    var sqft_value = plots[j]['sqft_value'];
                                    if (blockid == block_id) {
                                        if (sqft_value > 0) {
                                            if (is_sold == 0) {
                                                btnColor = " btn-success";
                                            } else {
                                                btnColor = " btn-danger ";
                                            }
                                        }
                                        strHTML += "<div class='btn " + btnColor + " col-md-2 mr-3 mt-2'>" + plot_name + "</div>";
                                    }
                                }
                                strHTML += "</div></div>";
                            }
                        }
                        console.log(strHTML);
                        $("#diagram_div").empty();
                        $("#diagram_div").append(strHTML);
                    }
                }

            });
}
function get_plot(block_id)
{
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_get_diagram_plots.php",
                data: {block_id: block_id},
                dataType: 'json',
                success: function (result)
                {
                    var len = result.length;
                    if (len != 0)
                    {
                        for (var i = 0; i < len; i++)
                        {
                            var plot_id = result[i]['plot_id'];
                            var plot_name = result[i]['plot_name'];
                            if (len > 0)
                            {
                                $("#plot_div").append("<div class='btn btn-secondary col-sm-1'>" + plot_name + "</div>");
                            }
                        }
                    }
                }
            });
}