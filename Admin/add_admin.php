<?php
require 'config.php'; // Database connection

$username = "admin";
$email = "admin@example.com";
$password = "Admin@123"; // Use a strong password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

$sql = "INSERT INTO admin_users (username, email, password, role) VALUES (?, ?, ?, 'superadmin')";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $email, $hashed_password);

if ($stmt->execute()) {
    echo "Admin user created successfully.";
} else {
    echo "Error: " . $conn->error;
}
$stmt->close();
$conn->close();
?>
