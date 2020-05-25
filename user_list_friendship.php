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

<tr> <th> FOLLOWER </th> <th> FOLLOWING </th>  </tr>

<?php

$sessionName = $_SESSION['username'];

include "config.php";

$sql_statement = "SELECT * FROM User_Follows WHERE Username_following = '$sessionName'";

$result = mysqli_query($db, $sql_statement);

while($row = mysqli_fetch_assoc($result))
{
  $uname1 = $row['Username_followed'];
  $uname = $row['Username_following'];

	echo "<tr>" . "<th>" . $uname . "</th>" . "<th>" . $uname1 . "</th>" . "</tr>";
}

?>

</table>
</div>

</body>
</html>
