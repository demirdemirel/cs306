<?php

include "config.php";

if (isset($_POST['ids'])){
$selection_id = $_POST['ids'];

$selection_id1 = $_POST['ids1'];
//$sql_statement="DELETE FROM review WHERE username = $selection_id";

//$sql_statement = "DELETE FROM user WHERE username = '$selection_id'";

//$result = mysqli_query($db, $sql_statement);

$sql_statement = "DELETE FROM Has_in_Menu WHERE Rest_id = $selection_id and Name = '$selection_id1'";

$result = mysqli_query($db, $sql_statement);

header ("Location: restaurant_menu.php");
//echo "$selection_id";
}

else
{

	echo "The form is not set.";

}

?>
