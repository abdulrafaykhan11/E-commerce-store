<?php
include "database.php";
if(!isset($_SESSION["name"])){
    header("Location: login.php");
    exit();
}
if(isset($_GET['id'])){
    $remove = $_GET['id'];
    $key = array_search($remove,$_SESSION["cart"]);

    if($key !== false){
        array_splice($_SESSION["cart"],$key,1);
    }
    header("Location: cart.php");
    exit();
}

?>