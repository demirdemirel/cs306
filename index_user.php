<html>
<?php include 'welcome.html'; ?>
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
  <h2>User Query Panel</h2>
  <div class="row">
    <div class="col-sm-6" style="background-color:lavender;">
      QUERY PARAMETERS
      <form action="user_query_form.php" method="POST">
        <div class="row">
        <div class="col-sm-4" style="background-color:lavender;">

          <p>Username:</p>
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
          <button type="submit" class="btn btn-primary">QUERY</button>
        </div></div>

      </form>


    </div>
    <div class="col-sm-6" style="background-color:lavenderblush;">
      QUERY RESULT


      <!DOCTYPE html>

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

      </head>
      <body>

      <div align="center">

        <table>

      <tr> <th> RESTAURANT NAME </th> <th> LOCATION </th> <th>CUISINE</th> </tr>


      <?php
        if (isset($_POST['result'])){

        $result = $_POST['result'];



        while($row = mysqli_fetch_assoc($result))
        {
          $name = $row['Name'];
          $loc = $row['Location'];
        	$cus = $row['Cuisine'];

        	echo "<tr>" . "<th>" . $name . "</th>" . "<th>" . $loc . "</th>" . "<th>" . $cus . "</th>" . "</tr>";
        }






        }
      ?>


    </table>
    </div>

    </body>



    </div>
  </div>
</div>
</div>





</body>
</html>
