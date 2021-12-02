var url_string = window.location.href;
var url = new URL(url_string);
var _filter = url.searchParams.get("filter");
$.ajax({
    url: "viewlist/company_viewlist.php",
    type: "POST",
    data: {filter: _filter},
    cache: false,
    success: function (data) {
        $('#_index_company_report').html(data);
        generateDTable('company_list');
    }
});
$("#save_button").click(function ()
{
    var isNew = false;
    var company_uid = $("#company_uid").val();
    var company_name = $("#company_name").val();
    var company_city = $("#company_city").val();
    var company_properitor = $("#company_properitor").val();
    var company_zipcode = $("#company_zipcode").val();
    var company_phone = $("#company_phone").val();
    var company_mobile = $("#company_mobile").val();
    var company_email = $("#company_email").val();
    var company_address1 = $("#company_address1").val();
    var company_address2 = $("#company_address2").val();
    if (company_uid == '')
    {
        isNew = true;
    }
    if (company_name == '')
    {
        inputbox_error_notification('company_name', 'Please Enter Company Name');
    } else {
        $.ajax
                ({
                    type: "POST",
                    url: "_dbPage/_manage_company.php",
                    data: 'isNew=' + isNew.toString() + '&company_uid=' + company_uid + '&company_name=' + company_name + '&company_city=' + company_city + '&company_properitor=' + company_properitor + '&company_zipcode=' + company_zipcode + '&company_phone=' + company_phone + '&company_mobile=' + company_mobile + '&company_email=' + company_email + '&company_address1=' + company_address1 + '&company_address2=' + company_address2,
                    datatype: "html",
                    success: function (result)
                    {
                        if (result.trim() == 1)
                        {
                            if (isNew == true)
                            {
                                modal_hide('company_modal_box');
                                toastr_success('Company Added Successfully..!', '');
                            } else
                            {
                                modal_hide('company_modal_box');
                                toastr_success('Company Updated Successfully..!', '');
                            }
                        } else
                        {
                            toastr_error();
                        }
                    }
                });
    }
});
function update_company(id)
{
    $.ajax
            ({
                type: "POST",
                url: "_dbPage/_get_companydetails.php",
                data: {id: id},
                dataType: 'json',
                success: function (result)
                {
                    var len = result.length;
                    if (len != 0)
                    {
                        for (var i = 0; i < len; i++)
                        {
                            var company_id = result[i]['company_id'];
                            var company_name = result[i]['company_name'];
                            var company_address1 = result[i]['company_address1'];
                            var company_address2 = result[i]['company_address2'];
                            var company_city = result[i]['company_city'];
                            var company_zipcode = result[i]['company_zipcode'];
                            var company_email = result[i]['company_email'];
                            var company_mobileno = result[i]['company_mobileno'];
                            var company_phone = result[i]['company_phone'];
                            var company_properitor = result[i]['company_properitor'];
                            if (len > 0)
                            {
                                $("#company_uid").val(company_id);
                                $("#company_name").val(company_name);
                                $("#company_city").val(company_city);
                                $("#company_properitor").val(company_properitor);
                                $("#company_zipcode").val(company_zipcode);
                                $("#company_phone").val(company_phone);
                                $("#company_mobile").val(company_mobileno);
                                $("#company_email").val(company_email);
                                $("#company_address1").val(company_address1);
                                $("#company_address2").val(company_address2);
                            }
                        }
                    }
                }
            });
}