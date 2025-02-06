<?php
session_start();
$conn = new mysqli("localhost", "root", "", "elegance_clothin", "8090");

// Check if admin is logged in
if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}

// Delete Product
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM products WHERE id=$id");
    header("Location: manage_products.php");
    exit();
}

// Fetch Products
$result = $conn->query("SELECT * FROM products");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products - Admin Panel</title>
    <link rel="stylesheet" href="manage_products.css">
</head>
<body>
    <div class="container">
        <h2>Manage Products</h2>
        <a href="add_product.php" class="btn add-btn">+ Add Product</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price (NPR)</th>
                <th>Image</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['price'] ?></td>
                <td><img src="<?= $row['image'] ?>" alt="Product" class="product-img"></td>
                <td><?= substr($row['description'], 0, 50) ?>...</td>
                <td>
                    <a href="edit_product.php?id=<?= $row['id'] ?>" class="btn edit-btn">Edit</a>
                    <a href="manage_products.php?delete=<?= $row['id'] ?>" class="btn delete-btn" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
