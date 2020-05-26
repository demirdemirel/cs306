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

<tr>  <th> Rating </th><th> Restaurant Name </th><th> Comment </th>  </tr>

<?php

include "config.php";
$sessionName = $_SESSION['username'];

$sql_statement = "SELECT * FROM Review r, Restaurant re WHERE r.Rest_id =re.Rest_id AND r.Username='$sessionName'";

$result = mysqli_query($db, $sql_statement);

while($row = mysqli_fetch_assoc($result))
{
  $rateid = $row['Rate_id'];
  $rate = $row['Rating'];
  $restid = $row['Name'];
  $comment = $row['Comment'];
  $uname = $row['Username'];

	echo "<tr>" .  "<th>" . $rate . "</th>". "<th>" . $restid . "</th>". "<th>" . $comment . "</th>".  "</tr>";
}

?>

</table>
</div>

</body>
</html>
