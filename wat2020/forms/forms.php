<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms</title>
    <style>
        form {
            width: 51%;
        }
    </style>
</head>

<body>
    <h1>Processing Input from HTML Forms</h1>
    <h2>Login Form using GET</h2>
    <form method="POST" action="forms.php" enctype="multipart/form-data">
        <fieldset>
            <legend>Login</legend>
            <label for="email">Email: </label>
            <input type="text" name="txtEmail" value="<?php
                if(isset($_POST['txtEmail'])){
                    echo $_POST['txtEmail'];
                }
            ?>" /><br /><br />
            <label for="passwd">Password: </label>
            <input type="password" name="txtPass" /><br /><br />
            <input type="submit" value="Submit" name="loginSubmit" />
            <input type="reset" value="Clear" />
        </fieldset>
    </form>
    <br />
    <?php
    if (isset($_POST['loginSubmit'])) {
        $email = $_POST['txtEmail'];
        $pass = $_POST['txtPass'];
        echo "<b> Email: $email Password: $pass </b><br/>";
    }
    ?>
    <br />
    <form method="POST" action="forms.php" enctype="multipart/form-data">
        <fieldset>
            <legend>Comments</legend>
            <label for="">Email: </label>
            <input type="text" name="cmtEmail" value="<?php
                if(isset($_POST['cmtEmail'])){
                    echo $_POST['cmtEmail'];
                }
            ?>" /><br /><br />
            <textarea rows="4" cols="50" name="description"></textarea><br />
            <label for="">Click to Confirm: </label>
            <input type="checkbox" name="chkConfirm" value="agree"><br /><br />
            <input type="submit" value="Submit" name="cmtSubmit" />
            <input type="reset" value="Clear" />
        </fieldset>
    </form>
    <br />
    <?php
    if (isset($_POST['cmtSubmit'])) {
        $cmtmail = $_POST['cmtEmail'];
        $comment = $_POST['description'];
    }

    if (isset($_POST['cmtSubmit'])) {
        if (!empty($cmtmail)) {
            $cmtmail = filter_var($cmtmail, FILTER_SANITIZE_EMAIL);
            if (filter_var($cmtmail, FILTER_VALIDATE_EMAIL)) {
                if (isset($_POST['cmtSubmit'])) {
                    if (isset($_POST['chkConfirm'])) {
                        $confirm = "Agreed<br/>";
                    } else {
                        $confirm = "Not Agreed<br/>";
                    }
                    echo "Email: " . $cmtmail . "<br/>";
                    echo "Comments: " . $comment . "<br/>";
                    echo "Confirm: " . $confirm . "<br/>";
                }
            } else {
                echo "Invalid email format";
            }
        } else {
            echo "email must not be empty";
        }
    }
    ?>
    <br />
    <form method="POST" action="">
        <fieldset>
            <legend>Without TAX Calculator</legend>
            <label for="">After Tax Price: </label>
            <input type="text" name="price" value="<?php
                if(isset($_POST['price'])){
                    echo $_POST['price'];
                }
            ?>" />
            <label for="">Tax Rate: </label>
            <input type="text" name="rate" value="<?php
                if(isset($_POST['rate'])){
                    echo $_POST['rate'];
                }
            ?>" />
            <input type="submit" name="taxSubmit">
            <input type="reset" name="taxClear">
        </fieldset>
    </form>
    <?php
    if (isset($_POST['taxSubmit'])) {
        $tax = $_POST['price'];
        $rate = $_POST['rate'];
    }

    if (isset($_POST['taxSubmit'])) {
        if (!empty($tax) || !empty($rate)) {
            $pattern = '/^\d+(:?[.]\d{2})$/';
            if (preg_match($pattern, $tax)) {
                $pattern = '/^\d+(:?[0-9])$/';
                if (preg_match($pattern, $rate)) {
                    $total = number_format((100 * $tax) / (100  + $rate), 2);
                    echo "<h3>Price before tax: £$total<h3>";
                } else {
                    echo "Please enter a whole number for tax rate";
                }
            } else {
                echo "Please enter the price in the format 9.99";
            }
        } else {
            echo "Both fields need to be filled.";
        }
    }
    ?>
    <h1>Passing Data Appended to an URL</h1>
    <h2>Pick a category</h2>
    <a href="forms.php?cat=Films">Films</a>
    <a href=" forms.php?cat=Books">Books</a>
    <a href=" forms.php?cat=Music">Music</a><br />


    <?php
    if (isset($_GET['cat'])) {
        $cat = $_GET['cat'];
        echo "<b>The category chosen is $cat.</b>";
    }
    ?>

</body>

</html>