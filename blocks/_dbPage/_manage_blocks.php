<?php

include('../../include/lib_page.php');
$isNew = $_POST['isNew'];
$blocks_id = $_POST['blocks_id'];
$blocks_name = $_POST['blocks_name'];
$uid = uniqid();
if ($isNew === 'true') {
    $blocks_query = "INSERT INTO `tbl_blocks`(`block_id`, `block_name`) VALUES ('$uid','$blocks_name')";
} else if ($isNew === 'false') {
    $blocks_query = "UPDATE `tbl_blocks` SET `block_name`='$blocks_name' WHERE `block_id` ='$blocks_id'";
}
if ($result = $con->query($blocks_query)) {
    echo "1";
} else {

    echo "0";
}
?>