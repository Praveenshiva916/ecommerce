<?php
session_start();

// Check if the admin is already logged in
if (isset($_SESSION['admin'])) {
    header('Location: dashboard.php');
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate login credentials (you can replace this with your own authentication logic)
    if ($username === 'admin' && $password === 'password') {
        $_SESSION['admin'] = true;
        header('Location: dashboard.php');
        exit;
    } else {
        echo 'Invalid login credentials.';
    }
}
?>

<form method="post" action="">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>

    <input type="submit" value="Login">
</form>
