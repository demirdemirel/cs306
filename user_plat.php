<!DOCTYPE html>
<html>
<?php include 'user.html';
 ?>

<body>
  <head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.container {
  position: relative;
}

.center {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 18px;
}

img { 
  width: 100%;
  height: auto;
  opacity: 0.3;
}
</style>
</head>
<body>


<div class="container">
  <img src=".\errorimg\supper.jpg" alt="Cinque Terre" width="1000" height="300">
  <div class="center"><h2 style="text-align:center;">Welcome to Hungry DB Platinum <?php echo $_SESSION['username'] ?>, we were waiting for you!</h2>
   <br><h3 style="text-align:center;">Browse restaurants to enjoy your first deal!</h3></div>
 
</div>
</body>
</html>
