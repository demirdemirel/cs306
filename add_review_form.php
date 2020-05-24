<?php

include "config.php";

if (isset($_POST['uname'])){

$Username = $_POST['uname'];
$Restname = $_POST['rname'];
$Comment = $_POST['comment'];
$Rate = $_POST['rate'];
echo $Username . " " . $Restname . " " . $Comment . "<br>";

$sql_statement = "INSERT INTO Review(Rating,Rest_id,Comment,Username)
					VALUES ('$Rate', (SELECT Rest_id FROM Restaurant WHERE Name= '$Restname') ,'$Comment','$Username')";

$result = mysqli_query($db, $sql_statement);

header ("Location: add_review.php");

}

else
{

	echo "The form is not set.";

}


?>
