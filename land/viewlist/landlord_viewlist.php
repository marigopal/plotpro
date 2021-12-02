<?php
include '../../include/lib_page.php';
$sno = 0;
if (!empty($_POST['filter'])) {

    $and = "AND a.land_id = '" . $_POST['filter'] . "'";
} else {
    $and = "";
}
$sql = "SELECT a.landlord_id, a.land_id,a.landlord_name, a.bought_on, a.sold_on, a.bought_value, a.sold_value, "
        . "a.bought_from_landlord_id, b.landlord_name as bought_landlord, a.is_deleted  "
        . " FROM `tbl_landlords` a left join tbl_landlords b on a.bought_from_landlord_id = b.landlord_id WHERE a.is_deleted = '0' $and";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array(MYSQLI_BOTH)) {
        ?>	
        <tr>
            <td><?= ++$sno; ?></td>
            <td hidden=""><?php echo $row[0]; ?></td>
            <td hidden=""><?php echo $row[1]; ?></td>
            <td><?php echo $row[2]; ?></td>
            <td><?php echo $row[3]; ?></td>
            <td><?php echo $row[5]; ?></td>
            <td><?php echo $row[4]; ?></td>
            <td><?php echo $row[6]; ?></td>
            <td><?php echo $row["bought_landlord"]; ?></td>
            <td>
                <a href="#" data-toggle="modal" data-target="#landlord_modal_box" onclick="update_landlord('<?= $row[0] ?>');"><i class="fas fa-edit"></i></a>
                <a href="#" data-toggle="modal" data-target="#deletelord_modal_box" onclick="delete_landlord('<?= $row[0]; ?>');"><i class="fas fa-trash-alt"></i></a>
            </td>
        </td>
        </tr>
        <?php
    }
}
mysqli_close($con);
?>