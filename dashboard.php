<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>Dashboard</title><link rel="stylesheet" href="css/style.css"></head>
<body>
<h2>Dashboard</h2>
<p>Welcome! You are logged in.</p>
<a href="add_workout.php">Add Workout</a> |
<a href="view_workouts.php">View Workouts</a> |
<a href="logout.php">Logout</a>
</body>
</html>