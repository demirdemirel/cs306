<?php

include "config.php";

if (isset($_POST['Name'])){

$rname = $_POST['Name'];
$loc = $_POST['Location'];
$cus = $_POST['Cuisine'];
$opent = $_POST['Open_Time'];
$closet = $_POST['Close_Time'];

echo $rname . " " . $loc . " " . $cus . " " . $opent . " ". $closet . "<br>";

$sql_statement = "INSERT INTO restaurant(Name,Location,Cuisine,Open_Time,Close_Time)
					VALUES ('$rname','$loc','$cus','$opent','$closet')";

$result = mysqli_query($db, $sql_statement);

header ("Location: add_restaurant.php");

}

else
{

	echo "The form is not set.";

}


?>
