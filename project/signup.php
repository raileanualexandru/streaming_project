<?php
include_once 'header.php';
?>

<!--signup form -->
<div class="signform">
    <form action="includes/signup.inc.php" method="POST">
        <input type="text" name="name" placeholder="full name...">
        <input type="text" name="email" placeholder="email...">
        <input type="text" name="uid" placeholder="username...">
        <input type="password" name="pwd" placeholder="password">
        <input type="password" name="pwdrepeat" placeholder="repeat password...">
        <button type="submit" name="submit">Sign Up</button>
    </form>


    <!-- Error messages when signup is successful or not -->
    <?php
   
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<h2>Fill in all fileds!</h2>";
        } elseif ($_GET["error"] == "invaliduid") {
            echo "<h2>Choose a proper username!</h2>";
        } elseif ($_GET["error"] == "invalidemail") {
            echo "<h2>Choose a proper email!</h2>";
        } elseif ($_GET["error"] == "passwordsdontmatch") {
            echo "<h2>Passwords doesn't match!</h2>";
        } elseif ($_GET["error"] == "usernametaken") {
            echo "<h2>Username or Email already taken</h2>";
        } elseif ($_GET["error"] == "stmtfailed") {
            echo "<h2>Something went wrong, try again!</h2>";
        } elseif ($_GET["error"] == "none") {
            echo "<h2>You have signed up!</h2>";
        }
    }
    ?>
</div>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>