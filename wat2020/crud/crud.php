<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>   
    <style>
    </style> 
</head>
<body>
<h2>Manage Products</h2>
<?php include('displayProducts.php') ?>
<form method="POST" action="insertProduct.php" enctype="multipart/form-data">
<fieldset>
<legend>Enter New Product Details</legend>
<label for="">Product Name:</label><br>
<input type="text" name="ProductName" ><br><br>
<label for="">Price:</label><br>
<input type="text" name="ProductPrice" ><br><br>
<label for="">Image Filename:</label><br>
<input type="text" name="ProductImageName" ><br><br>
<input type="submit" name="submit" value="submit"/>
<input type="reset" name="clear" value="clear"/>
</fieldset>
</form>    
</body>
</html>