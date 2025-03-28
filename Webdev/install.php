<?php
require "config.php";

try {
    $connection = new PDO($dsn, $username, $password, $options);
    $sql = file_get_contents("data/init.sql");
    $connection->exec($sql);
    echo "Database and table `users` created successfully.";
} catch (PDOException $error) {
    echo "Error: " . $error->getMessage();
}

if (isset($_POST['submit'])) {
    require "config.php";

    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $new_user = [
            "firstname" => $_POST['firstname'],
            "lastname" => $_POST['lastname'],
            "email" => $_POST['email'],
            "age" => $_POST['age'],
            "location" => $_POST['location']
        ];

        $sql = sprintf(
            "INSERT INTO users (%s) VALUES (%s)", 
            implode(", ", array_keys($new_user)), 
            ":" . implode(", :", array_keys($new_user))
        );

        $statement = $connection->prepare($sql);
        $statement->execute($new_user);
        
        echo "New user successfully added.";

    } catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
}
?>
