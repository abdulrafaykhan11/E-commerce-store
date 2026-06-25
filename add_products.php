<?php
include "database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="page">
        <div class="card">
            <div class="card-head">
                <h1>Add a New Product</h1>
                <p>Fill in the details below to add a new item to your catalog.</p>
            </div>
            <form action="" method="post" class="stacked-form">
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter product name">
                </div>
                <div class="form-group">
                    <label for="price">Product Price</label>
                    <input type="number" id="price" name="price" placeholder="Enter price">
                </div>
                <div class="form-group">
                    <label for="quantity">Product Quantity</label>
                    <input type="number" id="quantity" name="quantity" placeholder="Enter quantity">
                </div>
                <div class="btn-row">
                    <button type="submit" name="submit" value="Add Product" class="btn primary">Add Product</button>
                    <a href="product.php" class="btn secondary">Back to Products</a>
                </div>
            </form>
<?php
if(isset($_POST["submit"])){
    if(!empty($_POST["name"]) && !empty($_POST["price"]) && !empty($_POST["quantity"])){
        $name=$_POST["name"];
        $price=$_POST["price"];
        $quantity=$_POST["quantity"];
        $query = "INSERT INTO prodcuts (name,price,quantity) VALUES ('$name','$price','$quantity') ";
        mysqli_query($conn,$query);
        echo "<div class='message success'>Product Added Successfully</div>";
    }
    else{
        echo"<div class='message error'>Invalid Input</div>";
    }
}
?>
        </div>
    </div>
</body>
</html>