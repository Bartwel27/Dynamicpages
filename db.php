<?php

session_start();

$dbhost = "localhost:3306";
$dbuser = "root";
$dbpass = "root";
$dbname = "dynamicpage";

$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if (!$connect) {die("connection failed");}
$mysession = $_COOKIE["PHPSESSID"];
$randomuser = uniqid(false, "");

?>