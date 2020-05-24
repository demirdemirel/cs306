<?php

include "config.php";

if (isset($_POST['ids'])){

$selection_id = $_POST['ids'];

//$sql_statement="DELETE FROM review WHERE username = $selection_id";

//$sql_statement = "DELETE FROM user WHERE username = '$selection_id'";

//$result = mysqli_query($db, $sql_statement);

$sql_statement = "DELETE FROM Review WHERE Rate_id = '$selection_id'";


$result = mysqli_query($db, $sql_statement);

header ("Location: add_review.php");
//echo "$selection_id";
}

else
{

	echo "The form is not set.";

}

?>
