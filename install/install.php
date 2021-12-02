
<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("gp-helpdesk.c6bedcoluw3c.ap-south-1.rds.amazonaws.com", "gpuser", "83JdX10wfC0HRlJOMOHC");

$db_exist = "DROP DATABASE IF EXISTS myDB";
if ($mysqli->query($db_exist) === TRUE) {
  $sql = "CREATE DATABASE myDB";
  if ($mysqli->query($sql) === TRUE) {
    $mysqli->select_db("myDB");
    
    $query = 
    "CREATE TABLE tbl_blocks(".
     " block_id varchar(64) NOT NULL,".
     " block_name varchar(4) NOT NULL,".
      " is_deleted int(10) NOT NULL DEFAULT "."0".");".

     "CREATE TABLE tbl_company (".
     "company_id varchar(64) NOT NULL,".
     "company_name varchar(1000) DEFAULT NULL,".
     "company_address1 varchar(500) DEFAULT NULL,".
     "company_address2 varchar(500) NOT NULL,".
     "company_city varchar(100) DEFAULT NULL,".
     "company_zipcode varchar(10) DEFAULT NULL,".
     "company_email varchar(100) NOT NULL,".
     "company_mobileno varchar(50) NOT NULL,".
     "company_phone varchar(50) NOT NULL,".
     "company_properitor varchar(200) DEFAULT NULL,".
     "otp varchar(50) NOT NULL,".
     "otp_expiration_date datetime NOT NULL,".
      "is_active int NOT NULL DEFAULT "."0".",".
      "is_deleted int DEFAULT "."0".")"; 
      
      
      // echo $query;exit();
      if ($mysqli->query($query) === TRUE) {
        echo "insert table";
        }
  
  }
}else {
  echo "Error creating database: " . $mysqli->error;
}
?>