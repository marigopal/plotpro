
<?php
session_start();
include('../include/db_config.php');
include('../include/function_php_encryption.php');
include('../include/user_info.php');

if (isset($_COOKIE['user_id'])){
    $current_user = decrypt($_COOKIE['user_id']);
    
    $query = "SELECT * FROM `tbl_users` WHERE `user_id` = '$current_user'";
   
    $result = mysqli_query($con, $query); // select query
$global_user = mysqli_fetch_array($result);
    
   
}

else {header ( "Location: /login" ); 
}
if($global_user['role_id'] == 2 && $global_user['is_admin'] == 0)
{include ('../include/menu/menu_telecaller.php');}
elseif($global_user['role_id'] == 3 &&  $global_user['is_admin'] == 0)
{include ('../include/menu/menu_manager.php');}
elseif($global_user['role_id'] == 1 && $global_user['is_admin'] == 1)
{include ('../include/menu/menu_it.php');}




?>

