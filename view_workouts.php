<?php
session_start();
require_once 'db/config.php';

// Redirect to login if not authenticated
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM workouts WHERE user_id = ? ORDER BY date DESC");
$stmt->execute([$user_id]);
$workouts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your Workouts</title>
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
  <h2>📋 Your Workouts</h2>

  <?php if (count($workouts) === 0): ?>
    <p>No workouts logged yet.</p>
  <?php else: ?>
    <ul>
      <?php foreach ($workouts as $w): ?>
        <li>
          <strong><?= htmlspecialchars($w['date']) ?></strong>: 
          <?= htmlspecialchars($w['exercise_type']) ?> —
          <?= $w['duration'] ?> min
          <?= $w['sets'] ? " | Sets: {$w['sets']}" : "" ?>
          <?= $w['reps'] ? " | Reps: {$w['reps']}" : "" ?>
          <?= $w['weight'] ? " | Weight: {$w['weight']}kg" : "" ?>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>

  <p><a href="dashboard.php">⬅ Back to Dashboard</a></p>
</body>
</html>
