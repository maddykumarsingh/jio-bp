
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once("../seo-head.php");?>
  <title>Amazing Race </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<?php include_once("../seo-body.php");?>
<?php
ob_start();
session_start();
error_reporting(0);

include_once("../login-default.php");

?>
<?php include("../actions-default.php");  back("https://extramileplay.com");?>
<div class="container-fluid container-control">
<div class="row">
<div class="col-md-2 auto"></div>
<div class="col-md-8 auto"><img src="images/welcome-logo.png" class="welcome-logo"/></div>
<div class="col-md-2 auto"></div>

<div class="col-md-12 text-center">
<?php if(isset($loginSuccess)){
  echo '<a href="rules.php"><div class="btn btn-info begin">BEGIN PLAY</div></a>';
}?>
</div>
</div>
</div>
<script>

document.addEventListener('contextmenu', event=> event.preventDefault()); 
document.onkeydown = function(e) { 
if(event.keyCode == 123) { 
return false; 
} 
if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){ 
return false; 
} 
if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){ 
return false; 
} 
if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){ 
return false; 
} 
} 
</script>
</body>
</html>
