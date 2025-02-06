<?php
session_start();
$conn = new mysqli("localhost", "root", "", "elegance_clothin", "8090");

// Check if the admin is logged in
if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}

// Ban or Unban User
if (isset($_GET['toggle_ban'])) {
    $id = $_GET['toggle_ban'];
    
    // Get current status
    $user = $conn->query("SELECT * FROM users WHERE id=$id")->fetch_assoc();
    $new_status = $user['banned'] ? 0 : 1;
    
    $conn->query("UPDATE users SET banned=$new_status WHERE id=$id");
    header("Location: manage_users.php");
}

// Fetch all users
$result = $conn->query("SELECT * FROM users");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users - Admin Panel</title>
    <link rel="stylesheet" href="manage.css">
</head>
<body>
    <h2>Manage Users</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['username'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= isset($row['banned']) && $row['banned'] ? 'Banned' : 'Active' ?></td>
            <td>
                <a href="manage_users.php?toggle_ban=<?= $row['id'] ?>">
                    <?= isset($row['banned']) && $row['banned'] ? 'Unban' : 'Ban' ?>
                </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
