<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Products</title>
</head>
<body>
<?php

    $sql="SELECT * FROM products";
    include('connection.php');
    $result=mysqli_query($conn, $sql);

    $count = mysqli_num_rows($result);
    if($count>=1){
        echo "<table border=1>";
        echo "<tr>";
        echo "<th>Product Name</th>";
        echo "<th>Price</th>";
        echo "<th>Image</th>";
        echo "<th>Amend</th>";
        echo "<th>Delete</th>";       
        echo "</tr>";

        while($row=mysqli_fetch_array($result))
        {
            
            echo "<tr>";            
            echo "<td>".$row['ProductName']."</td>";
            echo "<td>".$row['ProductPrice']."</td>";
            echo '<td><img src="./images/' . $row['ProductImageName'] . '"/></td>';
            echo "<td><a href = amendProduct.php?id=".$row['ProductId'].">Amend </a></td>";
            echo "<td><a href = deleteProduct.php?id=".$row['ProductId'].">Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<style> img{width:100px; height=100px;} </style>";
    }
    echo "<br>";

?>
    
</body>
</html>