function inputbox_error_notification(input, msg)
{
    $("#" + input).addClass('is-invalid');
    $("#" + input).prop('title', msg);
    $("#" + input).focus();
}
function input_remove_error_notification(input)
{
    $("#" + input).removeClass('is-invalid');
    $("#" + input).prop('title', '');
    $("#" + input).focus();

}
function email_validation(email, button)
{
    var email_id_value = $("#" + email).val();
    var expr = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!expr.test(email_id_value))
    {
        $("#" + email).addClass('is-invalid');
        $("#" + email).prop('title', 'Enter the valid email address..!');
        add_disabled(button);
        $("#" + email).focus();
    } else
    {
        remove_disabled(button);
    }

}
function modal_hide(id)
{
    $("#" + id).modal('hide');
}
function add_disabled(id)
{
    $("#" + id).attr('disabled', true);
}
function remove_disabled(id)
{
    $("#" + id).removeAttr('disabled');
}
function add_hidden(id)
{
    $("#" + id).attr('hidden', true);
}
function addhidden_class(id)
{
    $("#" + id).addClass('d-none');
}
function remove_hidden(id)
{
    $("#" + id).removeAttr('hidden');
}
function removehidden_class(id)
{
    $("#" + id).removeClass('d-none');
}
function toastr_success(msg, location)
{
    toastr.success(msg);
    setTimeout(function () {
        window.location.href = location;
    }, 2000);
}
function toastr_success_no_redirect(msg)
{
    toastr.success(msg);
    setTimeout(function () {
       
    }, 2000);
}
function toastr_success_parameter(msg, location, parameter)
{
    toastr.success(msg);
    setTimeout(function () {
        window.location.href = location + '?id=' + parameter;
    }, 2000);
}
function toastr_error()
{
    toastr.error('Something Went Wrong..!Please tray again..');
    setTimeout(function () {
//        window.location.reload();
 table.ajax.reload();
    }, 2000);
}
function toastr_error_msg(msg)
{
    toastr.error(msg);
    setTimeout(function () {
//        window.location.reload();
 table.ajax.reload();
    }, 2000);
}
function toastr_error_msg(msg)
{
    toastr.error(msg);
    setTimeout(function () {
//        window.location.reload();
 table.ajax.reload();
    }, 3000);
}
function generateUID()
{

    return window.btoa(Array.from(window.crypto.getRandomValues(new Uint8Array(8 * 2))).map((b) => String.fromCharCode(b)).join("")).replace(/[+/]/g, "").substring(0, 8);
}
function generateotp()
{

    return window.btoa(Array.from(window.crypto.getRandomValues(new Uint8Array(8 * 2))).map((b) => String.fromCharCode(b)).join("")).replace(/[+/]/g, "").substring(0, 8);
}

function generateDTable(tablename) {
    $("#" + tablename).DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        "scrollX": true
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
}
function encryption_parameter(id)
{
    
    var ciphertext = CryptoJS.AES.encrypt(id, 'm(!<C,.r=fv)-HY9');
    return ciphertext;
}
function decryption_parameter(id)
{
    var bytes = CryptoJS.AES.decrypt(id.toString(), 'm(!<C,.r=fv)-HY9');
    var plaintext = bytes.toString(CryptoJS.enc.Utf8);
    return plaintext;
}
function acre_cent(id)
{
    var result = id * 100;
    return result;
}
function cent_acre(id)
{
    var result = id / 100;
    return result;
}

