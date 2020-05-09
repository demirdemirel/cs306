<?php

include "config.php";

if (isset($_POST['uname'])){

$Username = $_POST['uname'];
$Location = $_POST['loc'];
$Password = $_POST['passw'];
echo $Username . " " . $Location . " " . $Password . "<br>";

$sql_statement = "INSERT INTO User(Username,Location,Password)
					VALUES ('$Username','$Location','$Password')";

$result = mysqli_query($db, $sql_statement);

header ("Location: index.php");

}

else
{

	echo "The form is not set.";

}


?>
