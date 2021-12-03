$("#test_connection").click(function () {
    var input_host = $("#input_host").val();
    var input_username = $("#input_username").val();
    var input_password = $("#input_password").val();
    if (input_host == '')
    {
        $("#error_notification").html("Please Enter Hostname");
    } else if(input_username == '')
    {
        $("#error_notification").html("Please Enter Username");
    }else {
        $.ajax
                ({
                    type: "POST",
                    url: "db_check.php",
                    data: {'input_host': input_host, 'input_username': input_username, 'input_password': input_password},
                    dataType: 'json',
                    success: function (result)
                    {
                        if (result == 1)
                        {
                            $("#success_notification").html("Connection Success"); 
                            $("#testbutton_div").attr('hidden', true);
                            $("#createdb_div").removeAttr("hidden");
                            $("#dbname_div").removeAttr("hidden");
                            $("#input_host").attr('readonly', true);
                            $("#input_username").attr('readonly', true);
                            $("#input_password").attr('readonly', true);

                        } 
                    }
                });
    }

});
$("#create_db").click(function () {
    var input_host = $("#input_host").val();
    var input_username = $("#input_username").val();
    var input_password = $("#input_password").val();
    var input_dbname = $("#input_dbname").val();
    if(input_dbname == '')
    {
        $("#error_notification").html("Please Enter Databasename"); 
        $("#success_notification").html(""); 
    }
    else{
        $.ajax
                ({
                    type: "POST",
                    url: "create_db.php",
                    data: {'input_host': input_host, 'input_username': input_username, 'input_password': input_password, 'input_dbname': input_dbname},
                    dataType: 'json',
                    success: function (result)
                    {
                        if (result == 1)
                        {
                            $("#success_notification").html("Database Created"); 
                        } 
                    }
                });
    }
});
function remove_notification(input)
{
    $("#" + input).html("");
}