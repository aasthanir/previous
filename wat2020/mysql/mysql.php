<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mysql</title>
    <style>
        form{
            width: 40%;
        }
    </style>    
</head>
<body>
<form method="POST" action="insertRecord.php">
    <fieldset>
        <legend>Enter Customer Details</legend>
        <label for="fname">First Name: </label>
        <input type="text" name="fname"><br/><br/>
        <label for="lname">Last Name: </label>
        <input type="text" name="lname"><br/><br/>
        <label for="email">Email: </label>
        <input type="text" name="email"><br/><br/>
        <label for="password">Password: </label>
        <input type="password" name="password"><br/><br/>
        <label for="gender">Gender: </label>
        <select id="gender" name="gender">
            <option value="M">Male</option>
            <option value="F">Female</option>
        </select><br/><br/>
        <label for="age">Age: </label>
        <input type="text" name="age"><br/><br/>
        <input type="submit" name="submit" value="submit">
        <input type="reset" name="clear" value="clear">  
    </fieldset>
</form>    
</body>
</html>