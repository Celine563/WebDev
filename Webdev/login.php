<?php
session_start();
require_once('config.php');

$error = '';

if (isset($_POST['Submit'])) {
    // Basic login check against values from config.php
    if ($_POST['Username'] === $Username && $_POST['Password'] === $Password) {
        // Set session variables
        $_SESSION['Username'] = $Username;
        $_SESSION['Active'] = true;

        // Redirect to protected page
        header("Location: index.php");
        exit;
    } else {
        $error = "Incorrect Username or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/signin.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form action="login.php" method="post" class="form-signin">
            <input type="text" name="Username" placeholder="Username" required><br><br>
            <input type="password" name="Password" placeholder="Password" required><br><br>
            <button type="submit" name="Submit" value="Login">Login</button>
        </form>
    </div>
</body>
</html>
