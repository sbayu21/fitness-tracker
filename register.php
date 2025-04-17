<?php
require_once 'db/config.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "<pre>";

$name     = trim($_POST['name'] ?? '');
$email    = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if (empty($name) || empty($email) || empty($password)) {
    exit(" Missing fields.\n");
}

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

try {
    //  Check if table 'users' exists using MySQL
    $check = $conn->query("SHOW TABLES LIKE 'users'");
    if ($check->rowCount() == 0) {
        exit(" Table 'users' does not exist in the database.\n");
    }

    // Check for existing email
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->rowCount() > 0) {
        exit(" Email already registered. <a href='register.html'>Try another</a>\n");
    }

    //  Insert new user
    $stmt = $conn->prepare("INSERT INTO users (name, email, password_hash) VALUES (?, ?, ?)");
    $result = $stmt->execute([$name, $email, $passwordHash]);

    if ($result) {
        echo " User registered successfully. <a href='login.html'>Login now</a>\n";
    } else {
        echo "Insert failed.\n";
    }
} catch (PDOException $e) {
    echo " Database error: " . $e->getMessage();
}

echo "</pre>";
?>
