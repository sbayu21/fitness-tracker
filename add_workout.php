<?php
session_start();
include 'db/config.php';
if (!isset($_SESSION['user_id'])) {
  header("Location: login.html");
  exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $conn->prepare("INSERT INTO workouts (user_id, date, exercise_type, sets, reps, weight, duration, notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("issiiids", $_SESSION['user_id'], $_POST['date'], $_POST['exercise_type'], $_POST['sets'], $_POST['reps'], $_POST['weight'], $_POST['duration'], $_POST['notes']);
  $stmt->execute();
  echo "Workout added! <a href='dashboard.php'>Back to Dashboard</a>";
  exit;
}
?>
<form method="POST">
  <input type="date" name="date" required><br>
  <input type="text" name="exercise_type" placeholder="Exercise Type" required><br>
  <input type="number" name="sets" placeholder="Sets"><br>
  <input type="number" name="reps" placeholder="Reps"><br>
  <input type="number" name="weight" placeholder="Weight (kg)"><br>
  <input type="number" name="duration" placeholder="Duration (min)"><br>
  <textarea name="notes" placeholder="Notes"></textarea><br>
  <button type="submit">Save Workout</button>
</form>