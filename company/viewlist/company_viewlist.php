<?php
include '../../include/lib_page.php';
$sno = 0;
$sql = "SELECT * FROM `tbl_company` WHERE `is_deleted` = '0'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array(MYSQLI_BOTH)) {
        ?>	
        <tr>
            <td  class="text-center"><?= ++$sno; ?></td>
            <td hidden=""><?php echo $row['company_id']; ?></td>
            <td><?php echo $row['company_name']; ?></td>
            <td><?php echo $row['company_address1'];
                      echo '</br>';
                      echo $row['company_address2']; ?></td>
            <td><?php echo $row['company_city']; ?></td>
            <td><?php echo $row['company_zipcode']; ?></td>
            <td><?php echo $row['company_properitor']; ?></td>
            <td>
                <a href="#" data-toggle="modal" data-target="#company_modal_box" onclick="update_company('<?php echo $row['company_id'] ?>');"><i class="fas fa-edit"></i></a>

            </td>
        </tr>
        <?php
    }
}
mysqli_close($con);
?>