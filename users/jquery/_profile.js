$("#update_userprofile").on("submit", function (e) {
    var dataString = $(this).serialize();
    var isNew = true;
    var project_uid = $('#project_uid').val();
    if (project_uid != '')
    {
        isNew = false;
    }
    $.ajax({
        type: "POST",
        url: "_dbPage/update_userprofile.php",
        data: dataString + '&isNew=' + isNew.toString(),
        success: function (result)
        {
            if (result == 1)
            {
                if (isNew == true)
                {


                } else if (isNew == false)
                {
                    add_disabled('update_project');
                    toastr_success('Profile Updated Successfully..!', '/home');
                }
            } else
            {
                toastr_error();
            }
        }
    });
    e.preventDefault();
});
$("#save_password").click(function () {
    var isNew = false;
    var user_id = $("#user_id").val();
    var password = $("#password").val();
    if (user_id == '')
    {
        isNew = true;
    } else {
        $.ajax
                ({
                    type: "POST",
                    url: "_dbPage/_password_update.php",
                    data: 'isNew=' + isNew.toString() + '&user_id=' + user_id + '&password=' + password,
                    datatype: "html",
                    success: function (result)
                    {
                        if (result.trim() == 1)
                        {
                            if (isNew == true)
                            {
                                modal_hide('userprofile_pasword_modal');
                                toastr_success('Added Successfully..!', '');
                            } else
                            {
                                modal_hide('userprofile_pasword_modal');
                                toastr_success('Password Updated Successfully..!', '');
                            }
                        } else
                        {
                            toastr_error();
                        }

                    }
                });
    }
});
function password_check()
{
    var password = $("#password").val();
    var confirm_password = $("#confirm_password").val();
    if (password != confirm_password)
    {
        $("#error_").html("Password Mismatch");
    } else {
        $("#error_").html("");
    }
}
