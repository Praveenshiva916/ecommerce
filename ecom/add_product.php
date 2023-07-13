<?php
session_start();
require_once '../classes/Product.php';

// Check if the admin is logged in
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Upload image file
    $image = '';
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageDir = '../uploads/';
        $imageName = time() . '_' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $imageDir . $imageName);
        $image = $imageDir . $imageName;
    }

    // Create a new product
    $product = new Product();
    $product->setName($name);
    $product->setDescription($description);
    $product->setPrice($price);
    $product->setImage($image);
    $product->save();

    echo 'Product added successfully.';
}
?>

<form method="post" action="" enctype="multipart/form-data">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea><br>

    <label for="price">Price:</label>
    <input type="number" id="price" name="price" required><br>

    <label for="image">Image:</label>
    <input type="file" id="image" name="image" required><br>

    <input type="submit" value="Add Product">
</form>
