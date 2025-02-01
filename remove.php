<?php
session_start();
$conn = new mysqli("localhost", "root", "", "elegance_clothin", "8090");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $cart_id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM cart WHERE id = ?");
    $stmt->bind_param("i", $cart_id);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
header("Location: cart.php");
?>
