<?php

include('../../include/lib_page.php');
$delete_id = $_POST['uid'];
$delete_company = "UPDATE `tbl_company` SET `is_deleted`='1' WHERE `company_id` = '$delete_id'";
if ($result = $con->query($delete_company)) {
    echo "1";
} else {
    echo "0";
}
?>