<?php

include ('connection.php');
if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];

    $query="INSERT INTO Customer (FirstName, LastName, Email, Password, Gender, Age) 
    VALUES ('$fname', '$lname', '$email', '$password', '$gender', '$age')";
    $result = mysqli_query($connection, $query);
    
    if($result){
        echo "Record successfully inserted.";
    }
    else{
        echo "ERROR: Could not able to execute $query.".mysqli_error($connection);
    }
}
?>
