<?php
include 'header.php';
?>
<div class="category-search-form">
    <form method="POST" action="categorysearchform.php" enctype="multipart/form-data">
        <label for="category">Category: </label>
        <?php include 'dropdown.php';
        categoryDropDown();
        ?>
        <br><br>
        <label for="sort"> Sort by: </label>
        <input type="radio" value="Name" name="sort">Name
        <input type="radio" value="Price" name="sort">Price
        <br><br>
        <input type="submit" value="submit" name="submit-cat">
    </form>
</div>
<div class="search-form-info">
    <p>To search by "Title" click <a href="sortSearch.php"><b>here</b></a></p>
</div>
<div class="category-searched-books-container">
<?php
if (isset($_POST['submit-cat'])) {
    $category = $_POST['category'];
    if (isset($_POST['sort'])) {
        $sort = $_POST['sort'];
    }
}

if (isset($_POST['submit-cat'])) {
    if (isset($_POST['sort'])) {
        if ($sort == 'Name') {
            $qry = "SELECT * FROM books WHERE Category = '$category' ORDER BY Name ASC";
            $sql = mysqli_query($conn, $qry);

            include 'displayformat.php';
        } elseif ($sort == 'Price') {
            $qry = "SELECT * FROM books WHERE Category = '$category' ORDER BY Price ASC";
            $sql = mysqli_query($conn, $qry);

            include 'displayformat.php';
        }
    } else {
        echo "Select a sorting type.";
    }
}
?>
</div>

