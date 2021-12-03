<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Colorlib Templates">
        <meta name="author" content="Colorlib">
        <meta name="keywords" content="Colorlib Templates">

        <!-- Title Page-->
        <title>Company Registration</title>

        <!-- Icons font CSS-->
        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <!-- Font special for pages-->
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Vendor CSS-->
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link href="css/main.css" rel="stylesheet" media="all">
        <link rel="stylesheet" href="../template_files/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
        <link rel="stylesheet" href="../template_files/toastr/toastr.min.css">
    </head>

    <body>
        <div class="page-wrapper p-t-10 p-b-100 font-poppins">
            <div class="wrapper wrapper--w680">
                <div class="card card-4">
                    <div class="card-body" id="register_div" hidden="">
                        <h2 class="title">Company Registration</h2>
                        <form id="company_reg" method="post">
                            <div class="input-group" hidden="">

                                <div class="rs-select2 js-select-simple select--no-search">
                                    <input class="input--style-4" type="text" name="company_uid" id="company_uid" placeholder="Company UID">
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Company Name</label>
                                        <input class="input--style-4" type="text" name="company_name" id="company_name" required="">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Proprietor Name</label>
                                        <input class="input--style-4" type="text" name="company_properitor" id="company_properitor" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Address Line 1</label>
                                        <input class="input--style-4" type="text" name="company_addresss1" id="company_addresss1" required="">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Address Line 2</label>
                                        <input class="input--style-4" type="text" name="company_addresss2" id="company_addresss2" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">City</label>
                                        <input class="input--style-4" type="text" name="company_city" id="company_city" required="">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Pin Code</label>
                                        <input class="input--style-4" type="text" name="company_zipcode" id="company_zipcode" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Email Address</label>
                                        <input class="input--style-4" type="text" name="company_email" id="company_email" required="">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Mobile Number</label>
                                        <input class="input--style-4" type="text" name="company_mobile" id="company_mobile" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Username</label>
                                        <input class="input--style-4" type="text" name="username" id="username" required="">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Password</label>
                                        <input class="input--style-4" type="password" name="password" id="password" required="">
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="input-group">
                                <label class="label">Subject</label>
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select name="subject">
                                        <option disabled="disabled" selected="selected">Choose option</option>
                                        <option>Subject 1</option>
                                        <option>Subject 2</option>
                                        <option>Subject 3</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div> -->
                            <div class="p-t-15">
                                <button class="btn btn--radius-2 btn--blue" type="submit" id="create_company_button">Register</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-body" id="optverify_div" hidden="">
                         <h2 class="title">OTP Verification</h2>
                         <form id="otp_verify" method="post">
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <input class="input--style-4" type="text" name="otp_input" id="otp_input" required="">
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <a href="" onclick="regenrate_otp()">Resend</a>
                                </div>
                            </div>
                            <div class="p-t-15">
                                <button class="btn btn--radius-2 btn--blue" type="submit" id="otp_verify_button">Verify</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jquery JS-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <!-- Vendor JS-->
        <script src="vendor/select2/select2.min.js"></script>
        <script src="vendor/datepicker/moment.min.js"></script>
        <script src="vendor/datepicker/daterangepicker.js"></script>

        <!-- Main JS-->
        <script src="js/global.js"></script>
        <script src="../template_files/sweetalert2/sweetalert2.min.js"></script>
        <script src="../template_files/toastr/toastr.min.js"></script>
        <script src="../template_files/toast_js/toast_function.js"></script>
        <script src="../include/global.js" type="text/javascript"></script>
        <script src="js/_manage_company.js" type="text/javascript"></script>

    </body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->