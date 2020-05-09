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

<tr> <th> MEMBER ID </th> <th> MEMBERSHIP TYPE </th> <th> NAME </th>  </tr>

<?php

include "config.php";

$sql_statement = "SELECT * FROM platinium_user NATURAL JOIN user LIMIT 20";

$result = mysqli_query($db, $sql_statement);

while($row = mysqli_fetch_assoc($result))
{
  $mid = $row['Member_id'];
  $mtype = $row['Member_type'];
  $name = $row['Username'];

	echo "<tr>" . "<th>" . $mid . "</th>" . "<th>" . $mtype . "</th>" . "<th>" . $name . "</th>" .  "</tr>";
}

?>

</table>
</div>

</body>
</html>
