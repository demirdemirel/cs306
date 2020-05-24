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

<tr> <th> USERNAME </th> <th> USERNAME </th>  </tr>

<?php

include "config.php";

$sql_statement = "SELECT * FROM Has_in_Menu LIMIT 5";

$result = mysqli_query($db, $sql_statement);

while($row = mysqli_fetch_assoc($result))
{
  $uname = $row['Username_followed'];
  $uname1 = $row['Username_following'];

	echo "<tr>" . "<th>" . $uname . "</th>" . "<th>" . $uname1 . "</th>" . "</tr>";
}

?>

</table>
</div>

</body>
</html>
