<?php
include 'header.php';
?>
<div class="title-search-form">
    <form action="titlesearchform.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="search" placeholder="Enter title of a book" value="<?php if (isset($_POST['search'])) {
                                                                                        echo $_POST['search'];
                                                                                    } ?>">
        <br /><br />
        <label for="sort"> Sort by: </label>
        <input type="radio" value="Name" name="sort">Name
        <input type="radio" value="Price" name="sort">Price
        <br /><br />
        <button type="submit" name="submit-search">Submit</button>
    </form>
</div>
<div class="category-form-info">
    <p>To search by "Category" click <a href="categorysearchform.php"><b>here</b></a></p>
</div>
<div class="title-searched-books-container">
    <?php
    if (isset($_POST['submit-search'])) {
        $search = $_POST['search'];
        if (isset($_POST['sort'])) {
            $sort = $_POST['sort'];
        }
    }

    if (isset($_POST['submit-search'])) {
        if(!empty($search)) {
            $search = mysqli_real_escape_string($conn, $_POST['search']);
            if (isset($_POST['sort'])) {
                if ($sort == 'Name') {
                    $qry = "SELECT * FROM books WHERE Name LIKE '%$search%' ORDER BY Name ASC";
                    $sql = mysqli_query($conn, $qry);

                    include 'displayformat.php';
                } elseif ($sort == 'Price') {
                    $qry = "SELECT * FROM books WHERE Name LIKE '%$search%' ORDER BY Price ASC";
                    $sql = mysqli_query($conn, $qry);

                    include 'displayformat.php';
                }
            } else {
                echo "<h2>Select a Sorting type</h2>";
            }
        } 
        else{
            echo "<h2>Enter title of a book<h2>";
        }       
    }

    
    ?>
</div>