<?php
include "database.php";
if(!isset($_SESSION["name"])){
    header("Location: login.php");
    exit();    
}
if(isset($_GET["add"])){
    $id = $_GET["add"];
    if(!isset($_SESSION["cart"])){
        $_SESSION["cart"] = array();
    }
    $_SESSION["cart"][] = $id;

    header("Location: product.php");
    exit();
}
$query = "SELECT * FROM PRODCUTS";
$result = mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="page">
        <div class="card">
            <div class="card-head">
                <h1>Product Catalog</h1>
                <p>Manage your inventory, add items to cart, and edit product details effortlessly.</p>
            </div>
            <div class="btn-row">
                <a href="add_products.php" class="btn primary">Add New Product</a>
                <a href="cart.php" class="btn secondary">View Cart</a>
            </div>
            <?php if(mysqli_num_rows($result) > 0): ?>
                <div class="table-shell" style="margin-top: 20px;">
                    <table>
                        <thead>
                            <tr>
                                <th>Product Id</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Quantity</th>
                                <th colspan="3">Action Buttons</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($result)): ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo number_format($row['price']); ?></td>
                                    <td><?php echo $row['quantity']; ?></td>
                                    <td><a href='product.php?add=<?php echo $row['id']; ?>' class='link-pill add'>Add To Cart</a></td>
                                    <td><a href='edit.php?id=<?php echo $row['id']; ?>' class='link-pill edit'>Edit</a></td>
                                    <td><a href='delete.php?id=<?php echo $row['id']; ?>' class='link-pill delete'>Delete</a></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="message error">No products found.</div>
            <?php endif; ?>
            <form action="logout.php" method="post" style="margin-top: 20px;">
                <button type="submit" name="submit" value="Logout" class="btn danger">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>

