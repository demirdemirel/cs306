<?php

include "config.php";

if (isset($_POST['uname'])){

$restname = $_POST['uname'];
$mealname = $_POST['uname2'];
echo $restname . " " .  $mealname . "<br>";


$sql_statement = "INSERT INTO Has_in_Menu(Rest_id,Name)
					VALUES ((SELECT Rest_id FROM Restaurant WHERE Name= '$restname'),'$mealname')";

$result = mysqli_query($db, $sql_statement);

header ("Location: restaurant_menu.php");

}

else
{

	echo "The form is not set.";

}


?>
