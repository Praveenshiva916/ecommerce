<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
?>

<h1>Welcome to the Admin Panel</h1>
<p>Here, you can manage your products.</p>
<a href="add_product.php">Add Product</a>
