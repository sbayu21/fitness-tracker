<?php
session_start();
include 'db/config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['user_id'] = $user['user_id'];
        header("Location: dashboard.php");
        exit;
    } else {
        echo "<p style='color:red;'>❌ Login failed. <a href='login.html'>Try again</a></p>";
    }
    $stmt->close();
}
?>