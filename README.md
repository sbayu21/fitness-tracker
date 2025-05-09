# Fitness Tracker App
A simple web-based fitness tracker allowing users to register, log in, and record their workouts (date, exercise type, sets, reps, weight, duration, notes). Data is stored in a MySQL database managed via XAMPP.
## Features
- User Authentication
  - Register a new account (name, email, password)  
  - Secure password hashing (bcrypt)  
  - Login/logout with PHP sessions  
- Workout Logging 
  - Add workouts: date, exercise type, sets, reps, weight, duration, notes  
  - View workout history by date  
- Dashboard API
  - JSON endpoint to fetch aggregated workout durations per date  
## Technologies
- Server: Apache (XAMPP)  
- Language: PHP 8.x (with PDO)  
- Database: MySQL (via phpMyAdmin)  
- Frontend: HTML5, CSS3  
- Styling: Simple dark theme with gradient buttons  

## Prerequisites

- Windows with XAMPP installed  
- PHP 8.x, Apache, MySQL running in XAMPP  
- Composer (optional, if you extend with libraries)

## Installation & Setup

1. Extract Project 
   Place the project folder inside your XAMPP `htdocs` directory:  
