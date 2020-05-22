<?php

include "config.php";

if (isset($_POST['ids'])){

$selection_id = $_POST['ids'];

//$sql_statement="DELETE FROM review WHERE username = $selection_id";

//$sql_statement = "DELETE FROM user WHERE username = '$selection_id'";

//$result = mysqli_query($db, $sql_statement);

$sql_statement = "DELETE FROM user WHERE username = '$selection_id'";

$sql_statement2 = "DELETE FROM user_follows WHERE username_followed = '$selection_id'";

$sql_statement3 = "DELETE FROM user_follows WHERE username_following = '$selection_id'";

$sql_statement4 = "DELETE FROM review WHERE username = '$selection_id'";

$sql_statement5 = "DELETE FROM prefers WHERE username = '$selection_id'";

$sql_statement6 = "DELETE FROM platinium_User WHERE username = '$selection_id'";

$result = mysqli_query($db, $sql_statement2);

$result = mysqli_query($db, $sql_statement3);

$result = mysqli_query($db, $sql_statement4);

$result = mysqli_query($db, $sql_statement5);

$result = mysqli_query($db, $sql_statement6);

$result = mysqli_query($db, $sql_statement);

header ("Location: add_user.php");
//echo "$selection_id";
}

else
{

	echo "The form is not set.";

}

?>
