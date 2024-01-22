<?php
ob_start();
error_reporting(0);
session_start();
// $_SESSION['token']="211515151454";
if($_SESSION['token'] == ""){
   header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Amazing Race</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <style rel="stylesheet" type="text/css">
  body{
    width:100%;
    background-color: white;
    background-image: url(images/background-web.png);
    background-repeat: no-repeat;
    background-attachment:fixed;
}
.rules-text{
  width: 150px;
  margin-top:40px;
  margin-bottom:20px;
}
.container-control{
    margin-top: 0px;
}
.next{
    width:130px;
    font-size: 18px;
    background: #e9695e;
}

@media (min-width:100px) and (max-width:500px){
    body{
        background-image: url(images/background-mob.png);
        background-repeat: repeat;
    }
    .desk{
        display: none;
    }
    .mob{
        display: block;
    }
    .container-control{
        margin-top:45px;
    }
   }

    .rule-list li {
        list-style-type: none;
        background-image: url(img/arrow.png);
        background-repeat: no-repeat;
        text-align: left;
        width: 100%;
        padding-bottom: 10px;
        font-size: 20px;
        font-weight: 500;
        color: black;
        padding-left: 40px;
    }
.auto{
margin:auto;
float:none;
}

  </style>
</head>
<body>
<?php include("../actions-default.php");  back("index.php?save");?>
<div class="container-fluid container-control">
<div class="row">
<div class="col-md-2 auto desk"></div>
<div class="col-md-6 auto"><img src="images/welcome-logo.png" class="welcome-logo"/></div>
<div class="col-md-2 auto"></div>
</div>
<div class="row">
<div class="col-md-12 text-center">
<img class="rules-text" src="images/rules-text.png"/>
</div>
<div class="col-md-6 col-md-offset-3">
<ul class="rule-list">
<li>Take flight to meet customers across the country in 5 pit-stops</li>
<li>Solve the customer query by being focused and empathetic in your service delivery</li>
<li>Complete all pit-stops to ace in the race and make it to the Leaderboard</li>
</ul>
</div>
<div class="col-md-12 text-center">
<a href="home.php"><div style="font-weight:bold;" class="btn btn-info next">Next</div></a>
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
