<?php
include "database.php";
if(!isset($_SESSION["name"])){
    header("Location: login.php");
    exit();
}
$products = [];
$total_bill = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="page">
        <div class="card">
            <div class="card-head">
                <h1>Your Cart</h1>
                <p>Review the selected items and total amount before checkout.</p>
            </div>
            <div class="btn-row">
                <a href="product.php" class="btn secondary">Back to Products</a>
            </div>
            <?php if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])) { $id_string = implode(",", $_SESSION["cart"]); $query = "SELECT * FROM prodcuts WHERE id IN ($id_string)"; $result = mysqli_query($conn, $query); if (mysqli_num_rows($result) > 0) { echo "<div class='table-shell' style='margin-top: 20px;'><table><thead><tr><th>Product Id</th><th>Product Name</th><th>Product Price</th><th>Action</th></tr></thead><tbody>"; while ($row = mysqli_fetch_assoc($result)) { echo "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . number_format($row['price']) . "</td><td><a href='remove_cart.php?id=".$row['id']."' class='link-pill delete'>Remove</a></td></tr>"; $total_bill += $row['price']; } echo "</tbody></table></div>"; echo "<div class='summary'>Total Bill: " . number_format($total_bill) . "</div>"; } } else { echo "<div class='message error'>Nothing in the cart yet. Fill it ASAP!!</div>"; } ?>
        </div>
    </div>
</body>
</html>