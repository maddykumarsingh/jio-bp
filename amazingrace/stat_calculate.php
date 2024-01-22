<?php 
/*
session_start();
include_once 'dao/config.php';
$userid=$_SESSION["userid"];
*/
include_once '../add_report.php';
$wordpuzzle="select * from wordpuzzle where userid='$userid' order by id desc limit 1";
$wordpuzzle=mysqli_query($con,$wordpuzzle);
$wordpuzzle=mysqli_fetch_object($wordpuzzle);
$wordpuzzle_point=$wordpuzzle->total_score;
$wordpuzzle_time=$wordpuzzle->time;
$tf="select * from do_dont where useid='$userid' order by id desc limit 1";
$tf=mysqli_query($con,$tf);
$tf=mysqli_fetch_object($tf);
$tf_point=$tf->points;
$tf_time=$tf->time;
$unscramble="select * from unscramble where useid='$userid' order by id desc limit 1";
$unscramble=mysqli_query($con,$unscramble);
$unscramble=mysqli_fetch_object($unscramble);
$unscramble_point=$unscramble->points;
$unscramble_time=$unscramble->time;
$spot="select * from spot where useid='$userid' order by id desc limit 1";
$spot=mysqli_query($con,$spot);
$spot=mysqli_fetch_object($spot);
$spot_point=$spot->points;
$spot_time=$spot->time;
$jigsaw="select * from jigsaw where useid='$userid' order by id desc limit 1";
$jigsaw=mysqli_query($con,$jigsaw);
$jigsaw=mysqli_fetch_object($jigsaw);
$jigsaw_point=$jigsaw->points;
$jigsaw_time=$jigsaw->time;
$multiselect="select * from multiselect where useid='$userid' order by id desc limit 1";
$multiselect=mysqli_query($con,$multiselect);
$multiselect=mysqli_fetch_object($multiselect);
$multiselect_point=$multiselect->points;
$multiselect_time=$multiselect->time;
if(empty($wordpuzzle_time)){$wordpuzzle_time="00:00:00";}
if(empty($tf_time)){$tf_time="00:00:00";}
if(empty($unscramble_time)){$unscramble_time="00:00:00";}
if(empty($spot_time)){$spot_time="00:00:00";}
if(empty($jigsaw_time)){$jigsaw_time="00:00:00";}
if(empty($multiselect_time)){$multiselect_time="00:00:00";}
/*
echo $wordpuzzle_time."<br>";
echo $tf_time."<br>";
echo $unscramble_time."<br>";
echo $spot_time."<br>";
echo $jigsaw_time."<br>";
echo $multiselect_time."<br>";
*/
$two = strtotime($tf_time)-strtotime("00:00:00");
$three = strtotime($unscramble_time)-strtotime("00:00:00");
$four = strtotime($spot_time)-strtotime("00:00:00");
$five = strtotime($jigsaw_time)-strtotime("00:00:00");
$six = strtotime($multiselect_time)-strtotime("00:00:00");
$allTime = date("H:i:s",strtotime($wordpuzzle_time)+($two+$three+$four+$five+$six));
$allPoints=$wordpuzzle_point+$tf_point+$unscramble_point+$spot_point+$jigsaw_point+$multiselect_point;

$getGlobal="select TIMEDIFF(timestamp_end,timestamp) as time from currentgame where userid='$userid'";
$getGlobal=mysqli_query($con,$getGlobal);
$getGlobal=mysqli_fetch_object($getGlobal);
$starttime=$getGlobal->time;
$total_time = substr($starttime, 0, strpos($starttime, "."));
/*
echo $allTime."<br>";
echo $allPoints."<br>";
*/
$findstat="select * from stat where userid='$userid'";
$findstat=mysqli_query($con,$findstat);
$findstat=mysqli_num_rows($findstat);
if($findstat==0){
    $stat="INSERT INTO `stat`(`userid`,`organizationId`,`sessionId`,`time`,`points`,`total_time`,`timestamp`) VALUES ('$userid','$organizationId','$sessionId','$allTime','$allPoints','$total_time','$timestamp')";
    if(mysqli_query($con,$stat)){
        function successResponse($tools){
            $_SESSION['userPlayedCount']=1;
            $_SESSION['score']=$tools["points"];
            if($tools["isdemo"]){
                $_SESSION['uniqueMsg']="Thank you for playing. Challenge your peers to this game by subscribing now!";
            }else{
                $_SESSION['uniqueMsg']="Congratulations on completing the Race in ".$tools["time"]." mins.<br> Your score is ".$tools["points"];
            }
            echo json_encode(array("success"=>"true","final"=>"true"));
        }
        $data=["points"=>$allPoints,"time"=>$allTime];
        addReport($data);
    }else{
        echo mysqli_error($con)." error ";
    }
}

?>