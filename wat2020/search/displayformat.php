<div class="display-content">
    <?php
    echo "<h3>Search Result</h3>";
    $count = mysqli_num_rows($sql);
    if ($count > 0) {
        echo "<table border=1 align='center'>";
        echo "<tr>";
        echo "<th>Book ID</th>";
        echo "<th>Name</th>";
        echo "<th>Price</th>";
        echo "<th>Category</th>";
        echo "<th>Image</th>";
        echo "</tr>";

        while ($row = mysqli_fetch_array($sql)) {

            echo "<tr>";
            echo "<td>" . $row['book_id'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" ."£". $row['Price'] . "</td>";
            echo "<td>" . $row['Category'] . "</td>";
            echo '<td><img src="./images/' . $row['Image'] . '" /></td>';
            echo "</tr>";
        }
        echo "</table>";
        echo "<style>
        img {
            width: 100px;
            height=100px;
        }
    </style>";
    }
    else{
        echo "<h2>There are no results matching your search !</h2>";
    }
    ?>
</div>