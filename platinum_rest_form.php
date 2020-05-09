<?php

include "config.php";

if (isset($_POST['Rest_id'])){

$rid = $_POST['Rest_id'];
$m_since = $_POST['Member_since'];
$prom = $_POST['Promotion_Type'];
$expr = $_POST['Expires'];

echo $rid . " " . $m_since . " " . $expr . " " . $prom . "<br>";


$sql_statement = "INSERT INTO platinium_program_member(Rest_id,Member_since,Expires,Promotion_type)
					VALUES ('$rid','$m_since','$expr','$prom')";

$result = mysqli_query($db, $sql_statement);

header ("Location: platinum_rest.php");

}

else
{

	echo "The form is not set.";

}


?>
