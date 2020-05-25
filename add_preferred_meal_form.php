<?php

include "config.php";

session_start();
if (isset($_POST['ids'])){

$food = $_POST['ids'];
$user = $_POST['ids1'];


$sql_statement = "INSERT INTO prefers(Username, Name)
					VALUES ('$user','$food')";

$result = mysqli_query($db, $sql_statement);



if( $_SESSION['username'] == "admin"){
header ("Location: add_meal.php");

}
else{
header ("Location: user_meal.php");
}



}

else
{

	echo "The form is not set.";

}


?>
