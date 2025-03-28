<?php
/**
* Configuration for database connection
*
*/
$host = "localhost";
$username = "root";
$password = "";
$dbname = "test"; // will use later
$dsn = "mysql:host=$host;dbname=$dbname"; // will use later
$options = array(
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);

require "config.php";
$connection = new PDO("mysql:host=$host", $username, $password, $options);

require "config.php";
$connection = new PDO("mysql:host=$host", $username, $password, $options);
$sql = file_get_contents("data/init.sql");
$connection->exec($sql);
Echo “DB setup”;