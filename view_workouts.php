<?php
session_start();
include 'db/config.php';
if (!isset($_SESSION['user_id'])) {
  header("Location: login.html");
  exit;
}
$stmt = $conn->prepare("SELECT * FROM workouts WHERE user_id = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
echo "<h2>Your Workouts</h2>";
while ($row = $result->fetch_assoc()) {
  echo "<p><strong>{$row['date']}</strong> - {$row['exercise_type']} ({$row['sets']} x {$row['reps']})</p>";
}
echo "<a href='dashboard.php'>Back</a>";
?>