<?php
function categoryDropDown()
{
    echo "<select name='category'>";
    echo "<option value='category()'>--Select--</option>";
    $sql = "SELECT DISTINCT Category FROM books";
    include 'searchdatabase.php';
    $qry = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if ($qry) {
        while ($row = mysqli_fetch_array($qry)) {
            echo "<option value=".$row['Category'].">".$row['Category']."</option>";
        }
    }
    echo "</select>";
} 
?>

