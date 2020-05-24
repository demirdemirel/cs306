<?php

include "config.php";

if (isset($_POST['name'])){

$name = $_POST['name'];
$cuisine = $_POST['cuisine'];
$mtype = $_POST['mtype'];

echo $name . " " .  $cuisine . " " .  $mtype . "<br>";

$sql_statement = "INSERT INTO Food(Name, Cuisine,MealType)
					VALUES ('$name','$cuisine','$mtype')";

$result = mysqli_query($db, $sql_statement);

header ("Location: add_meal.php");

}

else
{

	echo "The form is not set.";

}


?>
