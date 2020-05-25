<?php

include "config.php";
include "welcome.html";

if (isset($_POST['uname'])){

$uname = $_POST['uname'];
$psw = $_POST['psw'];

if($uname == "admin" && $psw == "cs306"){
	header ("Location: index.php");
}


$sql_statement = "SELECT password FROM user
					WHERE username = '$uname'";

$result = mysqli_query($db, $sql_statement);

$row = mysqli_fetch_assoc($result);

if($row['password'] == $psw){
	session_start();

	$_SESSION['username'] = $uname;

	header ("Location: index_user.php");
}

else{
echo
"<style>
figure {
 	margin-left: 10 px;
  	margin-right: auto;

}

figcaption {
  background-color: white;
  color: black;
  font-size: 20px;
  font-style: italic;
  padding: 4px;
  text-align: center;
}
</style>


<figure>
  <img src=\"errorimg\sad.png\" alt=\"Paris\" style=\"width:10%\" class= \"center\">
  <figcaption>Incorrect password or username, please press the logo to retry.</figcaption>
</figure>";

}

}

else
{

	echo "The form is not set.";

}


?>
