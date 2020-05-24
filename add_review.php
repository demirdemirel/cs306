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
  <h1>Review Management Panel</h1>
  <div class="row">
    <div class="col-sm-4" style="background-color:lavender;">
      ADD REVIEW
      <form action="add_review_form.php" method="POST">
        <div class="row">
        <div class="col-sm-1" style="background-color:lavender;">
          <!--<p>Username:</p>
          <p>Restaurant Name:</p>
          <p>Comment:</p>
          <p>Rating:</p>
-->
        </div>
        <div class="col-sm-3" style="background-color:lavender;">

          <table>

        <tr> <th> Username: </th> <th> <input type="text" id="fname" name="uname" placeholder="Username"required><br> </th>  </tr>
        <tr> <th> Restaurant Name: </th> <th>  <input type="text" id="rname" name="rname" placeholder="Restaurant Name"required><br>  </th>  </tr>
        <tr> <th> Comment: </th> <th>  <input type="textbox" id="comment" name="comment" placeholder="Comment"required><br>  </th>  </tr>
        <tr> <th> Rating: </th> <th>  <select name="rate" class="form-control" id="exampleFormControlSelect1">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>  </th>  </tr>




        </table>




          <!--<input type="text" id="fname" name="uname" placeholder="Username"required><br>-->





          <button type="submit" class="btn btn-primary my-sm-0">SEND</button>
        </div></div>

      </form>


    </div>
    <div class="col-sm-8" style="background-color:lavenderblush;">
      DELETE REVIEW


      <?php include 'list_review.php'; ?>

      <form action="add_delete_review_form.php" method="POST">
      <select name="ids">

      <?php

      $sql_command = "SELECT Rate_id FROM Review";

      $myresult = mysqli_query($db, $sql_command);

      while($id_rows = mysqli_fetch_assoc($myresult))
      {
        $id = $id_rows['Rate_id'];
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
