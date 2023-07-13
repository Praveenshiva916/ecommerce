<?php
session_start();
require_once 'classes/Cart.php';
require_once 'classes/Product.php';

$cart = new Cart();

// Add a product to the cart
if ($_GET['action'] === 'add' && isset($_GET['product_id'])) {
    $product = Product::getProductById($_GET['product_id']);
    if ($product) {
        $cart->addProduct($product);
    }
    header('Location: cart.php');
    exit;
}

// Remove a product from the cart
if ($_GET['action'] === 'remove' && isset($_GET['product_id'])) {
    $cart->removeProduct($_GET['product_id']);
    header('Location: cart.php');
    exit;
}

// Display the cart
$cartItems = $cart->getItems();

foreach ($cartItems as $item) {
    echo '<h2>' . $item['name'] . '</h2>';
    echo '<img src="' . $item['image'] . '" alt="' . $item['name'] . '">';
    echo '<p>Price: $' . $item['price'] . '</p>';
    echo '<a href="cart.php?action=remove&product_id=' . $item['id'] . '">Remove</a>';
    echo '<hr>';
}

echo '<a href="checkout.php">Proceed to Checkout</a>';
?>
