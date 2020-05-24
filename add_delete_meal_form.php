<?php

include "config.php";

if (isset($_POST['ids'])){

$selection_id = $_POST['ids'];

//$sql_statement="DELETE FROM review WHERE username = $selection_id";

//$sql_statement = "DELETE FROM user WHERE username = '$selection_id'";

//$result = mysqli_query($db, $sql_statement);

$sql_statement = "DELETE FROM Food WHERE Name = '$selection_id' ";

$result = mysqli_query($db, $sql_statement);

header ("Location: add_meal.php");
//echo "$selection_id";
}

else
{

	echo "The form is not set.";

}

?>
