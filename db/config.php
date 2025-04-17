<?php
$host = '127.0.0.1';         // or 'localhost'
$dbname = 'fitness_db';      // match the DB name in phpMyAdmin
$username = 'root';          // default XAMPP username
$password = '';              // default XAMPP password is blank

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}
?>

