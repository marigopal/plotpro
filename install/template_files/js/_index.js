var gloabl_url = "http://retailpro.enflowapp.com/";
$(document).ready(function () {
    get_language();
});
function get_language()
{
    $.ajax
            ({
                type: "POST",
                url: gloabl_url + "api/get_language.php",
                data: {},
                dataType: 'json',
                success: function (result)
                {
                    var status = result.status;
                    if (status == 200)
                    {
                        var response_length = result.response.length;
                        strHTML = "";
                        i = 0;
                        for (var i = 0; i < response_length; i++)
                        {
                            var language_code = result.response[i]['language_code'];
                            var language_name = result.response[i]['language_name'];
                            strHTML += "<div class='form-group'><input type='radio' name='input_language' id='input_language' class='agree-term input_language' value= '" + language_code + "'onclick='assign_langval(this.value)'/><label for='agree-term' class='label-agree-term'><span><span></span></span>" + language_name + "</label></div>";
                        }
                        strHTML += "<span style='color:red' id='lang_notification'></span><div class='form-group form-button'><input type='button' name='language_button' id='language_button' class='form-submit' value='Next' onclick = 'language_button()'/></div>";
                        $("#language_selection").append(strHTML);
                    }
                }
            });
}
function assign_langval(lang)
{
    $("#lang_value").val(lang);
    $("#lang_notification").attr("hidden", true);
}
function language_button()
{
    var lang_val = $("#lang_value").val();
    if (lang_val == '')
    {
        $("#lang_notification").html("Please select one Language");
    } else {
        $("#language_selection").attr("hidden", true);
        $("#phonenumber_selection").removeAttr('hidden');
    }
}
function mobileno_validate() {
    var mobileno = $("#input_mobileno").val();
    var input_otp = $("#input_otp").val();
    if (mobileno != '')
    {
       
        var mobArr = {'mobilenumber': mobileno};
        $.ajax
                ({
                    type: "POST",
                    url: gloabl_url + "api/validate_user.php",
                    data: JSON.stringify(mobArr),
                    dataType: 'json',
                    success: function (result)
                    {
                        var status = result.status;
                        if (status == 200)
                        {
                            var response_length = result.response.length;
                            i = 0;
                            for (var i = 0; i < response_length; i++)
                            {
                              
                                var shop_id = result.response[i]['shop_id']; 
                                var primary_language_id = result.response[i]['primary_language_id'];
                                var is_blocked = result.response[i]['is_blocked'];
                                var is_releaved = result.response[i]['is_releaved'];
                                var is_deleted = result.response[i]['is_deleted'];
                                var is_admin = result.response[i]['is_admin'];
                                var is_active = result.response[i]['is_active'];
                                var user_id = result.response[i]['user_id'];
                                isNew = false;
                                generate_otp(user_id);
                                if(input_otp == ''){
                                    $("#otp_div").removeAttr('hidden');
                                    $("#validate_mobno_otp_div").removeAttr('hidden');
                                    $("#validate_mobno").attr("hidden", true);
                                }
                                else{
                                if (is_blocked == 1)
                                {
                                    $("#mob_notification").html("User Blocked. Please contact Administrator.");
                                } else if (is_releaved == 1)
                                {
                                    $("#mob_notification").html("User Releaved. Please contact Administrator.");
                                } else if (is_active == 1)
                                {
                                    Cookies.set('primary_language_id', primary_language_id);
                                    Cookies.set('shop_id', shop_id);
                                    Cookies.set('user_id', user_id);
                                    window.location.href = "/dashboard/";
                                    
                                }
                            }
                            }
                        } else if (status == 201)
                        {
                            $("#phonenumber_selection").attr("hidden", true);
                            $("#shop_selection").removeAttr('hidden');
                            get_shop();
                           

                        }
                    }
                });
    }
    else {
        $("#mob_notification").html("Please Enter your Mobile Number");
    }
}

