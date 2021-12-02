<?php

$sqlname1 = "SELECT * FROM `tbl_users`";
$resultname1 = mysqli_query($con, $sqlname1);
while ($rowname1 = mysqli_fetch_assoc($resultname1)) {
    ${strtoupper($rowname1['user_id']) . 'full_name'} = $rowname1['full_name'];
    
}

?>