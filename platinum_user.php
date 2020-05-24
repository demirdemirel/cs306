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
  <h2>Platinum User Management Panel</h2>
  <div class="row">
    <div class="col-sm-6" style="background-color:lavender;">
      ADD PLATINUM USER

      <?php include 'list_users.php'; ?>

      <form action="platinum_user_form.php" method="POST">
         <input type="text" id="fname" name="Member_Type" placeholder="Enter the membership type"><br>
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



        <select name="Username">

      <?php

      $sql_command = "SELECT Username FROM User";

      $myresult = mysqli_query($db, $sql_command);

      while($id_rows = mysqli_fetch_assoc($myresult))
      {
        $id = $id_rows['Username'];
        echo "<option value=$id>".$id."</option>";
      }

      ?>
      </select>


      <button type="submit" class="btn btn-primary">ADD USER</button>
      </form>


    </div>
    <div class="col-sm-6" style="background-color:lavenderblush;">
      DELETE PLATINUM USER


      <?php include 'list_plat_users.php'; ?>

      <form action="platinum_user_delete_form.php" method="POST">
      <select name="ids">

      <?php

      $sql_command = "SELECT Member_id FROM platinium_user";

      $myresult = mysqli_query($db, $sql_command);

      while($id_rows = mysqli_fetch_assoc($myresult))
      {
        $id = $id_rows['Member_id'];
        echo "<option value=$id>".$id."</option>";
      }

      ?>
      </select>

      <button class="btn btn-primary">DELETE MEMBER</button>
      </form>


    </div>
  </div>
</div>
</div>









</body>
</html>
