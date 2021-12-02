<?php
include '../../include/lib_page.php';
$sno = 0;
$sql = "SELECT a.`project_id`,a.`project_name`,a.`projecttype_id`,a.`company_id`,a.`land_id`,a.`handled_by`,a.`location`,a.`landmark`,a.`latitude`,a.`longitude`,a.`is_active`,a.`is_cancelled`,a.`cancelled_reason`,a.`easy_emi_available`,a.`dtcp_approved`,a.`patta_available`,a.`chitta_available`,a.`is_deleted`,b.land_id,b.landlord_name,c.user_id,c.full_name FROM tbl_projects a LEFT JOIN tbl_lands b on a.land_id = b.land_id left join tbl_users c on a.handled_by = c.user_id WHERE a.is_deleted = '0'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array(MYSQLI_BOTH)) {
        ?>	
        <tr>
            <td><?= ++$sno; ?></td>
            <td hidden=""><?php echo $row[0]; ?></td>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[19]; ?></td>
            <td><?php echo $row[6]; ?></td>
            <td><?php echo $row[7]; ?></td>
            <td><?php echo $row['full_name']; ?></td>
            <td>
                <a href="/projects/index_amenity?id=<?php echo $row[0]; ?>"><i class="fas fa-eye"></i></a>
                <a href="#" data-toggle="modal" data-target="#project_modal_box" onclick="update_project('<?= $row[0]; ?>')"><i class="fas fa-edit"></i></a>
                <a href="#" data-toggle="modal" data-target="#deleteproject_modal_box" onclick="delete_project('<?= $row[0]; ?>');"><i class="fas fa-trash-alt"></i></a>
            </td>
        </td>
        </tr>
        <?php
    }
}
mysqli_close($con);
?>  