<?php

include('../../include/lib_page.php');
$data = json_decode(file_get_contents("php://input"));
$WorkingArray = json_decode(json_encode($data), true);
$count = 0;
foreach ($WorkingArray as $row) { //Extract the Array Values by using Foreach Loop
    $uid = uniqid();
    if ($row["plotid"] != '0') {
        $query_update = "UPDATE `tbl_plots` SET `project_id`='" . $row["project"] . "',`block_id`='" . $row["blockid"] . "',"
                . "`plot_no`='" . $row["plotno"] . "',`plot_name`='" . $row["plotname"] . "',`square_feet`='" . $row["plotsqft"] . "',`sqft_value`='" . $row["plotsqftvalue"] . "',"
                . "`in_cent`='" . $row["plotcent"] . "' WHERE `plot_id` = '" . $row["plotid"] . "'";

        if ($result = $con->query($query_update)) {
            ++$count;
        }
    } else if ($row["plotid"] == '0') {
        $query = "INSERT INTO `tbl_plots`(`plot_id`, `project_id`, `block_id`, `plot_no`, `plot_name`, `square_feet`, `sqft_value`, `in_cent`) "
                . "VALUES ('$uid','" . $row["project"] . "','" . $row["blockid"] . "','" . $row["plotno"] . "','" . $row["plotname"] . "','" . $row["plotsqft"] . "','" . $row["plotsqftvalue"] . "','" . $row["plotcent"] . "')";
        if ($result = $con->query($query)) {
            ++$count;
        }
    }
}
if ($count != 0) {
    echo $count;
} else {
    echo "0";
}
?>