<?php
include('../../include/lib_page.php');
//Check if compay exist
$company_active = "select count(*) as cntUser from tbl_company WHERE `is_active` = '0'";
$result_company_active = mysqli_query($con, $company_active);
$row_company_active = mysqli_fetch_array($result_company_active);
if ($row_company_active['cntUser'] > 0) {
    echo "1";
} else {
    echo "0";
}
?>
