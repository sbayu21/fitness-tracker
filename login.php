<?php
session_start();
require_once 'db/config.php';

// Toggle this ON to see debug messages (e.g. for troubleshooting)
$debug = true;

// Sanitize input
$email    = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = $_POST['password'] ?? '';

if (empty($email) || empty($password)) {
    die(" Email or password cannot be empty. <a href='login.html'>Try again</a>");
}

try {
    // Query user by email
    $stmt = $conn->prepare("SELECT user_id, name, email, password_hash FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if ($debug) {
            echo "<pre>";
            echo " User found: " . htmlspecialchars($user['email']) . "\n";
            echo "DB Hash: " . $user['password_hash'] . "\n";
            echo " Entered PW: " . $password . "\n";
            echo "Match: " . (password_verify($password, $user['password_hash']) ? "✅ YES" : "❌ NO") . "\n";
            echo "</pre>";
        }

        // Verify password
        if (password_verify($password, $user['password_hash'])) {
            // Store session data
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['name']    = $user['name'];

            // Redirect to dashboard
            header("Location: dashboard.php");
            exit;
        } else {
            die(" Incorrect password. <a href='login.html'>Try again</a>");
        }
    } else {
        die(" No user found with that email. <a href='login.html'>Try again</a>");
    }
} catch (PDOException $e) {
    die(" Database error: " . htmlspecialchars($e->getMessage()));
}
?>
