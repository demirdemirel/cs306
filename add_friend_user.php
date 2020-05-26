<html>

<?php include 'user.html'; ?>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<?php //session_start(); ?>
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
  <h2>Follow/Unfollow Users</h2>
  <div class="row">
    <div class="col-sm-6" style="background-color:lavender;">
      FOLLOW FRIEND
      <form action="add_friendship_form.php" method="POST">
        <div class="row">
        <div class="col-sm-4" style="background-color:lavender;">
          <p>Friend Username:</p>

        </div>
        <div class="col-sm-3" style="background-color:lavender;">
          <input type="hidden" id="fname" name="uname2" value= <?php echo $sessionName; ?> >
          <input type="text" id="fname" name="uname" placeholder="Username"required>
          <button type="submit" class="btn btn-primary my-sm-0">FOLLOW</button>
        </div></div>

      </form>


    </div>
    <div class="col-sm-6" style="background-color:lavenderblush;">
      UNFOLLOW FRIEND


      <?php include 'user_list_friendship.php'; ?>

      <form action="add_delete_friendship_form.php" method="POST">
       <input type="hidden" id="fname" name="ids1" value= <?php echo $sessionName; ?> >
      <select name="ids">

      <?php

      $sql_command = "SELECT Username_followed FROM user_follows WHERE Username_following='$sessionName' ";

      $myresult = mysqli_query($db, $sql_command);

      while($id_rows = mysqli_fetch_assoc($myresult))
      {
        $id = $id_rows['Username_followed'];
        echo "<option value=$id>".$id."</option>";
      }

      ?>
      </select>

      <button class="btn btn-primary">UNFOLLOW</button>
      </form>


    </div>
  </div>
</div>
</div>

</body>
</html>
