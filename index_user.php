<html>
<?php include 'user.html'; ?>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<?php session_start(); ?>
<h3 style="text-align:center;"> Welcome  <?php echo $_SESSION['username'] ?>  </h3><br>

<h3 style="text-align:center;"> Choose From People's Favorite Resturants </h3><br>

<?php
$db = mysqli_connect('localhost','root','','cs306');

if($db->connect_errno > 0){
  die('Unable to connect to database [' . $db->connect_error . ']');
}

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<?php
$root = '';
$path = './';
$imgList = getImagesFromDir($root . $path);


$sql_statement = "SELECT * FROM Restaurant LIMIT 6";

$result = mysqli_query($db, $sql_statement);
echo "<div class=\"container\">";
echo "<div class=\"card-columns\">";

while($row = mysqli_fetch_assoc($result))
{
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


}
echo "</div>";
echo "</div>";

$useeer=$_SESSION['username'];
$sql_statement = "SELECT * FROM Review r1, Restaurant r    WHERE r1.Username IN (SELECT u.Username_following FROM User_Follows u WHERE u.Username_followed='$useeer') AND r1.Rest_id=r.Rest_id LIMIT 6";

$result = mysqli_query($db, $sql_statement);
if(mysqli_num_rows($result)==0){}
else{echo "<h3 style=\"text-align:center;\"> Choose From Your Friend's Favorite Resturants </h3><br>";
echo "<div class=\"container\">";
echo "<div class=\"card-columns\">";

while($row = mysqli_fetch_assoc($result))
{
  $id = $row['Rest_id'];
  $name = $row['Name'];
  $location = $row['Location'];
  $cuisine = $row['Cuisine'];
  $open = $row['Open_Time'];
  $close = $row['Close_Time'];
  $friend =$row['Username'];
  $rate =$row['Rating'];
  $img = getRandomFromArray($imgList);
  echo "<div class=\"card\" style=\"width:200px\">";
  echo "<img class=\"card-img-top\" src=\"",$img,"\" alt=\"Card image\" style=\"width:100%\">";
  echo "<div class=\"card-body\">";
  echo   "<h4 class=\"card-title\">",$name,"</h4>";
  echo   "<h4 class=\"card-title\">",$friend," Gives ",$rate," Star</h4>";
  echo   "<p class=\"card-text\"> Located in ",$location,  "</p>";
  echo   "<p class=\"card-text\"> Cuisine: ",$cuisine,  "</p>";
  echo   "<p class=\"card-text\"> Open time: ",$open,  "</p>";
  echo   "<p class=\"card-text\"> Close time: ",$close,  "</p>";
  echo "</div>";
  echo "</div>";


}
echo "</div>";
echo "</div>";}



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
?>
</body>
</html>
