<?php

$server = "localhost";
$username = "root";
$password = "";
$db_name = "pa_web";

$conn = new mysqli($server, $username, $password, $db_name);

if(!$conn){
    die("gagal terhubung");
}

?>