<html>

<?php include 'base.html'; ?>
<body>
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>


<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<div align="center">

<table>-->
<?php include "config.php";?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<?php
$root = '';
$path = './';
$imgList = getImagesFromDir($root . $path);
function getImagesFromDir($path) {
    $images = array();
    if ( $img_dir = @opendir($path) ) {
        while ( false !== ($img_file = readdir($img_dir)) ) {
            // checks for gif, jpg, png
            if ( preg_match("/(\.jpg|\.jpeg)$/", $img_file) ) {
                $images[] = $img_file;
            }
        }
        closedir($img_dir);
    }
    return $images;
}

function getRandomFromArray($ar) {
    $num = array_rand($ar);
    return $ar[$num];
}
if (isset($_POST['rest'])){
$selection_id = $_POST['rest'];
//echo "$selection_id";
//$sql_statement="DELETE FROM review WHERE username = $selection_id";

//$sql_statement = "DELETE FROM user WHERE username = '$selection_id'";

//$result = mysqli_query($db, $sql_statement);


$sql_statement = "SELECT * FROM Restaurant WHERE Name LIKE '%$selection_id%'  ";

$result = mysqli_query($db, $sql_statement);

echo "<div class=\"container\">";
echo "<div class=\"row\">";


while($row = mysqli_fetch_assoc($result))
{
	echo"<div class=\"col-sm-4\" style=\"background-color:lavender;\">";
		echo "<div class=\"container\">";
			echo "<div class=\"card-columns\">";
			//header ("Location: restaurant_menu.php");

			  $id = $row['Rest_id'];
			  $name = $row['Name'];
				$location = $row['Location'];
			  $cuisine = $row['Cuisine'];
			  $open = $row['Open_Time'];
			  $close = $row['Close_Time'];
			  $img = getRandomFromArray($imgList);
			  echo "<div class=\"card\" style=\"width:200px\">";
			  	echo "<img class=\"card-img-top\" src=\"",$img,"\" alt=\"Card image\" style=\"width:100%\">";
				  echo "<div class=\"card-body\">";
					 	echo   "<h4 class=\"card-title\">",$name,"</h4>";
					  echo   "<p class=\"card-text\"> Located in ",$location,  "</p>";
					  echo   "<p class=\"card-text\"> Cuisine: ",$cuisine,  "</p>";
					  echo   "<p class=\"card-text\"> Open time: ",$open,  "</p>";
					  echo   "<p class=\"card-text\"> Close time: ",$close,  "</p>";
				  echo "</div>";
			  echo "</div>";

			echo "</div>";
		echo "</div>";




	$sql_statement1 = "SELECT * FROM Review WHERE Rest_id = (SELECT Rest_id FROM Restaurant WHERE Name= '$name') ";

	$result1 = mysqli_query($db, $sql_statement1);
	echo"<div class=\"col-sm-4\" style=\"background-color:lavender;\">";

	echo "<table>";
	echo "<tr>" .  "<th>" . "Rate" . "</th>".  "<th>" . "Comment" . "</th>". "<th>" . "Username". "</th>" . "</tr>";

	while($row1 = mysqli_fetch_assoc($result1))
	{
	  $rateid = $row1['Rate_id'];
	  $rate = $row1['Rating'];
	  $restid = $row1['Rest_id'];
	  $comment = $row1['Comment'];
	  $uname = $row1['Username'];

		echo "<tr>" . "<th>" . $rate . "</th>".  "<th>" . $comment . "</th>". "<th>" . $uname . "</th>" . "</tr>";
	}
	echo "</table>";
echo "</div>";
echo "</div>";
	}


echo "</div>";
echo "</div>";
}

else
{

	echo "The form is not set.";

}

?>
<!--</table>
</div>-->
</body>
</html>
