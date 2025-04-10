<?php
session_start();
include 'db/config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
$sql = "SELECT * FROM workouts WHERE user_id = ? ORDER BY date DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head><title>Workout History</title><link rel="stylesheet" href="css/style.css"></head>
<body>
<h2>Your Workout History</h2>
<a href="dashboard.php">Back to Dashboard</a><br><br>
<?php
while ($row = $result->fetch_assoc()) {
    echo "<strong>Date:</strong> " . $row['date'] . "<br>";
    echo "Exercise: " . $row['exercise_type'] . ", Sets: " . $row['sets'] . ", Reps: " . $row['reps'] . "<br>";
    echo "Weight: " . $row['weight'] . " kg, Duration: " . $row['duration'] . " mins<br>";
    echo "Notes: " . $row['notes'] . "<hr>";
}
?>
</body></html>
