<?php

include "config.php";

session_start();

if (isset($_POST['uname'])){

$Username = $_POST['uname'];
$Username1 = $_POST['uname2'];
echo $Username . " " .  $Username1 . "<br>";

if ($Username != $Username1){

$sql_statement = "INSERT INTO User_Follows(Username_followed,Username_following)
					VALUES ('$Username','$Username1')";

$result = mysqli_query($db, $sql_statement);

}

if( $_SESSION['username'] == "admin"){
header ("Location: user_follow.php");

}
else{
header ("Location: add_friend_user.php");
}
}

else
{

	echo "The form is not set.";

}


?>
