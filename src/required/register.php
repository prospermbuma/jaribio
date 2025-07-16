<?php

// required/register.php
require_once 'db_connection.php';

if (isset($_POST)) {
    // Establish database connection
    // Using require_once to ensure the file is included only once
    $pdo = getDbConnection();

    // Get user input
    // Using null coalescing operator to avoid undefined index notices
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validate and sanitize input
    $username = trim($username);
    $email = trim($email);
    $password = trim($password);

    // Using htmlspecialchars to prevent XSS attacks
    $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');

    // Hash the password 
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the insert statement
    if (empty($username) || empty($email) || empty($password)) {
        echo "All fields are required.";
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }
    if (strlen($password) < 8) {
        echo "Password must be at least 8 characters long.";
        exit;
    }
    // Check if the username or email already exists
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$username, $email]);
    if ($stmt->fetchColumn() > 0) {
        echo "Username or email already exists.";
        exit;
    }
    // Insert the new user into the database
    // Using prepared statements to prevent SQL injection
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->beginTransaction();
    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, $hashedPassword]);
        $pdo->commit();
    } catch (Exception $e) {
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
        exit;
    }
    // Close the database connection
    $pdo = null;
    // Redirect to a success page or display a success message
    echo "Registration successful!";
} else {
    echo "No data received.";
}

// TABLE: users
// CREATE TABLE users (
//     id INT AUTO_INCREMENT PRIMARY KEY
//     username VARCHAR(150) NOT NULL UNIQUE,
//     email VARCHAR(100) NOT NULL UNIQUE,
//     password VARCHAR(255) NOT NULL
// created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
// updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// );
