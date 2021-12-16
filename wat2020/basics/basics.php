<?php    
    //name
    echo "<h2> UJJWAL RANAMAGAR </h2>";
    //student id number
    echo "<h2> 77227241 </h2>";
    //Output to the Screen
    echo "<b> My first PHP.</b><br><br>";
    echo "<b> \"most programmers say it's better to use 'echo' rather than 'print'\" says who? </b><br/><br/>";
    //Variables and Arithmetic Operators
    $name = "Ujjwal Ranamagar";
    $age = 23;
    echo "<b>"."Hi my name is ".$name." and I am ".$age."years old."."</b>"."<br/>";
    echo "<b> Mi nombre es $name y tengo $age anos de edad. </b><br/>";


    echo "<h2>Functions</h2>";
    echo "<b>";
    //gettype()returns name
    echo gettype($name);
    echo '<br />';
    //strlen() returns string length
    echo strlen($name);
    echo '<br />';
    //strtoUpper()returns strings in all uppercase
    echo strtoUpper($name);
    echo "</b>";
    
    echo "<h2>Arithmetic</h2>";
    echo "<b>";
    $num1 = 9;
    $num2 = 12;
    $pecentage = $num1/$num2*100;
    $divide = $num2/$num1;
    $remainder = $num2%$num1;
    echo "num1 = $num1 <br/ >";
    echo "num2 = $num2 <br/ >";
    echo "num1 x num2 = ".$num1*$num2."<br/>";
    echo "num1 as a percentage of num2 = $pecentage% <br/>";
    echo "num2 divided by num1 = ".floor($divide)." remainder ".$remainder."<br/><br/>";
    echo "</b>";

    //displaying height in     
    $name1 = 'David';
    $age1 = 12;
    $metres = 1.8;
    $inches = number_format(($metres * 100)/2.54, 2);
    $foot = floor($inches/12);
    $remainder = $inches%12;     

    echo "<b>";
    echo "Name: $name1 <br>";    
	echo "Age: $age1 <br>";	
	echo "Height in Meters: $metres <br>";
	echo "Height in Feet and inches: $foot"."ft"." $remainder inches";
    echo "</b>";


?>