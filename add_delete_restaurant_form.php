<?php

include "config.php";

if (isset($_POST['ids'])){

$selection_id = $_POST['ids'];

$sql_statement = "DELETE FROM restaurant WHERE Rest_id = $selection_id";

$sql_statement2 = "DELETE FROM review WHERE Rest_id = $selection_id";

$sql_statement3 = "DELETE FROM platinium_program_member WHERE Rest_id = $selection_id";

$result = mysqli_query($db, $sql_statement);

$result = mysqli_query($db, $sql_statement2);

$result = mysqli_query($db, $sql_statement3);


header ("Location: add_restaurant.php");

}

else
{

	echo "The form is not set.";

}

?>
