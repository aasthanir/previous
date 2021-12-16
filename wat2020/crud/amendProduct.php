<?php
    include ('connection.php');
    $productID=$_GET['id'];
    $sql="SELECT * FROM products WHERE ProductId=$productID";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amend Product</title>
</head>
<body>
<form method="POST" action="updateProduct.php">
        <fieldset>
            <legend>
                Enter Product Details 
            </legend>
        <input type="hidden" name="ProductId" value="<?php echo $row['ProductId'];?>" />
        <label for="">Product Name: </label> <br />
        <input type="text" name="ProductName" value="<?php echo $row['ProductName'];?>"/> <br/>
        <label for="">Price: </label> <br />
        <input type="text" name="ProductPrice" value="<?php echo $row['ProductPrice']; ?>"/> <br/>
        <label for="">Image Filename: </label> <br />
        <input type="text" name="ProductImageName" value="<?php echo $row['ProductImageName']; ?>"/> <br/> <br/>
        <input type="submit" name="submit" value="Submit">
        <input type="reset" name="clear" value="Clear">
        </fieldset> 
    </form>
</body>
</html>