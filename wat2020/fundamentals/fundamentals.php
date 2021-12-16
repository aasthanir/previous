<!DOCTYPE html>
<html lang="en">
<head>
<title>Web Applications and Technologies</title>
<link type="text/css" rel="stylesheet" href="main.css" />
</head>
<body>
    <header>
        <h1>Ujjwal Ranamagar 77227241</h1> 
    </header>
    <section id="container">
        <h1>Fundamentals of PHP</h1>
        <?php
            //Selection, comparison operators and logical operators
            echo "<h2>Selection</h2>";

            $day = date('l'); //that is a lower case L
            echo 'it\'s '.$day.'<br>';  

            if($day='wednesday'){
                echo 'it\'s midweek.<br>';
            }
            else{
                echo 'it\'s not midweek.<br>';
            }

            $time = date('G');
            echo "it's $time o'clock.<br>";
            if($time < 12){
                echo "Good Morning.";            
            }
            elseif($time > 11 && $time < 18){            
                echo "Good Afternoon.";            
            }
            elseif($time > 17){            
                echo "Good Night.";            
            }

            echo "<br><br>";

            $pass = 'password';
            if(strlen($pass)>4 && strlen($pass)<10){
                echo "'Password length is valid’"; 
            }
            else{
                echo "‘Password length is invalid’";
            }

            echo "<br><br>";

            if($pass=='password' || $pass=='username'){
                echo "'Password Valid.'";
            }
            else{
                echo "'Password Invalid.'";
            }

            echo "<br><br>";

            $initialprice = 25;
            $age = 15; 
            $membership = True;
            if($membership == TRUE){              
                if($age<12){
                    $finalprice = $initialprice - (0.60 * $initialprice);
                }
                elseif($age>11 && $age<18 || $age>65){
                    $finalprice = $initialprice - (0.35 * $initialprice);
                }            
                else{
                    $finalprice = $initialprice - (0.10 * $initialprice);
                }
                echo "Initial Ticket Price: $initialprice <br>";
                echo "Age: $age<br>";
                echo "Member: Yes <br>";
                echo "Final Ticket Price: $finalprice";
            }
            else{
                echo "Invalid Member.";
            }

            echo "<br><br>";

            echo "<h2>Arrays</h2>";
            echo "<h3>Simple Arrays</h3>";

            $products = array('t-shirt', 'cap', 'mug');
            print_r($products);
            echo "<br>";            
            $products[1] = 'shirt';
            print_r($products);

            echo "<br>";

            array_push($products, 'skirt');
            print_r($products);

            echo "<br>";

            echo "The item at index [2] is: ".$products[2]."<br>";
            echo "The item at index [3] is: ".$products[3]."<br>";

            echo "<h3>Associative Arrays</h3>";
            
            $customer = array('CustID'=>12, 'CustName'=>'Sarah', 'CustAge'=>23, 'CustGender'=>'F');
            print_r($customer);
            echo "<br>";
            $customer['CustAge'] = 32;
            $customer = array_merge($customer, array('CustEmail'=>'sarah@gmail.com'));
            print_r($customer);
            echo "<br>";
            echo "Items in my customer array <br>";
            echo "The item at index [CustName] is: ".$customer['CustName']."<br>";
            echo "The item at index [CustEmail] is: ".$customer['CustEmail']."<br>";

            echo "<h3>Multi-Dimensional Associative Arrays</h3>";

            $stock = array(
                array('description'=>'t-shirt', 'price'=>'9.99', 'stock'=>'100', 'colour'=>array('blue', 'green', 'red')),
                array('description'=>'cap', 'price'=>'4.99', 'stock'=>'50', 'colour'=>array('blue', 'black', 'grey')),
                array('description'=>'mug', 'price'=>'6.99', 'stock'=>'30', 'colour'=>array('yellow', 'green', 'pink')),
            );

            $orders = array(
                array('item'=>$stock[0], 'colour'=>1),
                array('item'=>$stock[1], 'colour'=>2)                
            );

            echo "This is my order: <br>";
            foreach($orders as $order)
            {
                echo $order['item']['colour'][$order['colour']]." ".$order['item']['description']."<br>";
                echo "Price: £".$order['item']['price']."<br>";                
            }

            echo "<h3>While Loop</h3>";
            $counter = 1;

            while($counter<6)
            {
                echo "Count: ".$counter."<br>";
                $counter++;
            }
            echo "<br>";

            $shirtPrice = 9.99;
            $counter = 1;
            while($counter<=10)
            {   
                $total = $counter*$shirtPrice;
                echo $counter." - £".$total."<br>";
                $counter++;
            }
            echo "<br>";
            
            $shirtPrice = 9.99;
            $counter = 1;
            echo "<table border = 1>";
            echo "<tr>";
            echo "<th>Quantity</th>";
            echo "<th>Price</th>";
            echo "</tr>";            
            while($counter<=10)
            {   
                $total = number_format(($counter*$shirtPrice),2);
                echo "<tr>";
                echo "<td>$counter</td>";
                echo "<td>£$total</td>";
                echo "</tr>";
                $counter++;                     
                
            }
            echo "</table>";
            echo "<br>";

            echo "<h3>For Loops</h3>";

            $names = array('John','Thomas','Henry','Harry','David'); 
            for($i=0;$i<5;$i++)
            {
                echo $names[$i] .'<br />';
            }   
            echo "<br>"; 

            echo "<h3>Foreach Loops</h3>";  
            
            $names = array('John'=>'c7227241','Thomas'=>'c7227242','Henry'=>'c7227243','Harry'=>'c7227244','David'=>'c7227245');
            
            foreach($names as $k => $v)
            {
                echo "Name: ".$k." "."Id: ".$v."<br>";
            }
            echo "<br>";
            
            $city = array('Peter'=>'LEEDS','Kat'=>'bradford','Laura'=>'wakeFIeld');
            print_r($city);
            echo "<br>";
            foreach($city as $k => $v)
            {   
                $city[$k] = ucfirst ( strtolower ($v));
            }  
            print_r($city);  
            echo "<br>";

            echo "<h3>Some Useful Functions</h3>";
            echo "<b>";
            $password = 'password';            
            echo "Password is: $password<br>";
            $password = htmlentities(trim($password));           

            if(isset($password) && !empty($password))
            {
                if(strlen($password)>5 && strlen($password)<9){
                   if(is_numeric($password)){
                       echo "Password cannot be a number";
                   }
                   else{
                       echo "Password OK <br>"; 
                       $encrypt = md5($password);
                       echo "encrypted password: ".$encrypt."<br>";                   
                   }
                }
                else{
                    echo "Your password must be between 6 and 8 characters in length.";
                }                                
            }
            else{
                echo "Please enter a password";
            }
            echo "</b>";          
        ?>
    </section>
    <footer>   
    <small> <a href="../watIndex.html">Home</a></small>
    </footer>
</body>
</html>
