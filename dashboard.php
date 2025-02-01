<?php
session_start();
$conn = new mysqli("localhost", "root", "", "elegance_clothin", "8090");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Elegance Clothin'</title>
    <link rel="stylesheet" href="dash.css">
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">Elegance Clothin'</div>
            <nav>
                <ul>
                    <li><a href="dashboard.html">Home</a></li>
                    <li><a href="product.php">Shop</a></li>
                    <li><a href="About us.html">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="logout.php" class="logout-btn">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="welcome">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <p>Discover the latest trends in fashion at Elegance Clothin'. We offer premium quality clothing at affordable prices.</p>
    </section>

    <section class="products" style="background-color: #DFC5FE">
        <h3>Featured Products</h3>
        <div class="product-grid">
            <div class="product-item">
                <img src="designer.jpg" alt="suit">
                <p>Designer suits </p>
            </div>
            <div class="product-item">
                <img src="saree1.jpeg" alt="saree suit">
                <p>Saree </p>
            </div>
            <div class="product-item">
                <img src="lehenga.jpg" alt="lehenga">
                <p>Legenga</p>
            </div>
            <div class="product-item">
                <img src="casual.jpg" alt="summer wears">
                <p>LERIYA FASHION Shirt</p>
            </div>
        </div>
    </section>
</body>
</html>
