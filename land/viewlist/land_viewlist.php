<?php
include '../../include/lib_page.php';
$sno = 0;
$sql = "SELECT * FROM `tbl_lands` WHERE `is_deleted` = '0'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array(MYSQLI_BOTH)) {
        ?>	
        <tr>
            <td><?= ++$sno; ?></td>
            <td hidden=""><?php echo $row[0]; ?></td>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[2]; ?></td>
            <td><?php echo $row[3]; ?></td>
            <td><?php echo $row[6]; ?></td>
            <td><?php echo $row[7]; ?></td>
            <td><?php echo $row[9]; ?></td>
            <td><?php echo $row[8]; ?></td>
            <td>
                <a href="/land/landlord_list?id=<?php echo $row[0]; ?>"><i class="fas fa-eye"></i></a>
                <a href="#" data-toggle="modal" data-target="#land_modal_box" onclick="update_land('<?= $row[0]; ?>');"><i class="fas fa-edit"></i></a>
                <a href="#" data-toggle="modal" data-target="#deleteland_modal_box" onclick="delete_land('<?= $row[0]; ?>');"><i class="fas fa-trash-alt"></i></a>
            </td>
        </td>
        </tr>
        <?php
    }
}
mysqli_close($con);
?>
  