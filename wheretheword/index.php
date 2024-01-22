<!DOCTYPE html>
<html lang="en">

<head>
    <title>Where's that word?</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        .auto{
            margin:auto;
            float:none;
        }
    </style>
</head>

<body>
<?php 
ob_start();
session_start();
error_reporting(0);

include_once("../login-default.php");
//print_r($_SESSION);
$userLimit=1;
// $userId=$_SESSION['v_userId'];

$organizationId=$_SESSION['organizationId'];

?>
<?php include("../actions-default.php"); 
if($organizationId == '8f1c1f27-4a70-4661-8a89-9f47517172df'){
    back("https://myofficeengagements.com/Raymond-Engage/index.php");

 }else if($organizationId == 'df0dbf83-2a5d-486e-be7e-ec55cd05ac8b'){
    back("https://ask.extramileplay.com/");

 }else{
     back("https://extramileplay.com");
 } ?>
    <div class="container-fluid container-control">
        <div class="row">
            <?php if($organizationId == 'df0dbf83-2a5d-486e-be7e-ec55cd05ac8b') {?>

                <div class="col-sm-5 col-md-5 col-lg-5 col-xs-12 auto"><img src="images/respect_logo.png?v=1" class="welcome-logo" /></div>

             <?php }else{ ?>
            <div class="col-md-2 auto"></div>
            <div class="col-md-8 auto"><img src="images/welcome-logo.gif" class="welcome-logo" /></div>
            <div class="col-md-2 auto"></div>
             <?php  }?>
            <div class="col-md-12 text-center">
                <?php if(isset($loginSuccess)){
                       echo '<a href="rules.php"><div class="btn btn-info begin">BEGIN PLAY</div></a>';
                   }?>
            </div>
        </div>
    </div>


<script>

// A $( document ).ready() block.
$(document ).ready(function() {
    var organizationId="<?php echo $organizationId;?>";
    console.log(organizationId);
    if(organizationId == '8f1c1f27-4a70-4661-8a89-9f47517172df'){
        
        $(".logo-holder a").attr('href', 'https://myofficeengagements.com/Raymond-Engage/index.php');
        $(".back-holder a").attr('href', 'https://myofficeengagements.com/Raymond-Engage/index.php');
        
    }
    console.log(organizationId);
    if(organizationId == 'df0dbf83-2a5d-486e-be7e-ec55cd05ac8b'){
        
        $(".logo-holder a").attr('href', 'https://ask.extramileplay.com/');
        $(".back-holder a").attr('href', 'https://ask.extramileplay.com/');
        
    }
});

</script>
</body>

</html>