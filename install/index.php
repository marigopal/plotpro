<?php include 'include/header.php'; ?>
<div class="">
    <section class="">
        <div class="">
            <div class="">
               
                <div class="signup-form"  id="phonenumber_selection" >
                    <h1 class="form-title">Database</h1>
                    <div class="form-group">
                        <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="input_host" id="input_host" placeholder="Your Database Server" onclick="remove_notification('error_notification')"/>
                    </div>
                    <div class="form-group" id="otp_div">
                        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="text" name="input_username" id="input_username" placeholder="Username" onclick="remove_notification('error_notification')"/>
                    </div>
                    <div class="form-group" id="otp_div">
                        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="text" name="input_password" id="input_password" placeholder="Password" onclick="remove_notification('error_notification')"/>
                    </div>
                    <div class="form-group" id="dbname_div" hidden>
                        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="text" name="input_dbname" id="input_dbname" placeholder="Databasename" onclick="remove_notification('error_notification')"/>
                    </div>
                    <span style='color:red' id='error_notification'></span>
                    <span style='color:green' id='success_notification'></span>
                    <div class="form-group form-button" id="testbutton_div">
                        <input type="button" name="test_connection" id="test_connection" class="form-submit" value="Test Connection"/>
                    </div>
                    <div class="form-group form-button" id="createdb_div" hidden>
                        <input type="button" name="create_db" id="create_db" class="form-submit" value="Create Database"/>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include 'include/footer.php'; ?>
<script src="jquery/_index.js" type="text/javascript"></script>