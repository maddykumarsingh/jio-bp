
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Down and Across</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <script src="js/sweetalert.min1.js"></script>
<style>
   @media screen and (min-width: 768px) {

        .begin {
            font-weight: bold;
            background-image: linear-gradient(to right, #E25569, #FB9946);
            padding: 5px 15px 5px 15px;
            font-size: 20px;
            border-radius: 10px;
        }

        .container-fluid {

            width: 100%;
            position: absolute;
        }

    }

    @media screen and (max-width: 768px) {
        .container-fluid {
            top: 15%;
            position: absolute;
        }

        .begin {
            font-weight: bold;
            background-image: linear-gradient(to right, #E25569, #FB9946);
            padding: 5px 15px 5px 15px;
            font-size: 15px;
            border-radius: 10px;
        }


    }</style>
</head>
<body>
   <?php
ob_start();
session_start();
error_reporting(0);
 $userLimit=1;



?>

       
<?php include("../actions-default.php");  back("https://extramileplay.com");?>
<div class="container-fluid " style="margin-top:50px;">
  <div class="row">
      <div class="col-md-4 auto"><img src="images/welcome-logo.png" class="welcome-logo"/></div>
  </div>
<div class="col-md-12 text-center"  style="margin-top:50px;">
<?php if(isset($loginSuccess)){
  echo '<a href="rules.php"><div class="btn btn-info begin">BEGIN PLAY</div></a>';
}?>
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
