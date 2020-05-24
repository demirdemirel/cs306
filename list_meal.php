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

<tr> <th> NAME </th> <th> CUISINE </th> <th> MEAL TYPE </th>  </tr>

<?php

include "config.php";

$sql_statement = "SELECT * FROM Food LIMIT 5";

$result = mysqli_query($db, $sql_statement);

while($row = mysqli_fetch_assoc($result))
{
  $name = $row['Name'];
  $cuisine = $row['Cuisine'];
  $mealt = $row['MealType'];

	echo "<tr>" . "<th>" . $name . "</th>" . "<th>" . $cuisine . "</th>". "<th>" . $mealt . "</th>" . "</tr>";
}

?>

</table>
</div>

</body>
</html>
