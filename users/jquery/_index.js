var url_string = window.location.href;
var url = new URL(url_string);
var _filter = url.searchParams.get("filter");
$.ajax({
    url: "viewlist/users_viewlist.php",
    type: "POST",
    data: {filter: _filter},
    cache: false,
    success: function (data) {
        $('#_index_users_list').html(data);
        generateDTable('users_list');
    }
});
$("#save_user").click(function ()
{
    var isNew = false;
    var user_id = $("#user_id").val();
    var emp_id = $("#emp_id").val();
    var full_name = $("#full_name").val();
    var city = $("#city").val();
    var mobile = $("#mobile").val();
    var email = $("#email").val();
    var address1 = $("#address1").val();
    var address2 = $("#address2").val();
    var username = $("#username").val();
    var password = $("#password").val();
    var user_role = $("#user_role").val();
    if(user_id == '')
    {
        isNew = true;
    }
    if(full_name == '')
    {
        toastr_error_msg('Please Enter the Fullname.');
    }
    else if(username == '')
    {
        toastr_error_msg('Please Enter the Username.');
    }
    else if(password == '')
    {
        toastr_error_msg('Please Enter the Password.');
    }
    else if(user_role == 0)
    {
        toastr_error_msg('Please select one User Role.');
    }
    else{
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_manage_user.php",
                data: 'isNew='+ isNew.toString() + '&user_id=' + user_id +'&emp_id=' + emp_id +'&full_name=' + full_name +'&city=' + city +'&mobile=' + mobile +'&email=' + email +'&address1=' + address1 +'&address2=' + address2 +'&username=' + username +'&password=' + password +'&user_role=' + user_role,
                datatype: "html",
                success: function (result)
                {
                   if(result.trim() == 1)
                   {
                       if (isNew == true)
                       {
                           modal_hide('users_modal_box');
                           toastr_success('Added Successfully..!','');
                           
                       }
                       else
                       {
                            modal_hide('users_modal_box');
                            toastr_success('Updated Successfully..!','');
                           
                       }
                       
                   }
                   else
                   {
                       toastr_error();
                   }
                }
            });
        }
});
$("#delete_user").click(function ()
{
    var uid = $("#deleteuser_uid").val();
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_delete_user.php",
                data: 'uid=' + uid,
                datatype: "html",
                success: function (result)
                {
                   if(result == 1)
                    {
                        modal_hide('deleteuser_modal_box');
                        toastr_success('Deleted Successfully..!','');
                    }
                    else
                    {
                        toastr_error();
                    }
                }
            });
});
function update_user(id)
{
    remove_disabled('save_user');
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_get_userlist.php",
                data: {id: id},
                dataType: 'json',
                success: function (result)
                {
                    var len = result.length;
                    if (len != 0)
                    {
                        for (var i = 0; i < len; i++)
                        {
                            var user_id = result[i]['user_id'];
                            var employee_id = result[i]['employee_id'];
                            var full_name = result[i]['full_name'];
                            var city = result[i]['city'];
                            var mobile_number = result[i]['mobile_number'];
                            var email = result[i]['email'];
                            var address1 = result[i]['address1'];
                            var address2 = result[i]['address2'];
                            var username = result[i]['username'];
                            var password = result[i]['password'];
                            var role_id = result[i]['role_id'];
                            if (len > 0)
                            {
                                $("#user_id").val(user_id);
                                $("#emp_id").val(employee_id);
                                $("#full_name").val(full_name);
                                $("#city").val(city);
                                $("#mobile").val(mobile_number);
                                $("#email").val(email);
                                $("#address1").val(address1);
                                $("#address2").val(address2);
                                $("#username").val(username);
                                $("#password").val(password);
                                $("#user_role").val(role_id);
                            }

                        }
                    }
                }
            });
}
function delete_user(id)
{
    $("#deleteuser_uid").val(id);
}
$("#password_checkbox").click(function(){
  
});
$(document).ready(function(){
    load_userroles('user_role');
});
function username_validate()
{
    var username = $("#username").val();
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/validate_username.php",
                data: 'username=' + username,
                datatype: "html",
                success: function (result)
                {
                    if (result == 1)
                    {
                        add_disabled('save_user');
                        toastr_error_msg('Username already taken.');
                        
                    } else
                    {
                        remove_disabled('save_user');
                    }
                }
            });

}