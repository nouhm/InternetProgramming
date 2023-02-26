<?php 

$server = "127.0.0.1";
$username = "root";
$pass = "";
$database = "Lib";

$conn = mysqli_connect($server,$username,$pass,$database);

if (!$conn) {
    die("<script> alert('Connection Failed.') </script>");
}

?>



