<?php

include "config.php";

if (isset($_POST['Username'])){

$name = $_POST['Username'];
$m_since = $_POST['Member_since'];
$memb = $_POST['Member_Type'];
$expr = $_POST['Expires'];

echo $name . " " . $m_since . " " . $expr . " " . $prom . "<br>";


$sql_statement = "INSERT INTO platinium_user(Username,Member_since,Expires,Member_type)
					VALUES ('$name','$m_since','$expr','$memb')";

$result = mysqli_query($db, $sql_statement);

header ("Location: platinum_user.php");

}

else
{

	echo "The form is not set.";

}


?>