function generate_otp(userid)
{
    $.ajax
            ({
                type: "POST",
                url:  "../../include/update_otp.php",
                data: {user_id: userid},
                dataType: 'json',
                success: function (result)
                {
                }
            });
}
function get_shop()
{
    var lang_val = $("#lang_value").val();
    var langArr = {'language_code': lang_val};
    $.ajax
            ({
                type: "POST",
                url: gloabl_url + "api/get_shoptypelist.php",
                data: JSON.stringify(langArr),
                dataType: 'json',
                success: function (result)
                {
                    var status = result.status;
                    if (status == 200)
                    {
                        var response_length = result.response.length;
                        strHTML = "";
                        i = 0;
                        for (var i = 0; i < response_length; i++)
                        {
                            var shoptype_id = result.response[i]['shoptype_id'];
                            var shoptype_name = result.response[i]['shoptype_name'];
                            strHTML += "<div class='form-group'><input type='radio' name='input_shoptype' id='input_shoptype' class='agree-term input_language' value= '" + shoptype_id + "'onclick='assign_shopval(this.value)'/><label for='agree-term' class='label-agree-term'><span><span></span></span>" + shoptype_name + "</label></div>";
                        }
                        strHTML += "<span style='color:red' id='shop_notification'></span><div class='form-group form-button'><input type='button' name='shop_button' id='shop_button' class='form-submit' value='Next' onclick = 'shop_button()'/></div>";
                        $("#shop_selection").append(strHTML);
                    }
                }
            });
}
function assign_shopval(shop)
{
    $("#shop_value").val(shop);
    $("#shop_notification").attr("hidden", true);
}
function shop_button()
{
    var shop_value = $("#shop_value").val();
    if (shop_value == '')
    {
        $("#shop_notification").html("Please select one Shop");
    } else {
        $("#language_selection").attr("hidden", true);
        $("#phonenumber_selection").attr("hidden", true);
        $("#shop_selection").attr('hidden',true);
        $("#name_selection").removeAttr("hidden");
        
    }
}
function remove_notification(input)
{
    $("#" + input).html("");
}
$("#name_button").click(function(){
    var lang_value = $("#lang_value").val();
    var input_mobileno = $("#input_mobileno").val();
    var shop_value = $("#shop_value").val();
    var input_fullname = $("#input_fullname").val();
    var input_shopname = $("#input_shopname").val();
    var input_referral = $("#input_referral").val();
    if(input_fullname == '')
    {
        $("#name_notification").html("Please Enter the Fullname");
    }else if(input_shopname == ''){
        $("#name_notification").html("Please Enter the Shopname");
    }else{
        var regArr = {'language_code': lang_value, 'mobile_number' : input_mobileno, 'shop_name' : input_shopname, 'user_fullname' : input_fullname, 'shoptype_id' : shop_value, 'referral_code' : input_referral};
        $.ajax
            ({
                type: "POST",
                url: gloabl_url + "api/register_shop.php",
                data: JSON.stringify(regArr),
                dataType: 'json',
                success: function (result)
                {
                    var status = result.status;
                    if (status == 200)
                    {
                        var response_length = result.response.length;
                        strHTML = "";
                        i = 0;
                        for (var i = 0; i < response_length; i++)
                        {
                            var user_id = result.response[i]['user_id'];
                            var primary_language_id = result.response[i]['primary_language_id'];
                            var shoptype_id = result.response[i]['shoptype_id'];
                            Cookies.set('primary_language_id', primary_language_id);
                        }
                        window.location.href = "/register/"                        
                    }
                }
            });
    }
});
$(function () {
    if (Cookies.get('primary_language_id')) {
        $("#language_selection").attr("hidden", true);
        

    }
    if (Cookies.get('user_id')) {
        $("#language_selection").attr("hidden", true);
        $("#phonenumber_selection").attr("hidden", true);
       

    }
    if (Cookies.get('shop_id')) {
        
        window.location.href = "/dashboard/"   

    }

});
$("#validate_mobno_otp").click(function(){
    var input_mobileno = $("#input_mobileno").val();
    var input_otp = $("#input_otp").val();
    if(input_otp == '')
    {
        $("#mob_notification").html("Please Enter OTP");
    }
    else{
    $.ajax
    ({
        type: "POST",
        url: "../../api/otp_validate.php",
        data: {'input_mobileno' : input_mobileno, 'input_otp' : input_otp},
        dataType: 'json',
        success: function (result)
        {
            if(result == 1)
            {
                mobileno_validate();
            }
            else{
                $("#mob_notification").html("Please Enter Valid OTP");
            }
        }
    });
}
    
});