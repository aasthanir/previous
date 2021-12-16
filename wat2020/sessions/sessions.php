<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessions</title>
</head>
<body>
<?php
    session_start();
    if(isset($_SESSION['user'])){
        echo "Welcome ".$_SESSION['user']."<br/>";
        echo "<a href = 'protected.php'>Protected</a><br/>";
        echo "<a href = 'logout.php'>Logout</a>";
    }
    else{
        if(isset($_SESSION['error'])){
            echo $_SESSION['error'];
        }
        include('loginform.php');
    }
?> 
</body>
</html>