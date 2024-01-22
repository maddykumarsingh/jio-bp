<?php
session_start();
include_once('dao/config.php');
$userid=$_SESSION['userId'];
$stat="select * from stat where userid='$userid' order by id limit 1";
$stat=mysqli_query($con,$stat);
$stat=mysqli_fetch_object($stat);
$points=$stat->points;
$time=$stat->time;
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="css/games-global.css" rel="stylesheet">
        <style rel="stylesheet" type="text/css">
.myscore{
    text-align: center;
    font-size: 24px;
    font-weight: bolder;
}
.mytime{
    text-align: center;
    font-size: 19px;
}
.portal-title{
    margin:0px;
    margin-top:10px;
    font-size: 20px;
    font-weight:bolder;
}
.link{
    color: #673ab7;
    font-size: 17px;
    font-weight: bolder;
    margin-bottom: 5px;
}
.p-image{
    border: 0.5px solid #cccccc;
}
        </style>
        </head>
    <body>

            <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-12">
        <div class="myscore">Your score is <?php echo $points;?></div>
          
    <!--    <div class="mytime">in 00:15:34</div> -->
                      </div>
                </div>
        </div>


    

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>
</html>