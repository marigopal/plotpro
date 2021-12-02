<?php
include '../../include/lib_page.php';
$sno = 0;
$current_user = decrypt($_COOKIE['user_id']);
$sql = "SELECT a.`lead_task_id`,a.`lead_project_id`,a.`task_name`,a.`task_description`,a.`assigned_to`,a.`status_id`,a.`modified_by`,a.`modified_on`,a.`is_deleted`,b.lead_project_id,b.project_id,b.lead_id,b.managed_by,c.project_id,c.project_name,d.lead_id,d.first_name,e.task_status_id,e.task_status_name FROM `tbl_lead_task` a LEFT JOIN tbl_lead_project b on a.`lead_project_id` = b.lead_project_id LEFT JOIN tbl_projects c on b.project_id = c.project_id LEFT JOIN tbl_leads d on b.lead_id = d.lead_id LEFT JOIN tbl_task_status e on a.`status_id` = e.task_status_id WHERE a.`assigned_to` = '$current_user'";
// echo $sql;exit();
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array(MYSQLI_BOTH)) {
        ?>	
        <tr>
            <td><?= ++$sno; ?></td>
            <td hidden=""><?php echo $row['lead_task_id']; ?></td>
            <td><?php echo $row['project_name']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo ${strtoupper(trim($row['managed_by'])) . 'full_name'} ; ?></td>
            <td><?php echo $row['task_name']; ?></td>
            <td><?php echo $row['task_status_name']; ?></td>
            <td><?php echo $row['modified_on']; ?></td>
            <td><?php echo ${strtoupper(trim($row['modified_by'])) . 'full_name'} ; ?></td>
            <td>
            <a href="#" data-toggle="modal" data-target="#leads_tasklist_modal" onclick="update_task('<?php echo $row['lead_task_id'] ?>');"><i class="fas fa-edit"></i>
            </td>
        </tr>
        <?php
    }
}
mysqli_close($con);
?>
  