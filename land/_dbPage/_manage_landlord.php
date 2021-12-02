<?php

include('../../include/lib_page.php');
$isNew = $_POST['isNew'];
$land_uid = $_POST['land_uid'];
$landlord_uid = $_POST['landlord_uid'];
$landlord_name = $_POST['landlord_name'];
$landlord_bought_from = $_POST['landlord_bought_from'];
$landlord_bought_on = $_POST['landlord_bought_on'];
$landlord_sold_on = $_POST['landlord_sold_on'];
$landlord_bought_value = $_POST['landlord_bought_value'];
$landlord_sold_value = $_POST['landlord_sold_value'];
if ($landlord_bought_on != '') {
    $landlord_bought_on = strtotime($landlord_bought_on);
    $landlord_bought_on = date('Y-m-d H:i:s', $landlord_bought_on);
} else {
    $landlord_bought_on = NULL;
}
if ($landlord_sold_on != '') {
    $landlord_sold_on = strtotime($landlord_sold_on);
    $landlord_sold_on = date('Y-m-d H:i:s', $landlord_sold_on);
} else {
    $landlord_bought_on = NULL;
}
$uid = uniqid();
if ($isNew === 'true') {
    $query = "INSERT INTO `tbl_landlords`(`landlord_id`, `land_id`, `landlord_name`, `bought_on`, "
            . "`sold_on`, `bought_value`, `sold_value`, `bought_from_landlord_id`) "
            . "VALUES ('$uid','$land_uid','$landlord_name'," . ($landlord_bought_on == NULL ? "NULL" : "'$landlord_bought_on'") . "," . ($landlord_sold_on == NULL ? "NULL" : "'$landlord_sold_on'") . ","
            . "$landlord_bought_value,$landlord_sold_value,'$landlord_bought_from')";
} else if ($isNew === 'false') {
    $query = "UPDATE `tbl_landlords` SET `landlord_name`='$landlord_name',`bought_on`=" . ($landlord_bought_on == NULL ? "NULL" : "'$landlord_bought_on'") . ","
            . "`sold_on`=" . ($landlord_sold_on == NULL ? "NULL" : "'$landlord_sold_on'") . ",`bought_value`=$landlord_bought_value,"
            . "`sold_value`=$landlord_sold_value,`bought_from_landlord_id`='$landlord_bought_from' "
            . "WHERE `landlord_id` = '$landlord_uid'";
}
if ($result = $con->query($query)) {
    echo "1";
} else {
    echo "0";
}
?>