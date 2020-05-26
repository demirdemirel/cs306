
<?php

include "config.php";
session_start();


$now = date('Y-m-d H:i:s');

$sql_statement ="SELECT DATE_ADD('$now', INTERVAL 30 DAY) AS newdate";
$result = mysqli_query($db, $sql_statement);

$row = mysqli_fetch_assoc($result);
$later = $row['newdate'];


$name = $_SESSION['username'];
$m_since = $now;
$memb = "Monthly";
$expr = $later;


//echo $name . " " . $m_since . " " . $expr . " " . $prom . "<br>";


$sql_statement = "INSERT INTO platinium_user(Username,Member_since,Expires,Member_type)
					VALUES ('$name','$m_since','$expr','$memb')";

$result = mysqli_query($db, $sql_statement);

header ("Location: user_plat.php");




?>
