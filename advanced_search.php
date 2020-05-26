<html>

<?php include 'user.html'; ?>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
  box-sizing: border-box;
}

.columns {
  float: left;
  width: 33.3%;
  padding: 8px;
}

.price {
  list-style-type: none;
  border: 1px solid #eee;
  margin: 0;
  padding: 0;
  -webkit-transition: 0.3s;
  transition: 0.3s;
}

.price:hover {
  box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
}

.price .header {
  background-color: #111;
  color: white;
  font-size: 25px;
}

.price li {
  border-bottom: 1px solid #eee;
  padding: 20px;
  text-align: center;
}

.price .grey {
  background-color: #eee;
  font-size: 20px;
}

.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  font-size: 18px;
}

@media only screen and (max-width: 600px) {
  .columns {
    width: 100%;
  }
}
</style>



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
  <h3 style="text-align:center">Welcome to the HungryDB Advanced Search</h3>
  <p style="text-align:center">
  You can search anything you want with that form!</p>

</div>
</div>

<div class="container">
<form action="advanced_search_form.php"  method="POST">
  <!--<input type="text" id="rname" name="rname" placeholder="Restaurant Name"required><br>
  <input type="text" id="loc" name="loc" placeholder="Location"required><br>
  <input class="form-check-input" id="cbox" name="cbox"type="checkbox"> Remember me
-->
  <div class="form-group">
    <label for="rname">Restaurant Name:</label>
    <input type="text" id="rname" name="rname" placeholder="Restaurant Name"><br>
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" id="cbox1" name="cbox1"type="checkbox"> Search with restaurant name
    </label>
  </div>
  <div class="form-group">
    <label for="loc">Location:</label>
    <input type="text" id="loc" name="loc" placeholder="Location"><br>
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" id="cbox2" name="cbox2"type="checkbox"> Search with location
    </label>
  </div>

  <div class="form-group">
    <label for="loc">Cuisine:</label>
    <input type="text" id="cuis" name="cuis" placeholder="Cuisine"><br>
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" id="cbox5" name="cbox5"type="checkbox"> Search with cuisine
    </label>
  </div>


  <div class="form-group">
    <label for="loc">Open Time:</label>
    <input type="time" id="otime" name="otime" placeholder="Open Time"><br>
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" id="cbox3" name="cbox3"type="checkbox"> Search with open time
    </label>
  </div>

  <div class="form-group">
    <label for="loc">Close Time:</label>
    <input type="time" id="ctime" name="ctime" placeholder="Close Time"><br>
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" id="cbox4" name="cbox4"type="checkbox"> Search with close time
    </label>
  </div>

  <div class="form-group">
    <label for="loc">Rating:</label>
    <select name="rate" class="form-control" id="exampleFormControlSelect1">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
    </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" id="cbox6" name="cbox6"type="checkbox"> Search with rating
    </label>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>
