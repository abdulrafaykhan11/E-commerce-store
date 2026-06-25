<?php
include "database.php";
if(isset($_GET["id"])){
    $edit_id = $_GET["id"];
    $select_query = "SELECT * FROM prodcuts WHERE id = {$edit_id}";
    $select_result = mysqli_query($conn,$select_query);
    if(mysqli_num_rows($select_result) > 0){
        $row = mysqli_fetch_assoc($select_result);
    }
    else{
        echo "No product found";
    }
}
if (isset($_POST["submit"])) {
    if (!empty($_POST["name"]) && !empty($_POST["price"]) && !empty($_POST["quantity"])) {
        $name = $_POST["name"];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];

        $query = "UPDATE prodcuts SET name = '$name' , price = {$price} , quantity = {$quantity} WHERE id = $edit_id";
        $result = mysqli_query($conn, $query);
       
        if (mysqli_affected_rows($conn) > 0) {
            echo "Item Edited Successfully";
            echo "<script>window.location.href = 'product.php'</script>";
        } else {
            echo "No changes were made";
            echo "<script>window.location.href = 'product.php'</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="page">
        <div class="card">
            <div class="card-head">
                <h1>Edit Product</h1>
                <p>Update the selected product details below.</p>
            </div>
            <form action="" method="post" class="stacked-form">
                <div class="form-group">
                    <label for="name">New Product Name</label>
                    <input type="text" id="name" name="name" value="<?php echo isset($row["name"]) ? $row["name"] : "" ?>">
                </div>
                <div class="form-group">
                    <label for="price">New Product Price</label>
                    <input type="number" id="price" name="price" value="<?php echo isset($row["price"]) ? $row["price"] : "" ?>">
                </div>
                <div class="form-group">
                    <label for="quantity">New Product Quantity</label>
                    <input type="number" id="quantity" name="quantity" value="<?php echo isset($row["quantity"]) ? $row["quantity"] : "" ?>">
                </div>
                <div class="btn-row">
                    <button type="submit" name="submit" value="Edit Item" class="btn primary">Edit Item</button>
                    <a href="product.php" class="btn secondary">Back to Products</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>