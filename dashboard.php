<?php
session_start();
require_once 'db/config.php';

// Redirect to login if not authenticated
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$db = "workouts";
$sql = "CREATE TABLE IF NOT EXISTS $db (entry_no INTEGER PRIMARY KEY AUTO_INCREMENT, user_id INTEGER,date TEXT,exercise_type TEXT ,sets INTEGER,reps INTEGER, weight DOUBLE, duration INTEGER, notes TEXT)";
// mysqli_query($conn, $sql);
$conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="assets/css/styles.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <h2>👋 Welcome, <?= htmlspecialchars($_SESSION['name']) ?>!</h2>

  <!-- Workout Progress Chart -->
  <canvas id="progressChart" height="200"></canvas>
  <script src="assets/js/chart.js"></script>

  <!-- Navigation Links -->
  <div class="nav-buttons">
    <p><a href="add_workout.php">Add Workout</a></p>
    <p><a href="view_workouts.php"> View Workouts</a></p>
    <p><a href="logout.php"> Logout</a></p>
  </div>
</body>
</html>
