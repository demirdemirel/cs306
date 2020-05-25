<?php

include "config.php";
session_start();
if (isset($_POST['ids'])){

$food = $_POST['ids'];
$user = $_POST['ids1'];

$sql_statement = "DELETE FROM prefers WHERE Username='$user' AND Name='$food' ";


$result = mysqli_query($db, $sql_statement);

header ("Location: user_meal.php");

}

else
{

	echo "The form is not set.";

}

?>
