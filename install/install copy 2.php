<?php
$servername = "gp-helpdesk.c6bedcoluw3c.ap-south-1.rds.amazonaws.com";
$username = "gpuser";
$password = "83JdX10wfC0HRlJOMOHC";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
 
  $conn->select_db("myDB");
  $query = 'DROP TABLE IF EXISTS `tbl_blocks`;'.
        'CREATE TABLE `tbl_blocks` ('.
        '`block_id` varchar(64) NOT NULL,'.
        '`block_name` varchar(4) NOT NULL,'.
        '`is_deleted` int NOT NULL DEFAULT "0",'.
        'UNIQUE KEY `block_id` (`block_id`))';
// echo $query;exit();

        if ($conn->query($query) === TRUE) {
        echo "insert table";
        }

} else {
  echo "Error creating database: " . $conn->error;
}

$conn->close();
?> 