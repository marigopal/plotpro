$("form").on("submit", function (e)
{
    var dataString = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "../db_page/login_check.php",
        data: dataString,
        success: function (result)
        {

            result = result.replaceAll('\n', '');
            var _result = $.parseJSON(result);
            var userid = _result[0].user;
           
            if (_result[0].login == 1 && _result[0].isfirst_login != 1)
            {
                Cookies.set('user_id', userid);
                window.location.href = "/home/index";
            } else if (_result[0].login == 2 && _result[0].isfirst_login != 1)
            {
                Cookies.set('remember_me', generateUID());
                Cookies.set('user_id', userid);
                window.location.href = "/home/index";
            }
            else if (_result[0].login == 1 && _result[0].isfirst_login == 1)
            {
               Cookies.set('user_id', userid);
               window.location.href = "/users/profile?id="+ userid;
            }
            else if (_result[0].login == 2 && _result[0].isfirst_login == 1)
            {
               Cookies.set('remember_me', generateUID());
               Cookies.set('user_id', userid);
               window.location.href = "/users/profile?id="+ userid;
            }
        }
    });
    e.preventDefault();
});
$(function () {
    if (Cookies.get('remember_me')) {
        window.location.href = "/home/index.php";
    }
});
  