function update_lead(id)
{
   
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_getleaddetail.php",
                data: {id: id},
                dataType: 'json',
                success: function (result)
                {
                    var len = result.length;
                    if (len != 0)
                    {
                        for (var i = 0; i < len; i++)
                        {
                            var lead_id = result[i]['lead_id'];
                            var login_user_id = result[i]['login_user_id'];
                            var first_name = result[i]['first_name'];
                            var mid_name = result[i]['mid_name'];
                            var last_name = result[i]['last_name'];
                            var title = result[i]['title'];
                            var phone = result[i]['phone'];
                            var mobile = result[i]['mobile'];
                            var email = result[i]['email'];
                            var city = result[i]['city'];
                            var state = result[i]['state'];
                            var zipcode = result[i]['zipcode'];
                            var address1 = result[i]['address1'];
                            var address2 = result[i]['address2'];
                            var managed_by = result[i]['managed_by'];
                            if (len > 0)
                            {
                                $("#leads_logged").val(login_user_id);
                                $("#leads_uid").val(lead_id);
                                $("#leads_title").val(title);
                                $("#leads_firstname").val(first_name);
                                $("#leads_midname").val(mid_name);
                                $("#leads_lastname").val(last_name);
                                $("#leads_address1").val(address1);
                                $("#leads_address2").val(address2);
                                $("#leads_city").val(city);
                                $("#leads_state").val(state);
                                $("#leads_zipcode").val(zipcode);
                                $("#leads_phone").val(phone);
                                $("#leads_mobile").val(mobile);
                                $("#leads_email").val(email);
                                $("#managed_by").val(managed_by);
                            }

                        }
                    }
                }
            });
}