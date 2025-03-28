<?php $connection = new PDO(); ?>
$connection = new PDO("mysql:host=localhost", "root", "root",
array(
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
)

$connection = new PDO("mysql:host=$host", $username, $password, $options);

<?php
/**
* Open a connection via PDO to create a new database and table with
structure. */
require "config.php";
try {
$connection = new PDO("mysql:host=$host", $username, $password,
$options);
$sql = file_get_contents("data/init.sql");
$connection->exec($sql);
echo "Database and table users created successfully.";
} catch(PDOException $error) {
echo $sql . "<br>" . $error->getMessage();
}

if (isset($_POST['submit'])) {
    require "../config.php";
    try {
    $connection = new PDO($dsn, $username, $password, $options);
    // insert new user code will go here
    } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
    }
    
    $new_user = array(
        "firstname" => $_POST['firstname'],
        "lastname" => $_POST['lastname'],
        "email" => $_POST['email'],
        "age" => $_POST['age'],
        "location" => $_POST['location']
        );

        $sql = sprintf( "INSERT INTO %s (%s) values (%s)", "users", implode(", ",
array_keys($new_user)), ":" . implode(", :", array_keys($new_user)) );

$sql = sprintf( "INSERT INTO %s (%s) values (%s)", "users", implode(", ",
array_keys($new_user)), ":" . implode(", :", array_keys($new_user)) );
$statement = $connection->prepare($sql);
$statement->execute($new_user);