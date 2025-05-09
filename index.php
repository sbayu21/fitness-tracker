<!DOCTYPE html>
<html>
<head>
  <?php
  $servername = "localhost";
  $usrname = "root";
  $pwd = "";
  $db = "fitness_db";

  //
  $conn = mysqli_connect($servername, $usrname, $pwd, $db);

  $sql = "CREATE DATABASE IF NOT EXISTS $db";
  mysqli_query($conn, $sql);

  $db = "users";
  $sql = "CREATE TABLE IF NOT EXISTS users (user_id INTEGER PRIMARY KEY AUTO_INCREMENT,name TEXT,email TEXT UNIQUE NOT NULL,password_hash TEXT NOT NULL)";
  mysqli_query($conn, $sql);


  ?>
  <title>Fitness Tracker</title>
  <link rel="stylesheet" href="assets/css/styles.css">

</head>
<body>
  <h1>Welcome to Fitness Tracker</h1>
  <a href="register.html">Register</a> | <a href="login.html">Login</a>
</body>
</html>