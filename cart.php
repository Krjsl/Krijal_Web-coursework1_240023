<?php
session_start();
$conn = new mysqli("localhost", "root", "", "elegance_clothin", "8090");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add to cart functionality
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("INSERT INTO cart (product_id, quantity) VALUES (?, ?)");
    $stmt->bind_param("ii", $product_id, $quantity);
    $stmt->execute();
    $stmt->close();
}

// Retrieve cart items
$sql = "SELECT cart.id, products.name, products.price, products.image, cart.quantity 
        FROM cart 
        JOIN products ON cart.product_id = products.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Elegance Clothin'</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Your Shopping Cart</h1>
        <table>
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
            <?php 
            $total_price = 0;
            while ($row = $result->fetch_assoc()): 
                $total = $row['price'] * $row['quantity'];
                $total_price += $total;
            ?>
            <tr>
                <td><img src="<?php echo $row['image']; ?>" width="80"></td>
                <td><?php echo $row['name']; ?></td>
                <td>NPR <?php echo number_format($row['price'], 2); ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td>NPR <?php echo number_format($total, 2); ?></td>
                <td>
                    <a href="remove.php?id=<?php echo $row['id']; ?>" class="btn">Remove</a>
                </td> 
            </tr>
            <?php endwhile; ?>
            <tr>
                <td colspan="4"><strong>Total Price</strong></td>
                <td colspan="2"><strong>NPR <?php echo number_format($total_price, 2); ?></strong></td>
            </tr>
        </table>
        <a href="product.php" class="btn">Continue Shopping</a>
    </div>
</body>
</html>

<?php $conn->close(); ?>
