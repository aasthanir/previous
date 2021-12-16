<?php
include ('connection.php');
if(isset($_GET['id'])){

    $deleteID=$_GET['id'];
    $sql="DELETE FROM products WHERE ProductId=$deleteID";
    $result=mysqli_query($conn,$sql);
    if (mysqli_affected_rows($conn) > 0) {

        //If yes , return to calling page(stored in the server variables)
        header("Location: {$_SERVER['HTTP_REFERER']}");

    } else {
        // print error message
        echo "Error in query: $sql. " . mysqli_error($conn);
        exit ;
    }
}	
else {
        header("Location:displayProducts.php");
    }

?>