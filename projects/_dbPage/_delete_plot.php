<?php

include('../../include/lib_page.php');
$delete_id = $_POST['id'];
$delete_query = "UPDATE `tbl_plots` SET `is_deleted`='1' WHERE `plot_id` = '$delete_id'";
if ($result = $con->query($delete_query)) {
    echo "1";
} else {
    echo "0";
}
?>