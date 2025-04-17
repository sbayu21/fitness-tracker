<?php
require 'db/config.php';
if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    echo json_encode(["error" => "Not authorized"]);
    exit();
}

$stmt = $conn->prepare("SELECT date, SUM(duration) as total_duration FROM workouts WHERE user_id = ? GROUP BY date");
$stmt->execute([$_SESSION['user_id']]);
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>