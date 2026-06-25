<?php
include "database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="page">
        <div class="card">
            <div class="card-head">
                <h1>Welcome Back</h1>
                <p>Please sign in to manage your ecommerce store.</p>
            </div>
            <form action="" method="post" class="stacked-form">
                <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" id="name" name="name" placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter password">
                </div>
                <div class="btn-row">
                    <button type="submit" name="submit" value="Login" class="btn primary">Login</button>
                </div>
            </form>
<?php
if (isset($_POST["submit"])) {
    $username = $_POST["name"];
    $password = $_POST["password"];
    if (!empty($username) && !empty($password)) {
        if ($username == "admin" && $password == "admin123") {
            $_SESSION["name"] = $username;
            header("Location: product.php");
            exit();
        } else {
            echo "<div class='message error'>Invalid username or password</div>";
        }
    }
    else{
        echo "<div class='message error'>Fields can't be empty</div>";
    }
}
?>
        </div>
    </div>
</body>
</html>