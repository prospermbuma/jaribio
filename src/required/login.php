<?php

// required/login.php
require_once 'db_connection.php';
if (isset($_POST)) {
    // Establish database connection
    $pdo = getDbConnection();

    // Get user input
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validate and sanitize input
    $username = trim($username);
    $password = trim($password);
    
    // Using htmlspecialchars to prevent XSS attacks
    $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');

    // Check if fields are empty
    if (empty($username) || empty($password)) {
        echo "Username and password are required.";
        exit;
    }

    // Prepare and execute the select statement
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$username, $username]);
    
    // Fetch user data
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user && password_verify($password, $user['password'])) {
        // Successful login
        echo "Login successful. Welcome, " . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . "!";
        // Here you can set session variables or redirect the user
    } else {
        echo "Invalid username or password.";
    }
}
?>