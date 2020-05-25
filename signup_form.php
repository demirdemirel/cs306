<?php

include "config.php";
include "welcome.html";

if (isset($_POST['uname'])){
	$uname = $_POST['uname'];
	$psw = $_POST['psw'];
	$loca = $_POST['loca'];

	$sql_statement = "SELECT * FROM user
						WHERE username = '$uname'";

	$result = mysqli_query($db, $sql_statement);

	if ($uname == "admin" or mysqli_num_rows($result)!=0) {
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
		  <figcaption>Username already exists, please press the logo to retry.</figcaption>
		</figure>";
	}
	else {
		$sql_statement = "INSERT INTO User(Username,Location,Password)
							VALUES ('$uname','$loca','$psw')";

		$result = mysqli_query($db, $sql_statement);

		header ("Location: index_user.php");
	}
}
else {
	echo "The form is not set.";
}

?>
