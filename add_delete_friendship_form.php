<?php

include "config.php";

if (isset($_POST['ids'])){

$selection_id = $_POST['ids'];

$selection_id1 = $_POST['ids1'];
//$sql_statement="DELETE FROM review WHERE username = $selection_id";

//$sql_statement = "DELETE FROM user WHERE username = '$selection_id'";

//$result = mysqli_query($db, $sql_statement);

$sql_statement = "DELETE FROM User_Follows WHERE username_followed = '$selection_id' and username_following = '$selection_id1'";

$result = mysqli_query($db, $sql_statement);

header ("Location: user_follow.php");
//echo "$selection_id";
}

else
{

	echo "The form is not set.";

}

?>
