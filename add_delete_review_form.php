<?php

include "config.php";
session_start();
if (isset($_POST['ids'])){

$selection_id = $_POST['ids'];

//$sql_statement="DELETE FROM review WHERE username = $selection_id";

//$sql_statement = "DELETE FROM user WHERE username = '$selection_id'";

//$result = mysqli_query($db, $sql_statement);

$sql_statement = "DELETE FROM Review WHERE Rate_id = '$selection_id'";


$result = mysqli_query($db, $sql_statement);

if( $_SESSION['username'] == "admin"){
header ("Location: add_review.php");

}
else{
header ("Location: user_add_review.php");
}
}

else
{

	echo "The form is not set.";

}

?>
