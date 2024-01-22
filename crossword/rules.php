<?php
ob_start();
error_reporting(0);
session_start();
if($_SESSION['token'] == ""){
   header('location:index.php');
}

?>
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
  <style rel="stylesheet" type="text/css">
  body{
    width:100%;
    background-color: white;
    background-image: url(images/background-web.png);
    background-repeat: no-repeat;
    background-size: 100% 100%;
}
.rules-text{
  width: 150px;
  margin-top:40px;
  margin-bottom:20px;
}
.container-control{
    margin-top:80px;
}
.next{
    width:130px;
    font-size: 18px;
    background: #e9695e;
    font-weight:bold;
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
        background-image: url(images/arrow.png);
        background-repeat: no-repeat;
        text-align: left;
        width: 100%;
        padding-bottom: 10px;
        font-size: 20px;
        font-weight: 500;
        color: black;
        padding-left: 40px;
    }

.row {
    margin-right:0px !important;
    margin-left: 0px !important;

}

  </style>
</head>
<body>
<?php include("../actions-default.php");  back("index.php?save");?>

<div class="container-fluid container-control">
<div class="row">
<div class="col-md-2 auto"><img src="images/welcome-logo.png" class="welcome-logo"/></div>
</div>
<div class="row">
      <div class="row">
                <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 auto">
                    <h3 style="text-align:center;color:white;font-weight:bold;background-image: linear-gradient(to right, #E25569 , #FB9946); padding: 10px 10px;
                    padding-top: 10px; border-radius:10px;">Rules</h3>
                </div>

            </div>         <div class="row" style="margin-top:30px;">
                <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12 auto">
                    <ul type="dice" class="rule-list">

                    <?php 

                    if($_SESSION['organizationId']=="543f589c-c00a-457d-bd30-b4ea65129057"){

                        echo '<li>This is a crossword puzzle based on the topic of Life Insurance Awareness</li>';

                    }else{

                        echo '<li>This is a crossword puzzle based on the topic of Collaboration</li>';
                    }
                    ?>
			
			<li>Insert the answers in the text boxes</li>
			<li>Answer correctly to earn maximum points</li>
		    </ul>
		</div>
	</div>
<div class="col-md-12 text-center">

<?php

if($_SESSION['sessionId']=="demobypass"){
  echo '<a href="crossworddemo.php"><div class="btn btn-info next">Next</div></a>';
}else{
 if($_SESSION['organizationId']=="543f589c-c00a-457d-bd30-b4ea65129057"){

    echo '<a href="crossword-abc.php"><div class="btn btn-info next">Next</div></a>';

}else{
    echo '<a href="crossword.php"><div class="btn btn-info next">Next</div></a>';
}
}

?>
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
