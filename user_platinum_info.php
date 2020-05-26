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
  <h3 style="text-align:center">Welcome to the HungryDB Platinum Program</h3>
  <p style="text-align:center">
  With Platinum membership, you can eat and drink at your favorite places in town with amazing discounts.
  You can select from our two plan types; monthly or yearly.</p>
  <p style="text-align:center">Try it for free!</p>

</div>
</div>


<div class="columns">
  <ul class="price">
    <li class="header">Free Trial</li>
    <li class="grey">Try for a month!</li>
    <li>A drink or a meal daily</li>
    <li>Choose from 20+ restaurants</li>
    <li class="grey"><a href="user_platinum_form_month.php" class="button">Sign Up</a></li>
  </ul>
</div>

<div class="columns">
  <ul class="price">
    <li class="header" style="background-color:#4CAF50">Monthly</li>
    <li class="grey">$ 9.99 / month</li>
    <li>A drink and a meal daily</li>
    <li>Choose from 50+ restaurants</li>
    <li class="grey"><a href="user_platinum_form_month.php" class="button">Sign Up</a></li>
  </ul>
</div>

<div class="columns">
  <ul class="price">
    <li class="header">Yearly</li>
    <li class="grey">$ 99.99 / year</li>
    <li>Unlimited offers</li>
    <li>Choose from 90+ restaurants</li>
    <li class="grey"><a href="user_platinum_form_year.php" class="button">Sign Up</a></li>
  </ul>
</div>


</body>
</html>
