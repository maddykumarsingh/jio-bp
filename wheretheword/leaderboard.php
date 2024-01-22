<?php
session_start();
include_once('dao/config.php');
$sessionId = $_SESSION['sessionId'];
$organizationId = $_SESSION['organizationId'];

$yourscore = $_SESSION['yourscore'];


$getId1='SELECT t1.name as name,t1.points as points,t1.time as tim FROM wordpuzzle t1 where sessionId="'.$_SESSION['sessionId'].'" AND organizationId="'.$_SESSION['organizationId'].'"  order by t1.points desc limit 15';
// $getId1='SELECT t1.name as name,t1.points as points,t1.time FROM unscramble t1 where sessionId="$userId" order by t1.point desc';
//echo $getId1;
$getId1=mysqli_query($con,$getId1);
$result = $getId1->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <title>Where's that word? </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src='js/jquery-ui.min.js'></script>


    </head>
    <body style="">
    <!-- <div class="container-fluid" style="margin-top: 10px;">
        <div class="row">
             <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6">
                <img id="leftlogo" src="images/image.png"></img>
            </div>
            
        </div>
    </div> -->

<style>
    body{
          height: 100vh;
            width: 100%;
            background-image: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url('images/word-bg.jpg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: 100% 100%;
            /* overflow: hidden; */
            position: relative;
    }
   table{
    margin-bottom: 20px;
   }
        body{

    font-family: 'HURMEGEOMETRICSANS3 SEMIBOLD';
}
 
tr th {
    font-size: 20px;
    text-align: center;
    padding: 5px;
    border:1px solid #fff;
    color:#fff;
    text-transform: uppercase;
}
tr{
    background-color: #012172;
    /* background-image: linear-gradient(185deg, #012172, #0734d3); */
    color:#fff;
    font-size: 16px;
    padding: 5px;
    text-align: center;
}
tr td{
    border:1px solid #fff;
    padding:5px;
}
tr:hover{
    background-color: #0734d3;
    color:#fff;
}

.auto{
    margin:auto;float:none;
}
h1{
    text-align: center;
    text-transform: uppercase;
    font-weight: 600;
    color:#fff;
}
.button-login{
    color:#fff;
    font-size: 30px;
    position: absolute;
    top:20px;
    right: 35px;
}
.score{
    text-align: right;
    margin-right: 50px;
}
@media only screen and (max-width: 600px) {
    .button-login {
        top:40px;
    font-size: 20px;
    right: 140px;
    /* margin-right: -20px; */
  }
  h1{
    margin-top: 75px;
  }
}

/* 
.thankyou-bg{
    background: linear-gradient(90deg, #00B16B -17.46%, #00A579 -13.12%, #008C94 -2.84%, #007BA7 7.63%, #0070B2 18.31%, #006DB6 29.52%, #205DAD 36%, #4F46A0 46.94%, #713597 56.62%, #862B91 64.56%, #8E278F 69.79%, #91288C 79.21%, #9B2C81 87.45%, #AB326F 95.25%, #C23B56 102.76%, #DF4635 110.03%, #F04C23 113.53%, #F04C23 116.76%);
} */
   </style>

        <div class="container-fluid" style="margin-top:10px;">
        <?php include("../actions-default.php");
if($organizationId == '543f589c-c00a-457d-bd30-b4ea65129057'){
    back("https://insuranceawareness.extramileplay.com");
} else if($organizationId == '8f1c1f27-4a70-4661-8a89-9f47517172df'){
    back("https://myofficeengagements.com/Raymond-Engage/index.php");
 }else{
     back("https://extramileplay.com");
 }
  ?>
         <h4 class="button-login"> Your Score : <?php echo $yourscore; ?></h4>

        <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12 auto">
                        <h1>Leaderboard</h1>
                </div>
            </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12 auto">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 box">
                 <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 border plr0">
                 <table border="1" width="100%" class="thankyou-bg">
                         <tr>
                         <th>No.</th>
                            <th>Name</th>
                             <th>Score</th>
                             <th>Time</th>
                        
                         </tr>
                         <tr>
                             <td>1</td>
                             <td><?php if(empty($result[0]['name'])){ echo "--";}else{ echo $result[0]['name']; };?></td>
                            
                             
                             <td><?php if(empty($result[0]['points'])){ echo "--";}else{ echo $result[0]['points'];};?></td>
                             <td><?php if(empty($result[0]['tim'])){ echo "--";}else{ echo $result[0]['tim']; };?></td>
                         </tr>
                         <tr>
                                <td>2</td>
                             <td><?php if(empty($result[1]['name'])){ echo "--";}else{ echo $result[1]['name'];};?></td>
                             
                            
                             <td><?php if(empty($result[1]['points'])){ echo "--";}else{ echo $result[1]['points'];};?></td>
                             <td><?php if(empty($result[1]['tim'])){ echo "--";}else{ echo $result[1]['tim'];};?></td>
                         </tr>
                         <tr>
                            <td>3</td>
                             <td><?php if(empty($result[2]['name'])){ echo "--";}else{ echo $result[2]['name'];};?></td>
                           
                             <td><?php if(empty($result[2]['points'])){ echo "--";}else{ echo $result[2]['points'];};?></td>
                             <td><?php if(empty($result[2]['tim'])){ echo "--";}else{ echo $result[2]['tim'];};?></td>

                         </tr>
                         <tr>
                         <td>4</td>
                             <td><?php if(empty($result[3]['name'])){ echo "--";}else{ echo $result[3]['name'];};?></td>
                             
                          
                             <td><?php if(empty($result[3]['points'])){ echo "--";}else{ echo $result[3]['points'];};?></td>
                             <td><?php if(empty($result[3]['tim'])){ echo "--";}else{ echo $result[3]['tim'];};?></td>
                         </tr>
                         <tr>
                         <td>5</td>
                             <td><?php if(empty($result[4]['name'])){ echo "--";}else{ echo $result[4]['name'];};?></td>
                             
                          
                             <td><?php if(empty($result[4]['points'])){ echo "--";}else{ echo $result[4]['points'];};?></td>
                             <td><?php if(empty($result[4]['tim'])){ echo "--";}else{ echo $result[4]['tim'];};?></td>
                         </tr>
                         <tr>
                            <td>6</td>
                             <td><?php if(empty($result[5]['name'])){ echo "--";}else{ echo $result[5]['name']; };?></td>
                           
                             <td><?php if(empty($result[5]['points'])){ echo "--";}else{ echo $result[5]['points'];};?></td>
                             <td><?php if(empty($result[5]['tim'])){ echo "--";}else{ echo $result[5]['tim']; };?></td>

                         </tr>
                         <tr>
                            <td>7</td>
                             <td><?php if(empty($result[6]['name'])){ echo "--";}else{ echo $result[6]['name'];};?></td>
                            
                            
                             <td><?php if(empty($result[6]['points'])){ echo "--";}else{ echo $result[6]['points'];};?></td>
                             <td><?php if(empty($result[6]['tim'])){ echo "--";}else{ echo $result[6]['tim'];};?></td>
                         </tr>
                         <tr>
                            <td>8</td>
                             <td><?php if(empty($result[7]['name'])){ echo "--";}else{ echo $result[7]['name'];};?></td>
                             
                           
                             <td><?php if(empty($result[7]['points'])){ echo "--";}else{ echo $result[7]['points'];};?></td>
                             <td><?php if(empty($result[7]['tim'])){ echo "--";}else{ echo $result[7]['tim'];};?></td>
                         </tr>
                         <tr>
                            <td>9</td>
                             <td><?php if(empty($result[8]['name'])){ echo "--";}else{ echo $result[8]['name'];};?></td>
                             
                             <td><?php if(empty($result[8]['points'])){ echo "--";}else{ echo $result[8]['points'];};?></td>
                             <td><?php if(empty($result[8]['tim'])){ echo "--";}else{ echo $result[8]['tim'];};?></td>

                         </tr>
                         <tr>
                            <td>10</td>
                             <td><?php if(empty($result[9]['name'])){ echo "--";}else{ echo $result[9]['name'];};?></td>
                            
                            
                             <td><?php if(empty($result[9]['points'])){ echo "--";}else{ echo $result[9]['points'];};?></td>
                             <td><?php if(empty($result[9]['tim'])){ echo "--";}else{ echo $result[9]['tim'];};?></td>
                         </tr>
                         <tr>
                            <td>11</td>
                             <td><?php if(empty($result[9]['name'])){ echo "--";}else{ echo $result[9]['name'];};?></td>
                            
                            
                             <td><?php if(empty($result[9]['points'])){ echo "--";}else{ echo $result[9]['points'];};?></td>
                             <td><?php if(empty($result[9]['tim'])){ echo "--";}else{ echo $result[9]['tim'];};?></td>
                         </tr>
                         <tr>
                            <td>12</td>
                             <td><?php if(empty($result[9]['name'])){ echo "--";}else{ echo $result[9]['name'];};?></td>
                            
                            
                             <td><?php if(empty($result[9]['points'])){ echo "--";}else{ echo $result[9]['points'];};?></td>
                             <td><?php if(empty($result[9]['tim'])){ echo "--";}else{ echo $result[9]['tim'];};?></td>
                         </tr>
                         <tr>
                            <td>13</td>
                             <td><?php if(empty($result[9]['name'])){ echo "--";}else{ echo $result[9]['name'];};?></td>
                            
                            
                             <td><?php if(empty($result[9]['points'])){ echo "--";}else{ echo $result[9]['points'];};?></td>
                             <td><?php if(empty($result[9]['tim'])){ echo "--";}else{ echo $result[9]['tim'];};?></td>
                         </tr>
                         <tr>
                            <td>14</td>
                             <td><?php if(empty($result[9]['name'])){ echo "--";}else{ echo $result[9]['name'];};?></td>
                            
                            
                             <td><?php if(empty($result[9]['points'])){ echo "--";}else{ echo $result[9]['points'];};?></td>
                             <td><?php if(empty($result[9]['tim'])){ echo "--";}else{ echo $result[9]['tim'];};?></td>
                         </tr>
                         <tr>
                            <td>15</td>
                             <td><?php if(empty($result[9]['name'])){ echo "--";}else{ echo $result[9]['name'];};?></td>
                            
                            
                             <td><?php if(empty($result[9]['points'])){ echo "--";}else{ echo $result[9]['points'];};?></td>
                             <td><?php if(empty($result[9]['tim'])){ echo "--";}else{ echo $result[9]['tim'];};?></td>
                         </tr>
                         
                     </table>

                </div>
                </div>
            </div>
                
</div>
</div>
</div>
<script>
    $(document ).ready(function() {
    var organizationId="<?php echo $organizationId;?>";
    console.log(organizationId);
    if(organizationId == '8f1c1f27-4a70-4661-8a89-9f47517172df'){
        
        $(".logo-holder a").attr('href', 'https://myofficeengagements.com/Raymond-Engage/index.php');
        
    }
});
</script>
    </body>
</html>