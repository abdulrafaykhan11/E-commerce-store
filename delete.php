<?php
include "database.php";
if(!isset($_SESSION["name"])){
    header("Location: login.php");
    exit();
}
if(isset($_GET['id'])){
    $dlt = $_GET['id'];
    $query = "DELETE FROM prodcuts WHERE id = {$dlt}";
    $result = mysqli_query($conn,$query);
    if(mysqli_affected_rows($conn) > 0){
        echo "<script>alert('Product deleted successfully')</script>";
        echo "<script>window.location.href = 'product.php'</script>";
    }
}
?>