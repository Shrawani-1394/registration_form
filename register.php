<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connect to MySQL
$servername = "localhost";
$username = "root";
$password = "";
$database = "registration_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

  if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";  
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
} else {
  echo "Form not submitted.";
}
?>
