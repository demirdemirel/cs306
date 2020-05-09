<html>

<?php include 'base.html'; ?>

<body>

<?php
$db = mysqli_connect('localhost','root','','cs306');

if($db->connect_errno > 0){
  die('Unable to connect to database [' . $db->connect_error . ']');
}

?>
<div>
<div class="container">
  <br>
  <h2>Restaurant Management Panel</h2>
  <div class="row">
    <div class="col-sm-6" style="background-color:lavender;">
      ADD RESTAURANT
      <form action="add_restaurant_form.php" method="POST">
        <div class="row">
        <div class="col-sm-4" style="background-color:lavender;">

          <p>Restaurant Name:</p>
          <p>Location:</p>
          <p>Cuisine:</p>
          <p>Open Time: </p>
          <p>Close Time: </p>

        </div>
        <div class="col-sm-3" style="background-color:lavender;">
          <input type="text" id="rname" name="Name" placeholder="Restaurant Name"required><br>
          <input type="text" id="loc" name="Location" placeholder="Location"required><br>
          <input type="text" id="cus" name="Cuisine" placeholder="Cuisine"required><br><br>
          <input type="time" id="opent" name="Open_Time" placeholder="Open Time"required><br>
          <input type="time" id="closet" name="Close_Time" placeholder="Close Time"required><br>
          <button type="submit" class="btn btn-primary">ADD</button>
        </div></div>

      </form>


    </div>
    <div class="col-sm-6" style="background-color:lavenderblush;">
      DELETE RESTAURANT

      <?php include 'list_restaurants.php'; ?>

      <form action="sendadmin.php" method="POST">
      <select name="ids">

      <?php

      $sql_command = "SELECT Rest_id FROM restaurant";

      $myresult = mysqli_query($db, $sql_command);

      while($id_rows = mysqli_fetch_assoc($myresult))
      {
        $id = $id_rows['Rest_id'];
        echo "<option value=$id>".$id."</option>";
      }

      ?>
      </select>

      <button class="btn btn-primary">DELETE</button>
      </form>


    </div>
  </div>
</div>
</div>









</body>
</html>
