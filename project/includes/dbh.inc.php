<?php
$serverName = "localhost";
$dbUserName = "admin";
$dbPassword = "admin4321";
$dbName = "trailerStreaming";

$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}