<?php

include "config.php";

if (isset($_POST['rest'])){
$selection_id = $_POST['rest'];

//$sql_statement="DELETE FROM review WHERE username = $selection_id";

//$sql_statement = "DELETE FROM user WHERE username = '$selection_id'";

//$result = mysqli_query($db, $sql_statement);

$sql_statement = "SELECT * FROM Restaurant WHERE Name = '$selection_id' ";

$result = mysqli_query($db, $sql_statement);

//header ("Location: restaurant_menu.php");
echo $result['Name'];
}

else
{

	echo "The form is not set.";

}

?>
