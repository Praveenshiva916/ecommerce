<?php
require_once 'classes/Product.php';

// Fetch products from the database
$products = Product::getAllProducts();

// Display product information
foreach ($products as $product) {
    echo '<h2>' . $product['name'] . '</h2>';
    echo '<img src="' . $product['image'] . '" alt="' . $product['name'] . '">';
    echo '<p>' . $product['description'] . '</p>';
    echo '<p>Price: $' . $product['price'] . '</p>';
    echo '<a href="cart.php?action=add&product_id=' . $product['id'] . '">Add to Cart</a>';
    echo '<hr>';
}
?>
