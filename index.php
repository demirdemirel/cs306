<!DOCTYPE html>
<html>
<?php include 'base.html'; ?>
<body>

<?php
$db = mysqli_connect('localhost','root','','cs306');

if($db->connect_errno > 0){
  die('Unable to connect to database [' . $db->connect_error . ']');
}

?>

<?php

$sql_statement = "SELECT * FROM Restaurant";

$result = mysqli_query($db, $sql_statement);

while($row = mysqli_fetch_assoc($result))
{
  $id = $row['Rest_id'];
  $name = $row['Name'];
	$location = $row['Location'];

	echo "<tr>" . "<th>" . $id . "</th>" . "<th>" . $name . "</th>" . "<th>" . $location . "</th>" . "</tr>";
}

?>
</body>
</html>
