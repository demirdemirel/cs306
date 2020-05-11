<!DOCTYPE html>
<html>
<head>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

</head>
<body>

<div align="center">

	<table>

<tr> <th> USERNAME </th> <th> LOCATION </th> <th>PASSWORD</th> </tr>

<?php

include "config.php";

$sql_statement = "SELECT * FROM User LIMIT 5";

$result = mysqli_query($db, $sql_statement);

while($row = mysqli_fetch_assoc($result))
{
  $uname = $row['Username'];
  $loc = $row['Location'];
	$passw = $row['Password'];

	echo "<tr>" . "<th>" . $uname . "</th>" . "<th>" . $loc . "</th>" . "<th>" . $passw . "</th>" . "</tr>";
}

?>

</table>
</div>

</body>
</html>
