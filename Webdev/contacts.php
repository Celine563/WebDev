<div class="mainarea">
    <h1>Status: You are logged in <?php echo $_SESSION['Username']; ?></h1>
    <p class="lead">This is where we will put the logout button</p>
    <form action="logout.php" method="post" name="Logout_Form" class="form-signin">
        <button name="Submit" value="Logout" class="button" type="submit">Log out</button>
    </form>
</div>
