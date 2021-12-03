<?php
$input_host = $_POST['input_host'];
$input_username = $_POST['input_username'];
$input_password = $_POST['input_password'];
$input_dbname = $_POST['input_dbname'];

$link = mysqli_connect($input_host,$input_username, $input_password);


$query = "DROP DATABASE IF EXISTS $input_dbname;"; 
$query .= "CREATE DATABASE $input_dbname;"; 
$query .= "USE $input_dbname;"; 

$query .= "DROP TABLE IF EXISTS `tbl_blocks`;"; 
$query .= "CREATE TABLE `tbl_blocks` (
    `block_id` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
    `block_name` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
    `is_deleted` int(11) NOT NULL DEFAULT '0',
    UNIQUE KEY `block_id` (`block_id`)
  );"; 

$query .= "DROP TABLE IF EXISTS `tbl_company`;"; 
$query .= "CREATE TABLE `tbl_company` (
    `company_id` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
    `company_name` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `company_address1` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `company_address2` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
    `company_city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `company_zipcode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `company_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `company_mobileno` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
    `company_phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
    `company_properitor` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `otp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
    `otp_expiration_date` datetime NOT NULL,
    `is_active` int(11) NOT NULL DEFAULT '0',
    `is_deleted` int(11) DEFAULT '0',
    PRIMARY KEY (`company_id`),
    UNIQUE KEY `company_id` (`company_id`)
  );"; 

$query .= "DROP TABLE IF EXISTS `tbl_landlords`;"; 
$query .= "CREATE TABLE `tbl_landlords` (
    `landlord_id` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
    `land_id` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
    `landlord_name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
    `bought_on` datetime DEFAULT NULL,
    `sold_on` datetime DEFAULT NULL,
    `bought_value` decimal(18,2) NOT NULL,
    `sold_value` decimal(18,2) NOT NULL,
    `bought_from_landlord_id` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
    `is_deleted` int(11) NOT NULL DEFAULT '0',
    PRIMARY KEY (`landlord_id`),
    UNIQUE KEY `landlord_id` (`landlord_id`)
  );"; 

$query .= "DROP TABLE IF EXISTS `tbl_lands`;"; 
$query .= "CREATE TABLE `tbl_lands` (
    `land_id` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
    `landlord_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
    `land_location` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
    `landmark` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
    `latitude` varchar(23) COLLATE utf8mb4_unicode_ci NOT NULL,
    `longitude` varchar(23) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `land_total_acres` decimal(18,2) NOT NULL,
    `land_total_value` decimal(18,2) NOT NULL,
    `land_sqft_value` decimal(18,2) NOT NULL,
    `land_total_cent` decimal(18,2) NOT NULL,
    `is_deleted` int(11) NOT NULL DEFAULT '0',
    PRIMARY KEY (`land_id`),
    UNIQUE KEY `land_id` (`land_id`)
  );"; 

// $query .= ";"; 

if (mysqli_multi_query($link, $query)) {
    echo "1";
}

?>