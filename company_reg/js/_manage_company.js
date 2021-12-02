$(document).ready(function () {
    check_companyexist();
});
function check_companyexist()
{
    $.ajax({
        type: "POST",
        url: "_dbPage/_company_exist.php",
        success: function (result)
        {
            if (result == 1)
            {
                check_optverified();
            } else
            {
                $("#register_div").removeAttr('hidden');
                $("#optverify_div").attr('hidden', true);
            }
        }
    });
}
function check_optverified()
{
    $.ajax({
        type: "POST",
        url: "_dbPage/_company_isactive.php",
        success: function (result)
        {
            if (result == 1)
            {
                $("#optverify_div").removeAttr('hidden');
                $("#register_div").attr('hidden', true);
            } else
            {
                window.location.href = '/login';
            }
        }
    });
}
function regenrate_otp()
{
 $.ajax({
        type: "POST",
        url: "_dbPage/regenerate_otp.php",
        success: function (result)
        {
           
        }
    });   
}
$("#company_reg").on("submit", function (e) {
    add_disabled('create_company_button');
    var dataString = $(this).serialize();
    var isNew = true;
    var companyid = $('#company_uid').val();
    if (companyid != '')
    {
        isNew = false;
    }
    otp = generateotp();
    $.ajax({
        type: "POST",
        url: "_dbPage/_manage_company.php",
        data: dataString + '&isNew=' + isNew.toString() + '&otp=' + otp,
        success: function (result)
        {

            if (result != 0)
            {
                toastr_success('Company Registration Successfully Completed..! Please Verify the Account..!', '/company_reg');
            } else
            {
                toastr_error();
            }

        }
    });
    e.preventDefault();
});
$("#otp_verify").on("submit", function (e) {
    var otp_input = $('#otp_input').val();
    $.ajax({
        type: "POST",
        url: "_dbPage/_verify_otp.php",
        data: 'otp_input=' + otp_input,
        success: function (result)
        {
            if (result == 1)
            {
                add_disabled('otp_verify_button');
                toastr_success('OTP verification completed..!', '/login/');
            } else if (result == 2)
            {
                toastr_error_msg('OTP Entered Incorrect..! Please try again..!');
                $('#otp_input').val('');
            } else if (result == 3)
            {
                toastr_error_msg('OTP Expired..! Please Check your mail for new OTP..!');
                $('#otp_input').val('');
            }  else if (result == 4)
            {
                toastr_error_msg('OTP Incorrect and also Expired..! Please Check your mail for new OTP..!');
                $('#otp_input').val('');
            }else
            {
                toastr_error();
            }
        }
    });
    e.preventDefault();
});

