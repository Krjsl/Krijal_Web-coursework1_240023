<?php
session_start();
$conn = new mysqli("localhost", "root", "", "elegance_clothin", "8090");

// Check if the user is logged in (admin only)
if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Elegance Clothin'</title>
    <link rel="stylesheet" href="dash.css">
    <style>
        .admin-container {
            display: flex;
        }
        .sidebar {
            width: 250px;
            background-color: #333;
            color: white;
            height: 100vh;
            padding: 20px;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 10px;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
        }
    </style>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">Elegance Clothin' - Admin Panel</div>
            <nav>
                <ul>
                    <li><a href="dashboard.php">Home</a></li>
                    <li><a href="logout.php" class="logout-btn">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <div class="admin-container">
        <div class="sidebar">
            <h3>Admin Menu</h3>
            <ul>
                <li><a href="manage_products.php">Manage Products</a></li>
                <li><a href="manage_orders.php">Manage Orders</a></li>
                <li><a href="manage_users.php">Manage Users</a></li>
                <li><a href="reports.php">Reports & Analytics</a></li>
            </ul>
        </div>
        
        <div class="content">
            <h2>Welcome, <?php echo $_SESSION['admin_username']; ?>!</h2>
            <p>You are logged in as: <?php echo $_SESSION['admin_role']; ?></p>
            
            <section class="overview">
                <h3>Dashboard Overview</h3>
                <p>Quick stats and analytics will be displayed here.</p>
            </section>
        </div>
    </div>
</body>
</html>
