<?php

$server = "localhost";
$username = "root";
$password = "";
$db_name = "pa_web";

$conn = mysqli_connect($server, $username, $password, $db_name);

if(!$conn){
    die("gagal terhubung ke : " .mysqli_connect_error());
}