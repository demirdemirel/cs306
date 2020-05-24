<html>

<?php include 'base.html'; ?>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
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
  <h2>Platinum Restaurant Management Panel</h2>
  <div class="row">
    <div class="col-sm-6" style="background-color:lavender;">
      ADD PLATINUM MEMBER RESTAURANT

      <?php include 'list_restaurants.php'; ?>

      <form action="platinum_rest_form.php" method="POST">
         <input type="text" id="fname" name="Promotion_Type" placeholder="Enter the promotion type"><br>
        <div class="form-group row">
          <label for="example-datetime-local-input" class="col-2 col-form-label">Start date</label>
          <div class="col-10">
            <input name="Member_since" class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input">
          </div>
        </div>
        <div class="form-group row">
          <label for="example-datetime-local-input" class="col-2 col-form-label">Finish date</label>
          <div class="col-10">
            <input name= "Expires" class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input">
          </div>
        </div>



        <select name="Rest_id">

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


      <button type="submit" class="btn btn-primary">ADD RESTAURANT</button>
      </form>


    </div>
    <div class="col-sm-6" style="background-color:lavenderblush;">
      DELETE PLATINUM RESTAURANT MEMBER


      <?php include 'list_plat_restaurants.php'; ?>

      <form action="platinum_rest_delete_form.php" method="POST">
      <select name="ids">

      <?php

      $sql_command = "SELECT Member_id FROM platinium_program_member";

      $myresult = mysqli_query($db, $sql_command);

      while($id_rows = mysqli_fetch_assoc($myresult))
      {
        $id = $id_rows['Member_id'];
        echo "<option value=$id>".$id."</option>";
      }

      ?>
      </select>

      <button class="btn btn-primary">DELETE RESTAURANT</button>
      </form>


    </div>
  </div>
</div>
</div>









</body>
</html>
