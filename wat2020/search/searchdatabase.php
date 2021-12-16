<?php 
    $hostname = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $databaseName = "assignment"; 
    $conn = mysqli_connect($hostname, $username, $password, $databaseName) 
    or exit("Unable to connect to database!");
?>