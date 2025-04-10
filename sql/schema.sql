CREATE DATABASE IF NOT EXISTS fitness_tracker;
USE fitness_tracker;

CREATE TABLE users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  password_hash VARCHAR(255)
);

CREATE TABLE workouts (
  workout_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  date DATE,
  exercise_type VARCHAR(100),
  sets INT,
  reps INT,
  weight FLOAT,
  duration INT,
  notes TEXT,
  FOREIGN KEY (user_id) REFERENCES users(user_id)
);