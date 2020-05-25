<form action="index_user.php" method="post">



<?php

include "config.php";

if (isset($_POST['Name'])){

$rname = $_POST['Name'];
$loc = $_POST['Location'];
$cus = $_POST['Cuisine'];
$opent = $_POST['Open_Time'];
$closet = $_POST['Close_Time'];

echo $rname . " " . $loc . " " . $cus . " " . $opent . " ". $closet . "<br>";

$sql_statement = "SELECT * FROM RESTAURANT WHERE Location = '$loc' AND Cuisine = '$cus' AND Open_Time = '$opent' AND Close_Time = '$closet'";

$result = mysqli_query($db, $sql_statement);




//header ("Location: index_user.php");

}

else
{

	echo "The form is not set.";

}


?>

<input type="submit" value="Submit"/>
<input type="hidden" name="result" value="$result">
</form>
