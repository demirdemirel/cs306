<html>

<?php include 'user.html'; ?>
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
<?php
$root = '';
$path = './';
$imgList = getImagesFromDir($root . $path);
function getImagesFromDir($path) {
    $images = array();
    if ( $img_dir = @opendir($path) ) {
        while ( false !== ($img_file = readdir($img_dir)) ) {
            // checks for gif, jpg, png
            if ( preg_match("/(\.jpg|\.jpeg|\.png)$/", $img_file) ) {
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

include "config.php";
$a=array();

if (isset($_POST['cbox1'])){
$rname= $_POST['rname'];
$rname= "Name LIKE '%$rname%'";
array_push($a,$rname);
array_push($a," AND ");
}
if (isset($_POST['cbox2'])){
$loc= $_POST['loc'];
$loc= "Location LIKE '%$loc%'";
array_push($a,$loc);
array_push($a," AND ");
}
if (isset($_POST['cbox5'])){
$cuis= $_POST['cuis'];
$cuis= "Cuisine LIKE '%$cuis%'";
array_push($a,$cuis);
array_push($a," AND ");
}

if (isset($_POST['cbox3'])){
$otime= $_POST['otime'];
$otime= "Open_Time >= '$otime'";
array_push($a,$otime);
array_push($a," AND ");
}
if (isset($_POST['cbox4'])){
$ctime= $_POST['ctime'];
$ctime= "Close_Time >='$ctime'";
array_push($a,$ctime);
array_push($a," AND ");
}
if (isset($_POST['cbox6'])){
$rate= $_POST['rate'];
$rate= "Rest_id IN (SELECT r.Rest_id FROM Review r WHERE $rate <= (SELECT AVG(rev.Rating) FROM Review rev WHERE rev.Rest_id = r.Rest_id)) ";
array_push($a,$rate);
array_push($a," AND ");
}

//print_r( $a);
if(count($a)>0){array_pop($a);
	//echo "<br>";
	//print_r( $a);
	//echo "<br>";
	$str="WHERE";
	foreach ($a as &$value) {
	    $str= "$str $value";
	}
	//echo $str;
}
else{$str="";//echo "The form is not set.";
}
$str1 = "SELECT * FROM Restaurant ";
$sql_statement = "$str1 $str";
//echo "<br>";
//echo $sql_statement;
//echo "<br>";
$result = mysqli_query($db, $sql_statement);

//echo mysqli_num_rows($result) ;
echo "<br>";
echo "<div class=\"container\">";
echo "<div class=\"row\">";
if(mysqli_num_rows($result)==0)
{
	echo "
	<style>
	figure {
	 margin-left: auto;
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
	  <img src=\"errorimg\sad.png\" alt=\"Paris\" style=\"width:99%\" class= \"center\">
	  <figcaption>No results found :(</figcaption>
	</figure>";
}
else{

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





?>
</body>
</html>
