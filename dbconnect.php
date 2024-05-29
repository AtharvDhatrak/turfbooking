<?php
$server="localhost";
$username="root";
$password="";
$database="turfbooking";
$conn=mysqli_connect($server,$username,$password,$database);

if (!$conn){
    die("error".msqli_connect_error());
}
?>