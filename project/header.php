<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/styles.css">
  <title>TrailerStreaming</title>
</head>

<?php
if (!isset($_SESSION['useruid'])) {
  echo '<body class="bodyBeforeLogin">';
}elseif(isset($_SESSION['useruid'])){
  echo '<body class="bodyAfterLogin">';
}
?>
  <!-- Navbar -->

  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #000;">
    <a class="navbar-brand" href="index.php">
      <img src="img/teaseme2.png" width="183" height="75" class="d-inline-block align-top" alt="" loading="lazy">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
       
        <!--if user is login or not to website it shows different nav tag -->
        <?php
        if (isset($_SESSION['useruid'])) {
          echo "<li class='nav-item nav-link'>Welcome  $_SESSION[useruid]</li>";
          echo '<li class="nav-item"> <a class="nav-link" href="includes/logout.inc.php">Log out</a> </li>';
        } else {
          echo '<li class="nav-item"> <a class="nav-link" href="signup.php">Sign up</a> </li>';
          echo '<li class="nav-item"> <a class="nav-link" href="login.php">Log in</a> </li>';
        }
        ?>

      </ul>
    </div>
  </nav>