<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$dsn = "mysql:host=$host;dbname=$dbname";
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);

try {
    // Create a new PDO instance and connect to the database
    $connection = new PDO($dsn, $username, $password, $options);
    
    // Execute the SQL file for DB setup
    $sql = file_get_contents("data/init.sql");
    $connection->exec($sql);

    // Output success message
    echo "DB setup";
} catch (PDOException $error) {
    echo "Error: " . $error->getMessage();
}
?>