/* Dropdown list loaders */
function load_Plots(ddlName, projectid,block_id,selectedvalue) {
    
    $.ajax({
        type: "POST",
        url: "/include/_dbPage/load_plots",
        data: {projectid: projectid,block_id: block_id},
        success: function (_result)
        {
            var result = JSON.parse(_result.replace('\n', ''));
            $('#' + ddlName).empty();
            var select_li_txt = "<option value='0'>Select</option>";
            $('#' + ddlName).append(select_li_txt);
            if (result != '')
            {
                $.each(result, function (i) {
                    var li_txt = "<option value='" + result[i].plot_id + "'>" + result[i].plot_name + "</option>";
                    $('#' + ddlName).append(li_txt);
                });
                if(selectedvalue != null){
                    $('#' + ddlName).val(selectedvalue);
                }
                   
            } else
            {

            }
        },
        error: function (err) {
            console.log(err);
        }
    });

}
function count_plots(count_display, projectid) {
    var proj = projectid;
    $.ajax({
        type: "POST",
        url: "/include/_dbPage/count_plots.php",
        data: {projectid: projectid},
        success: function (result)
        {
            _result = parseInt(result.replace('\n', ''));
           
            
            if (_result > 0)
            {
               $("#"+ count_display).html(_result);
               removehidden_class('plot_name'); 

            } 
        },
        error: function (err) {
            console.log(err);
        }
    });

}
function load_Project(ddlName, projectid) {
    var proj = projectid;
    $.ajax({
        type: "POST",
        url: "/include/_dbPage/load_projects.php",
        data: {projectid: projectid},
        success: function (_result)
        {
            var result = JSON.parse(_result.replace('\n', ''));
            $('#' + ddlName).empty();
            var select_li_txt = "<option value='0'>Select</option>";
            $('#' + ddlName).append(select_li_txt);
            if (result != '')
            {
                $.each(result, function (i) {
                    var li_txt = "<option value='" + result[i].project_id + "'>" + result[i].project_name + "</option>";
                    $('#' + ddlName).append(li_txt);
                });

            } else
            {

            }
        },
        error: function (err) {
            console.log(err);
        }
    });

}
function load_Blocks(ddlName, projectid, selectedvalue) {
    var proj = projectid;
    $.ajax({
        type: "POST",
        url: "/include/_dbPage/load_blocks.php",
        data: {projectid: projectid},
        success: function (_result)
        {
            var result = JSON.parse(_result.replace('\n', ''));
            $('#' + ddlName).empty();
            var select_li_txt = "<option value='0'>Select</option>";
            $('#' + ddlName).append(select_li_txt);
            if (result != '')
            {
                $.each(result, function (i) {
                    var li_txt = "<option value='" + result[i].block_id + "'>" + result[i].block_name + "</option>";
                    $('#' + ddlName).append(li_txt);
                });
if(selectedvalue != null){
    $('#' + ddlName).val(selectedvalue);
}
                
            } else
            {

            }
        },
        error: function (err) {
            console.log(err);
        }
    });

}
function load_leads(ddlName, projectid) {
    var proj = projectid;
    $.ajax({
        type: "POST",
        url: "/include/_dbPage/load_leads.php",
        data: {projectid: projectid},
        success: function (_result)
        {
            var result = JSON.parse(_result.replace('\n', ''));
            $('#' + ddlName).empty();
            var select_li_txt = "<option value='0'>Select</option>";
            $('#' + ddlName).append(select_li_txt);
            if (result != '')
            {
                $.each(result, function (i) {
                    var li_txt = "<option value='" + result[i].lead_id + "'>" + result[i].first_name + "</option>";
                    $('#' + ddlName).append(li_txt);
                });

            } else
            {

            }
        },
        error: function (err) {
            console.log(err);
        }
    });

}
function load_landlord(ddlName, projectid) {
    var proj = projectid;
    $.ajax({
        type: "POST",
        url: "/include/_dbPage/load_landlord.php",
        data: {projectid: projectid},
        success: function (_result)
        {
            var result = JSON.parse(_result.replace('\n', ''));
            $('#' + ddlName).empty();
            var select_li_txt = "<option value='0'>--Please Select --</option>";
            $('#' + ddlName).append(select_li_txt);
            if (result != '')
            {
                $.each(result, function (i) {
                    var li_txt = "<option value='" + result[i].landlord_id + "'>" + result[i].landlord_name + "</option>";
                    $('#' + ddlName).append(li_txt);
                });

            } else
            {

            }
        },
        error: function (err) {
            console.log(err);
        }
    });

}
function load_salesinvoive(ddlName, projectid) {
    var proj = projectid;
    $.ajax({
        type: "POST",
        url: "/include/_dbPage/load_salesinvoice.php",
        data: {projectid: projectid},
        success: function (_result)
        {
            var result = JSON.parse(_result.replace('\n', ''));
            $('#' + ddlName).empty();
            var select_li_txt = "<option value='0'>--Please Select --</option>";
            $('#' + ddlName).append(select_li_txt);
            if (result != '')
            {
                $.each(result, function (i) {
                    var li_txt = "<option value='" + result[i].plotsale_id + "'>" + result[i].sales_name + "</option>";
                    $('#' + ddlName).append(li_txt);
                });

            } else
            {

            }
        },
        error: function (err) {
            console.log(err);
        }
    });

}
function load_userroles(ddlName) {
   
    $.ajax({
        type: "POST",
        url: "/include/_dbPage/load_userrole.php",
        data: {},
        success: function (_result)
        {
            var result = JSON.parse(_result.replace('\n', ''));
            $('#' + ddlName).empty();
            var select_li_txt = "<option value='0'>--Please Select --</option>";
            $('#' + ddlName).append(select_li_txt);
            if (result != '')
            {
                $.each(result, function (i) {
                    var li_txt = "<option value='" + result[i].role_id + "'>" + result[i].role_name + "</option>";
                    $('#' + ddlName).append(li_txt);
                });

            } else
            {

            }
        },
        error: function (err) {
            console.log(err);
        }
    });

}
function load_leadstatus(ddlName) {
   
    $.ajax({
        type: "POST",
        url: "/include/_dbPage/load_status.php",
        data: {},
        success: function (_result)
        {
            var result = JSON.parse(_result.replace('\n', ''));
            $('#' + ddlName).empty();
            var select_li_txt = "<option value='0'>--Please Select --</option>";
            $('#' + ddlName).append(select_li_txt);
            if (result != '')
            {
                $.each(result, function (i) {
                    var li_txt = "<option value='" + result[i].task_status_id + "'>" + result[i].task_status_name + "</option>";
                    $('#' + ddlName).append(li_txt);
                });

            } else
            {

            }
        },
        error: function (err) {
            console.log(err);
        }
    });

}
function load_assigned_to(ddlName,selectedvalue) {
   
    
    var users_list = new Array();
    $.ajax
    ({
        type: "POST",
        url: "/include/_dbPage/load_users.php",
        data: {},
        dataType: 'json',
        success: function (result)
        {
            var len = result.length;            
            if (len != 0)
            {
                users_list = result;
            }
        },
        error: function(err){
            console.log(err);
        }

    });

    $.ajax
            ({
                type: "POST",
                url: "/include/_dbPage/load_userrole.php",
                data: {},
                dataType: 'json',
                success: function (result)
                {
                    var strHTML= "";
                    var len = result.length;
                    var len_users = users_list.length;
                    
                    if (len != 0)
                    {
                        strHTML = "<option>Please Select</option>";
                        for (var i = 0; i < len; i++)
                        {
                            var _role_id = result[i]['role_id'];
                            var role_name = result[i]['role_name'];
                                                     
                            if (len_users > 0)
                            {
                                strHTML += "<option disabled='disabled' class='font-weight-bold'>"+role_name+"</option>";
                                
                                for(var j =0; j < len_users; j++){
                                   
                                    var user_id = users_list[j]['user_id'];
                                    var full_name = users_list[j]['full_name'];
                                    var role_id = users_list[j]['role_id'];
                                    
                                    if(role_id == _role_id){
                                        
                                        strHTML += " <option value='"+ user_id +"'>"+ full_name +"</option>";
                                    }
                                }

                              


                            }
                        }
                        console.log(strHTML);
                        $("#"+ddlName).append(strHTML);
                        if(selectedvalue != null){
                            $('#' + ddlName).val(selectedvalue);
                        }
                    }
                }

            });

}
function num_word(value)
{
    value = convertNumberToWords(value);
    $("#num_word").html(value);
}
function convertNumberToWords(amount) {
    var words = new Array();
    words[0] = '';
    words[1] = 'One';
    words[2] = 'Two';
    words[3] = 'Three';
    words[4] = 'Four';
    words[5] = 'Five';
    words[6] = 'Six';
    words[7] = 'Seven';
    words[8] = 'Eight';
    words[9] = 'Nine';
    words[10] = 'Ten';
    words[11] = 'Eleven';
    words[12] = 'Twelve';
    words[13] = 'Thirteen';
    words[14] = 'Fourteen';
    words[15] = 'Fifteen';
    words[16] = 'Sixteen';
    words[17] = 'Seventeen';
    words[18] = 'Eighteen';
    words[19] = 'Nineteen';
    words[20] = 'Twenty';
    words[30] = 'Thirty';
    words[40] = 'Forty';
    words[50] = 'Fifty';
    words[60] = 'Sixty';
    words[70] = 'Seventy';
    words[80] = 'Eighty';
    words[90] = 'Ninety';
    amount = amount.toString();
    var atemp = amount.split(".");
    var number = atemp[0].split(",").join("");
    var n_length = number.length;
    var words_string = "";
    if (n_length <= 9) {
        var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
        var received_n_array = new Array();
        for (var i = 0; i < n_length; i++) {
            received_n_array[i] = number.substr(i, 1);
        }
        for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
            n_array[i] = received_n_array[j];
        }
        for (var i = 0, j = 1; i < 9; i++, j++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
                if (n_array[i] == 1) {
                    n_array[j] = 10 + parseInt(n_array[j]);
                    n_array[i] = 0;
                }
            }
        }
        value = "";
        for (var i = 0; i < 9; i++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
                value = n_array[i] * 10;
            } else {
                value = n_array[i];
            }
            if (value != 0) {
                words_string += words[value] + " ";
            }
            if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Crores ";
            }
            if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Lakhs ";
            }
            if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Thousand ";
            }
            if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
                words_string += "Hundred and ";
            } else if (i == 6 && value != 0) {
                words_string += "Hundred ";
            }
        }
        words_string = words_string.split("  ").join(" ");
    }
    return(words_string);
}
function calcSqftCent(e){
    var val_cent = (e / 436).toFixed(2);
    return val_cent;

}

function calcentSqft(e){
   var val_cent =(e * 436).toFixed(0);
    return val_cent;
}
function calCentvalue(sqft_value)
{
    var centvalue = sqft_value * 436;
    return centvalue;
}
function calcNetCost(cent,cent_value)
{
    var net_cost = cent * cent_value;
    return net_cost;
}
function mobnum_validate(mob)
{
    var filter = /^\d*(?:\.\d{1,2})?$/;
    if (filter.test(mob)) {
        if(!(mob.length==10)){
            toastr_error_msg('Mobile Number is Invalid.');
        }
    }else{ toastr_error_msg('Mobile Number is Invalid.');}
}