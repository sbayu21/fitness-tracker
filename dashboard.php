<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}
?>
<h2>Welcome to Your Dashboard</h2>
<a href="add_workout.php">Add Workout</a><br>
<a href="view_workouts.php">View Workouts</a><br>
<a href="logout.php">Logout</a><br>
<canvas id="progressChart" width="400" height="200"></canvas>
<script src="assets/js/charts.js"></script>