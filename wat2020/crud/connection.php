<?php
    define("HOST", "localhost");
    define("USER", "root");
    define("PASSWORD", "");
    define("DB", "assignment");
    //mysqli_connect()
    $conn = mysqli_connect(HOST, USER, PASSWORD, DB);
    if(!$conn)
    {
        echo "database connection problem.";
    }  
?>