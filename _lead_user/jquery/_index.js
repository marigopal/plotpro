var url_string = window.location.href;
var url = new URL(url_string);
var _filter = url.searchParams.get("filter");
$.ajax({
    url: "viewlist/leads_viewlist.php",
    type: "POST",
    data: {filter: _filter},
    cache: false,
    success: function (data) {
        $('#_index_leads_report').html(data);
        generateDTable('leads_list');
    }
});
$("#save_leads").click(function ()
{
    var isNew = false;
    var leads_logged = $("#leads_logged").val();
    var leads_uid = $("#leads_uid").val();
    var leads_title = $("#leads_title").val();
    var leads_firstname = $("#leads_firstname").val();
    var leads_midname = $("#leads_midname").val();
    var leads_lastname = $("#leads_lastname").val();
    var leads_address1 = $("#leads_address1").val();
    var leads_address2 = $("#leads_address2").val();
    var leads_city = $("#leads_city").val();
    var leads_state = $("#leads_state").val();
    var leads_zipcode = $("#leads_zipcode").val();
    var leads_phone = $("#leads_phone").val();
    var leads_mobile = $("#leads_mobile").val();
    var leads_email = $("#leads_email").val();
    var managed_by = $("#managed_by").val();
    
    if(leads_uid == '')
    {
        isNew = true;
    }
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_manage_leads.php",
                data: 'isNew='+ isNew.toString() + '&leads_uid=' + leads_uid +'&leads_title=' + leads_title +'&leads_firstname=' + leads_firstname +'&leads_midname=' + leads_midname +'&leads_lastname=' + leads_lastname + '&leads_logged=' + leads_logged+ '&leads_address1=' + leads_address1 + '&leads_address2=' + leads_address2 + '&leads_city=' + leads_city + '&leads_state=' + leads_state + '&leads_zipcode=' + leads_zipcode + '&leads_phone=' + leads_phone + '&leads_mobile=' + leads_mobile + '&leads_email=' + leads_email+ '&managed_by=' + managed_by,
                datatype: "html",
                success: function (result)
                {
                   if(result.trim() != 0)
                   {
                       if (isNew == true)
                       {
                           modal_hide('leads_modal_box');
                           toastr_success_parameter('Success','/_lead_user/_index_tasks',result);
                       }
                       else 
                       {
                            modal_hide('leads_modal_box');
                           toastr_success('Update Success','');
                       }
                    }
                   else
                   {
                       toastr_error();
                   }
                }
            });
});




$("#leads_delete").click(function ()
        {
            var uid = $("#leadsdelete_uid").val();
            $.ajax
                    ({
                        type: "POST",
                        url: "_dbPage/_delete_leads.php",
                        data: 'uid=' + uid,
                        datatype: "html",
                        success: function (result)
                        {
                           if(result == 1)
                            {
                                modal_hide('leadsdelete_modal_box');
                                toastr_success('Deleted Successfully..!','');
                            }
                            else
                            {
                                toastr_error();
                            }
                        }
                    });
        });
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
function delete_lead(id)
{
    $("#leadsdelete_uid").val(id);
}

$(document).ready(function(){
    load_assigned_to('managed_by');
   
    load_Project('project_id');
    load_leadstatus('status_id');
   
});