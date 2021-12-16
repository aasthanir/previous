<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
</head>
<body>
<?php
//Make connection to database
include('connection.php');

//Gather from $_POST[]all the data submitted and store in variables
if(isset($_POST['submit'])){
    $productname = $_POST['ProductName'];
    $productprice = $_POST['ProductPrice'];
    $productimgname = $_POST['ProductImageName'];    

//Construct INSERT query using variables holding data gathered
$sql = "INSERT INTO products (ProductName, ProductPrice, ProductImageName)
    VALUES ('$productname','$productprice','$productimgname')";

//run $query
$result =  mysqli_query($conn, $sql);
if($result)
    {        
        //return to calling page(stored in the server variables)
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }
    else{
        echo "Something wrong while inserting data";
    }
}	
		
?>   
</body>
</html>