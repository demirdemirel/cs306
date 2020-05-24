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
  <h1>User Panel</h1>
  <div class="row">
    <div class="col-sm-6" style="background-color:lavender;">
      ADD MENU
      <form action="add_menu_form.php" method="POST">
        <div class="row">
        <div class="col-sm-4" style="background-color:lavender;">
          <p>Restaurant name:</p>
          <p>Meal name:</p>

        </div>
        <div class="col-sm-3" style="background-color:lavender;">
          <input type="text" id="fname" name="uname" placeholder="Restaurant name"required><br>
          <input type="text" id="fname2" name="uname2" placeholder="Meal name"required><br>
          <button type="submit" class="btn btn-primary my-sm-0">SEND</button>
        </div></div>

      </form>


    </div>
    <div class="col-sm-6" style="background-color:lavenderblush;">
      DELETE MENU ITEM


      <?php include 'list_menu.php'; ?>

      <form action="add_delete_menu_form.php" method="POST">
      <select name="ids">

      <?php

      $sql_command = "SELECT r.Name ,r.Rest_id FROM Restaurant r , Has_in_Menu h WHERE r.Rest_id =h.Rest_id";

      $myresult = mysqli_query($db, $sql_command);

      while($id_rows = mysqli_fetch_assoc($myresult))
      {
        $id = $id_rows['Name'];
        $id1 = $id_rows['Rest_id'];
        echo "<option value=$id1>".$id."</option>";
      }

      ?>
      </select>

      <select name="ids1">

      <?php

      $sql_command = "SELECT DISTINCT(Name)  FROM Has_in_Menu ";

      $myresult = mysqli_query($db, $sql_command);

      while($id_rows1 = mysqli_fetch_assoc($myresult))
      {
        $id1 = $id_rows1['Name'];
        echo "<option value=$id1>".$id1."</option>";
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
