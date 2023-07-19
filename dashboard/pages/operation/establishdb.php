<?php

function establishDatabaseConnection() {
  // Implement your logic to establish a database connection
  $dbHost = "localhost";
  $dbName = "phyadmin";
  $dbUser = "root";
  $dbPass = "";
  
  try {
    $dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbConnection;
  } catch (PDOException $e) {
    // Handle the exception or display an error message
    echo "Database connection error: " . $e->getMessage();
    die();
  }
}

function closeDatabaseConnection($dbConnection) {
  // Implement your logic to close the database connection
  $dbConnection = null;
}

?>


