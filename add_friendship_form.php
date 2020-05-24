<?php

include "config.php";

if (isset($_POST['uname'])){

$Username = $_POST['uname'];
$Username1 = $_POST['uname2'];
echo $Username . " " .  $Username1 . "<br>";

$sql_statement = "INSERT INTO User_Follows(Username_followed,Username_following)
					VALUES ('$Username','$Username1')";

$result = mysqli_query($db, $sql_statement);

header ("Location: user_follow.php");

}

else
{

	echo "The form is not set.";

}


?>
