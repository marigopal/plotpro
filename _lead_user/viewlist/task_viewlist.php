<?php
include '../../include/lib_page.php';
$sno = 0;
if (!empty($_POST['filter'])) {
    $filter = $_POST['filter'];
    $where = "WHERE a.`lead_id` = '$filter'";
    // echo $filter;echo $where;
} else {
    $where = "";
}
$sql = "SELECT a.`lead_project_id`,a.`project_id`,a.`lead_id`,a.`status_id`,a.`managed_by`,a.`created_by`,a.`created_on`,
a.`modified_by`,a.`modified_on`,a.`is_deleted`,b.project_id,b.project_name,c.lead_id,c.first_name,d.task_status_id,d.task_status_name 
FROM `tbl_lead_project` a 
LEFT JOIN tbl_projects b on a.`project_id` = b.project_id 
LEFT JOIN tbl_leads c on a.`lead_id` = c.lead_id 
LEFT JOIN tbl_task_status d on a.`status_id` = d.task_status_id $where";
// echo $sql;exit();
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array(MYSQLI_BOTH)) {
        ?>
        <tr data-widget="expandable-table" aria-expanded="false" class="thead-dark" style="background: #91bbff;">
            <td><?= ++$sno; ?></td>
            <td hidden=""><?php echo $row['lead_project_id']; ?></td>
            <td><?php echo $row['modified_on']; ?></td>
            <td><?php echo $row['project_name']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['task_status_name']; ?></td>
            <td><?php echo ${strtoupper(trim($row['managed_by'])) . 'full_name'}; ?></td>
            <td>
                <a href="#" data-toggle="modal" data-target="#leads_project_modal" onclick="update_lead_project('<?php echo $row['lead_project_id'] ?>');"><i class="fas fa-edit"></i></a>
                <a href="#" data-toggle="modal" data-target="#leads_task_modal" onclick="add_task('<?php echo $row['lead_project_id'] ?>');"><i class="fas fa-tasks"></i></a>
            </td>
            
        </tr>
        <tr class="expandable-body d-none">
            <td style="width:auto;" colspan="7"><p>
                <table class="table table-bordered table-striped pl-0">
                    <thead>
                        <tr>
                            <th hidden="">ID</th>
                            <th>Modified Date</th>
                            <th>Task Name</th>
                            <th>Description</th>
                            <th>Assigned To</th>
                            <th>Status</th>
                            <th>Updated By</th>
                            <th>Action</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $lead_project_id = $row['lead_project_id'];
                        
                        $sub_sql = "SELECT a.`lead_task_id`,a.`lead_project_id`,a.`task_name`,a.`task_description`,a.`assigned_to`,a.`status_id`,a.`modified_by`,a.`modified_on`,a.`is_deleted`,b.task_status_id,b.task_status_name FROM `tbl_lead_task` a LEFT JOIN tbl_task_status b on a.`status_id` = b.task_status_id WHERE a.`lead_project_id` = '$lead_project_id'";
     
                        $subresult = $con->query($sub_sql);
                        if ($subresult->num_rows > 0) {
                            while ($subrow = $subresult->fetch_array(MYSQLI_BOTH)) {
                                ?>	
                                <tr  style="background:white;">
                                    <td style="width:auto;" hidden=""><p><?php echo $subrow['lead_task_id']; ?></p></td>
                                    <td style="width:auto;"><p><?php echo $subrow['modified_on']; ?></p></td>
                                    <td style="width:auto;"><p><?php echo $subrow['task_name']; ?></p></td>
                                    <td style="width:auto;" ><p><?php echo $subrow['task_description']; ?></p></td>
                                    <td style="width:auto;"><p><?php echo ${strtoupper(trim($subrow['assigned_to'])) . 'full_name'} ; ?></p></td>
                                    <td style="width:auto;"><p><?php echo $subrow['task_status_name']; ?></p></td>
                                    <td style="width:auto;"><p><?php echo ${strtoupper(trim($subrow['modified_by'])) . 'full_name'} ; ?></p></td>
                                    <td style="width:auto;"><p><a href="#" data-toggle="modal" data-target="#leads_task_modal" onclick="update_task('<?php echo $subrow['lead_task_id'] ?>');"><i class="fas fa-edit"></i></a></p></td>
                                    
                                   
                                </tr>   
                                <?php
                            }
                        }
                        ?> 

                    </tbody>
                </table>
            </p></td>
        </tr>   
        <?php
    }
}

mysqli_close($con);
?>
  