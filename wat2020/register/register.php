<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css" type="text/css">
    <title>Register</title>
</head>

<body>
    <h1>Registration Form</h1>
    <form method="POST" action="" enctype="multipart/form-data">
        <fieldset>
            <legend>Register</legend>
            <label for="uname">Username: </label>
            <input type="text" name="uname"><br /><br />
            <label for="email">Email: </label>
            <input type="email" name="email"><br /><br />
            <label for="pass">Password: </label>
            <input type="password" name="password"><br /><br />
            <label for="age">Age: </label>
            <input type="number" name="age" min=1 max=150><br /><br />
            <label for="gender">Gender: </label>
            <select id="gender" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            <br /><br />
            <input type="checkbox" name="termsandcondition">
            <label for="termscondition">Terms and Condition</label><br /><br />
            <input type="submit" value="submit" name="submit">
            <input type="reset" value="clear" name="clear">
        </fieldset>
    </form>
    <br />
    <?php
    include 'connection.php';
    if (isset($_POST['submit'])) {
        $uname = $_POST['uname'];
        $pass = htmlentities(trim($_POST['password']));
        $email = $_POST['email'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        if (isset($_POST['termsandcondition'])) {
            $checkbox = $_POST['termsandcondition'];
        }
    }

    if (isset($_POST['submit'])) {
        if(!empty($uname)) {
            if (!empty($email)) {
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $query = "SELECT email FROM register WHERE email = '$email'";
                    $stm = mysqli_query($connection, $query);
                    $count = mysqli_num_rows($stm);
                    if (!$count > 0) {
                        if (!empty($pass)) {
                            $pattern = '/^(?=.*\d)(?=.*[a-z])(?=.*\W)(?=.*[A-Z]).{8,}$/';
                            if (preg_match($pattern, $pass)) {
                                $pass = md5($pass);
                                if (!empty($age)) {
                                    if (!empty($gender)) {
                                        if (isset($checkbox)) {
                                            $qry = "INSERT INTO register (username, email, password, age, gender) 
                                            VALUES ('$uname', '$email', '$pass', '$age', '$gender') ";
                                            $sql = mysqli_query($connection, $qry);

                                            if ($sql) {
                                                echo "<h2>Registered successfully</h2>";
                                            } else {
                                                echo "<h3>ERROR: Could not able to execute $sql.</h3>" . mysqli_error($connection);
                                            }
                                        } else {
                                            echo "<h3>Select checkbox</h3>";
                                        }
                                    } else {
                                        echo "<h3>Select gender</h3>";
                                    }
                                } else {
                                    echo "<h3>Fill up the age</h3>";
                                }
                            } else {
                                echo "<h3>Password should be of at least 8 characters and include at least one capital letter, a number and a symbol</h3>";
                            }
                        } else {
                            echo "<h3>Password is empty</h3>";
                        }
                    } else {
                        echo "<h3>Email already exist</h3>";
                    }
                } else {
                    echo "<h3>Invalid Email</h3>";
                }
            } else {
                echo "<h3>Email is empty</h3>";
            }
        } else {
            echo "<h3>Username is empty</h3>";
        }
    }
    ?>
</body>

</html>