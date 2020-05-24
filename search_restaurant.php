<?php

include "config.php";

if (isset($_POST['rest'])){
$selection_id = $_POST['rest'];
echo "$selection_id";
//$sql_statement="DELETE FROM review WHERE username = $selection_id";

//$sql_statement = "DELETE FROM user WHERE username = '$selection_id'";

//$result = mysqli_query($db, $sql_statement);

$sql_statement = "SELECT * FROM Restaurant WHERE Name LIKE '$selection_id' ";

$result = mysqli_query($db, $sql_statement);

//header ("Location: restaurant_menu.php");
while($row = mysql_fetch_array($result)) {
    echo $row['Rest_id'];
}
}

else
{

	echo "The form is not set.";

}

?>
