<?php

include "../../include/lib_page.php";
$username = $_POST['txt_uname'];
$password = encrypt($_POST['txt_pwd']);
if (isset($_POST['remember'])) {
    $remember = $_POST['remember'];
}
if ($username != "" && $password != "") {
    $check_user = "select count(*) as cntUser,user_id,is_firstlogin  from tbl_users WHERE username = '$username' and password = '$password' AND `is_deleted` = '0' GROUP BY user_id";
//    echo $check_user;exit();
    $result = mysqli_query($con, $check_user);
    $row = mysqli_fetch_array($result);
    $count = $row['cntUser'];
    if($count == ''){$count = 0;}
    if ($count > 0) {
        $user = encrypt($row['user_id']);
        $first_login = $row['is_firstlogin'];
        $check_company = "select count(*) as cntUser,`company_id` from tbl_company WHERE`is_deleted` = '0' GROUP BY `company_id`";
        $result_company = mysqli_query($con, $check_company);
        $row_company = mysqli_fetch_array($result_company);
        $count = $row_company['cntUser'];
        if ($count > 0) {
            $_SESSION['company_id'] = $row_company['company_id'];
        }
        if (isset($_POST['remember'])) {
            if ($remember == 'on') {
                echo "[{\"login\":\"2\",\"user\":\"" . $user . "\",\"isfirst_login\":\"" . $first_login . "\"}]";
            }
        } else {
            echo "[{\"login\":\"1\",\"user\":\"" . $user . "\",\"isfirst_login\":\"" . $first_login . "\"}]";
        }
    } else {
        echo "0";
    }
}
?>
