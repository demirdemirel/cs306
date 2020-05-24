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

<tr> <th> RESTAURANT NAME </th> <th> MEAL NAME </th>  </tr>

<?php

include "config.php";

$sql_statement = "SELECT r.Name restname,h.Name FROM Has_in_Menu h,Restaurant r WHERE r.Rest_id=h.Rest_id LIMIT 5";

$result = mysqli_query($db, $sql_statement);

while($row = mysqli_fetch_assoc($result))
{
  $uname = $row['restname'];
  $uname1 = $row['Name'];

	echo "<tr>" . "<th>" . $uname . "</th>" . "<th>" . $uname1 . "</th>" . "</tr>";
}

?>

</table>
</div>

</body>
</html>
