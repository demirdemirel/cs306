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

<tr> <th> FOOD </th> </tr>

<?php

$sessionName = $_SESSION['username'];

include "config.php";

$sql_statement = "SELECT Name FROM prefers WHERE Username = '$sessionName'";

$result = mysqli_query($db, $sql_statement);

while($row = mysqli_fetch_assoc($result))
{
  $name = $row['Name'];

	echo "<tr>" . "<th>" . $name . "</th>" ."</tr>";
}

?>

</table>
</div>

</body>
</html>
