<?php
include 'init.php';
if(isset($_POST['subLogin'])){
    $username = $_POST['txtUser'];
    $password = $_POST['txtPass'];    
}
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($connection, $query);

if ($row = mysqli_fetch_assoc($result)) {
	$_SESSION['user']=$username;
    header("Location: sessions.php");
    
} else {
    $_SESSION['error']= "User not recognised";   
    header("Location: sessions.php");
    
} 

?>
