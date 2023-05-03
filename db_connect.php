<?php
$host = "localhost";
$user = "jpie2018_baza";
$password = "wiosna123"; 
$dbname = "jpie2018_baza"; 

session_start();
$mysqli = mysqli_connect($host, $user, $password, $dbname);
mysqli_set_charset($mysqli,"utf8");
if (!$mysqli) {
        die("Connection failed: " . mysqli_connect_error());
     }
