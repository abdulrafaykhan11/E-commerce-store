<?php
$conn = mysqli_connect("localhost","root","","ecommerce_store");
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
session_start();
?>