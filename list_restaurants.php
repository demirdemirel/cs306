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

<tr> <th> RESTAURANT ID </th> <th> NAME </th> <th>LOCATION</th> </tr>

<?php

include "config.php";

$sql_statement = "SELECT * FROM restaurant LIMIT 20 ";

$result = mysqli_query($db, $sql_statement);

while($row = mysqli_fetch_assoc($result))
{
  $rid = $row['Rest_id'];
  $name = $row['Name'];
	$rloc = $row['Location'];

	echo "<tr>" . "<th>" . $rid . "</th>" . "<th>" . $name . "</th>" . "<th>" . $rloc . "</th>" . "</tr>";
}

?>

</table>
</div>

</body>
</html>
