<?php

include "config.php";

if (isset($_POST['ids'])){

$selection_id = $_POST['ids'];

$sql_statement = "DELETE FROM User WHERE Username = $selection_id";

$sql_statement2 = "DELETE FROM User_Follows WHERE Username_followed = $selection_id";

$sql_statement3 = "DELETE FROM User_Follows WHERE Username_following = $selection_id";

$sql_statement4 = "DELETE FROM Review WHERE Username = $selection_id";

$sql_statement5 = "DELETE FROM Prefers WHERE Username = $selection_id";

$sql_statement6 = "DELETE FROM Platinium_user WHERE Username = $selection_id";


$result = mysqli_query($db, $sql_statement);

$result = mysqli_query($db, $sql_statement2);

$result = mysqli_query($db, $sql_statement3);

$result = mysqli_query($db, $sql_statement4);

$result = mysqli_query($db, $sql_statement5);

$result = mysqli_query($db, $sql_statement6);


header ("Location: add_user.php");

}

else
{

	echo "The form is not set.";

}

?>
