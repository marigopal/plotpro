<?php
include('../../include/lib_page.php');
$company_exist = "select count(*) as cntUser from tbl_company";
$result_company_exist = mysqli_query($con, $company_exist);
$row_company_exist = mysqli_fetch_array($result_company_exist);
if ($row_company_exist['cntUser'] > 0) {
    echo "1";
} else {
echo "0";    
}
?>
