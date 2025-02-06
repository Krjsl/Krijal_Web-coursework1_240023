<?php
session_start();
$conn = new mysqli("localhost", "root", "", "elegance_clothin", "8090");

// Check if admin is logged in
if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}

// Get Product Details
$id = $_GET['id'];
$product = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();

// Handle Product Update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    $sql = "UPDATE products SET name='$name', price='$price', image='$image', description='$description' WHERE id=$id";
    
    if ($conn->query($sql)) {
        header("Location: manage_products.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="manage.css">
</head>
<body>
    <div class="container">
        <h2>Edit Product</h2>
        <form action="" method="post">
            <label>Product Name:</label>
            <input type="text" name="name" value="<?= $product['name'] ?>" required>
            
            <label>Price (NPR):</label>
            <input type="number" name="price" value="<?= $product['price'] ?>" required>
            
            <label>Image URL:</label>
            <input type="text" name="image" value="<?= $product['image'] ?>" required>
            
            <label>Description:</label>
            <textarea name="description" required><?= $product['description'] ?></textarea>

            <button type="submit" class="btn edit-btn">Update Product</button>
        </form>
    </div>
</body>
</html>
