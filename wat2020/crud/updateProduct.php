<?php
include ('connection.php');
if(isset($_POST['submit'])){
    $productID=$_POST['ProductId'];
    $productName=$_POST['ProductName'];
    $productPrice=$_POST['ProductPrice'];
    $productImageName=$_POST['ProductImageName'];

$sql="UPDATE products SET ProductName='$productName',
        ProductPrice='$productPrice', 
        ProductImageName='$productImageName'
        WHERE ProductId='$productID'";
$result=mysqli_query($conn,$sql);
if (mysqli_affected_rows($conn) > 0) 
{
    header('Location: crud.php' );

} else {
    echo "Record Not Found";
    exit;
}
}

?>