<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms Extension</title>
    <style>
        form {
            width: 40%;
        }
    </style>
</head>

<body>
    <h3>Order Form</h3>
    <p>Please fill out this form to place your order. </p>
    <form method="POST" action="extension.php">
        <fieldset>
            <legend>Enter your login details</legend>
            <label for="">User Name: </label>
            <input type="text" name="username" value="<?php
                if(isset($_POST['username'])){
                    echo $_POST['username'];
                }
            ?>">
            <label for="">Email: </label>
            <input type="email" name="email" value="<?php
                if(isset($_POST['email'])){
                    echo $_POST['email'];
                }
            ?>">
        </fieldset>
        <br />
        <fieldset>
            <legend>Pizza Selection</legend>
            <label for="size">Size: </label>
            <input type="radio" id="small" name="size" value="Small">
            <label for="small">small</label>
            <input type="radio" id="medium" name="size" value="Medium">
            <label for="medium">medium</label>
            <input type="radio" id="large" name="size" value="Large">
            <label for="large">large</label>
            <br /><br />
            <label for="toppings">Toppings:</label>
            <select id="toppings" name="toppings">
                <option value="">Please select</option>
                <option value="Seafood">Seafood</option>
                <option value="Salami">Salami</option>
                <option value="Onion">Onion</option>
            </select>
            <br /><br />
            <label for="extras[]">Extras: </label>
            <input type="checkbox" name="extras[]" id="parmesan" value="Parmesan">
            <label for="parmesan"> Parmesan </label>
            <input type="checkbox" name="extras[]" id="olives" value="Olives">
            <label for="olives"> Olives </label>
            <input type="checkbox" name="extras[]" id="capers" value="Capers">
            <label for="capers"> Capers </label>
        </fieldset>
        <br />
        <input type="submit" name="submit" value="Submit">
        <input type="reset" name="clear" value="Clear">
    </form>
    <br />
    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['username'];
        $email = $_POST['email'];
        if (isset($_POST['size'])) {
            $size = $_POST['size'];
        }
        $toppings = $_POST['toppings'];
        if (isset($_POST['extras'])) {
            $extras = $_POST['extras'];
        }
    }

    if (isset($_POST['submit'])) {
        if (!empty($name)) {
            if (!empty($email)) {
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    if (isset($size)) {
                        if (($toppings !== '')) {
                            if (isset($extras)) {
                                echo "<h2>Thank you for your order:</h2>";
                                echo "Customer ID: <b>$name</b> <br>";
                                echo "Email: <b>$email</b> <br>";
                                echo "Your Order : <b>$size $toppings</b> <br>";
                                echo "Extra Toppings:  ";
                                foreach ($extras as $selected) {
                                    echo "<b>$selected </b>";
                                }
                            } else {
                                echo "Select extra toppings.";
                            }
                        } else {
                            echo "Select toppings.";
                        }
                    } else {
                        echo "Select size.";
                    }
                } else {
                    echo "Email format not matched.";
                }
            } else {
                echo "Enter email id";
            }
        } else {
            echo "Enter username";
        }
    }
    ?>
</body>

</html>