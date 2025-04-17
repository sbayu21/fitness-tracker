<?php
session_start();
require_once 'db/config.php';

// Redirect to login if session is not active
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id  = $_SESSION['user_id'];
    $date     = $_POST['date'];
    $type     = $_POST['type'];
    $sets     = $_POST['sets'];
    $reps     = $_POST['reps'];
    $weight   = $_POST['weight'];
    $duration = $_POST['duration'];
    $notes    = $_POST['notes'];

    try {
        $stmt = $conn->prepare("
            INSERT INTO workouts (
                user_id, date, exercise_type, sets, reps, weight, duration, notes
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $user_id, $date, $type, $sets, $reps, $weight, $duration, $notes
        ]);
        echo "<p> Workout added successfully! <a href='dashboard.php'>Back to Dashboard</a></p>";
        exit();
    } catch (PDOException $e) {
        echo "Error saving workout: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Workout</title>
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
  <h2>Add Workout</h2>
  <form method="POST">
    <input type="date" name="date" required><br>
    <input type="text" name="type" placeholder="Exercise Type" required><br>
    <input type="number" name="sets" placeholder="Sets"><br>
    <input type="number" name="reps" placeholder="Reps"><br>
    <input type="number" step="0.1" name="weight" placeholder="Weight (kg)"><br>
    <input type="number" name="duration" placeholder="Duration (minutes)"><br>
    <textarea name="notes" placeholder="Notes..."></textarea><br>
    <button type="submit"> Save Workout</button>
  </form>
  <p><a href="dashboard.php">⬅ Back to Dashboard</a></p>
</body>
</html>
