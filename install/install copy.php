<?php
date_default_timezone_set("Asia/Calcutta");
$con = mysqli_connect("gp-helpdesk.c6bedcoluw3c.ap-south-1.rds.amazonaws.com", "gpuser", "83JdX10wfC0HRlJOMOHC");
if (!$con) {
    header("Location: /db_fail");
    die("Connection failed: " . mysqli_connect_error());
   
}
$query  = 'CREATE DATABASE xbc';
$result = mysqli_query($query);

mysql_select_db('xbc') or die('Cannot select database'); 
$query = 'DROP TABLE IF EXISTS `tbl_blocks`;'.
        'CREATE TABLE `tbl_blocks` ('.
        '`block_id` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,'.
        '`block_name` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,'.
        '`is_deleted` int NOT NULL DEFAULT '0','.
        'UNIQUE KEY `block_id` (`block_id`))';
$query = 'CREATE TABLE users( ' .
	 ' id int(10) DEFAULT '0' NOT NULL auto_increment, ' .
	 ' username varchar(40), ' .
	 ' password varchar(50), ' .
	 ' regdate varchar(20), ' .
	 ' email varchar(100), ' .
	 ' ip varchar(15), ' .
	 ' flag varchar(1), ' .
	 'PRIMARY KEY(id))';

// 	 'CREATE TABLE news( ' .
// 	 ' id int(10) DEFAULT '0' NOT NULL auto_increment, ' .
// 	 ' author varchar(40), ' .
// 	 ' title varchar(40), ' .
// 	 ' content NOT NULL ' .
// 	 ' date varchar(20) ' .
// 	 'PRIMARY KEY(id))';

// 	 'CREATE TABLE maps( ' .
// 	 ' id int(10) DEFAULT '0' NOT NULL auto_increment, ' .
// 	 ' author varchar(40), ' .
// 	 ' title varchar(40) NOT NULL, ' .
// 	 ' type varchar(20), ' .
// 	 ' content MEDIUMBLOB NOT NULL, ' .
// 	 ' size NOT NULL, ' .
// 	 'PRIMARY KEY(id))';

$result = mysqli_query($query);

include 'closedb.php';
?> 