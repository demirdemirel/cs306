<html>

<?php include 'user.html'; ?>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<?php session_start(); ?>
<body>

<?php
$db = mysqli_connect('localhost','root','','cs306');

$sessionName = $_SESSION['username'];

if($db->connect_errno > 0){
  die('Unable to connect to database [' . $db->connect_error . ']');
}

?>
<div>
<div class="container">
  <br>
  <h3>Customize your preferences</h3><br>
  <div class="row">
    <div class="col-sm-6" style="background-color:lavender;">
      ADD FAVORITE FOODS
      <form action="add_preferred_meal_form.php" method="POST">
        <div class="row">
        <div class="col-sm-4" style="background-color:lavender;">
          <p>Food Name:</p>

        </div>
        <div class="col-sm-3" style="background-color:lavender;">
          <input type="hidden" id="fname" name="ids1" value= <?php echo $sessionName; ?> >
              <select name="ids">

              <?php

              $sql_command = "SELECT Name FROM food ";

              $myresult = mysqli_query($db, $sql_command);

              while($id_rows = mysqli_fetch_assoc($myresult))
              {
                $id = $id_rows['Name'];
                echo "<option value=$id>".$id."</option>";
              }

              ?>
              </select>
          <button type="submit" class="btn btn-primary my-sm-0">ADD</button>
        </div></div>

      </form>


    </div>
    <div class="col-sm-6" style="background-color:lavenderblush;">
      REMOVE FOOD


      <?php include 'user_list_meal.php'; ?>

      <form action="add_delete_preferred_meal_form.php" method="POST">
       <input type="hidden" id="fname" name="ids1" value= <?php echo $sessionName; ?> >
      <select name="ids">

      <?php

      $sql_command = "SELECT Name FROM prefers WHERE Username='$sessionName' ";

      $myresult = mysqli_query($db, $sql_command);

      while($id_rows = mysqli_fetch_assoc($myresult))
      {
        $id = $id_rows['Name'];
        echo "<option value=$id>".$id."</option>";
      }

      ?>
      </select>

      <button class="btn btn-primary">REMOVE</button>
      </form>


    </div>

  </div>
  <!--
  <table>
    <tr> <th>Rate</th> <th>Restaurant Name</th> <th>Cuisine</th> </tr>
    <?php

    $sql_command = "SELECT * FROM Prefers p,Restaurant r, Has_in_Menu h,Review re WHERE p.Username='$sessionName' AND p.Name=h.Name AND r.Rest_id=h.Rest_id AND re.Rest_id=h.Rest_id";

    $myresult = mysqli_query($db, $sql_command);

    while($row1 = mysqli_fetch_assoc($myresult))
    {
      $rateid = $row1['Rate_id'];
  	  $rate = $row1['Rating'];
  	  $restid = $row1['Rest_id'];
  	  $comment = $row1['r.Name'];
  	  $uname = $row1['Username'];
      $cuisine =$row1['Cuisine'];

  		echo "<tr>" . "<th>" . $rate . "</th>".  "<th>" . $comment . "</th>". "<th>" . $cuisine . "</th>" . "</tr>";

    }

    ?>

  </table>-->
</div>
</div>

</body>
</html>
