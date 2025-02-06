<?php
session_start();
$conn = new mysqli("localhost", "root", "", "elegance_clothin", "8090");

// Check if admin is logged in
if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}

// Handle Product Addition
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_POST['image']; // For now, image is a URL. Later, you can handle file uploads.

    $sql = "INSERT INTO products (name, price, image, description) VALUES ('$name', '$price', '$image', '$description')";
    
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
    <title>Add Product</title>
    <link rel="stylesheet" href="manage.css">
</head>
<body>
    <div class="container">
        <h2>Add New Product</h2>
        <form action="" method="post">
            <label>Product Name:</label>
            <input type="text" name="name" required>
            
            <label>Price (NPR):</label>
            <input type="number" name="price" required>
            
            <label>Image URL:</label>
            <input type="text" name="image" required>
            
            <label>Description:</label>
            <textarea name="description" required></textarea>

            <button type="submit" class="btn add-btn">Add Product</button>
        </form>
    </div>
</body>
</html>
