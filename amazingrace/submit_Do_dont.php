<?php 

session_start();
include_once 'dao/config.php';
error_reporting(0);
$userid=$_SESSION["userId"];
$time=$_POST["time"];
$points=$_POST["points"];
$answers=$_POST["answers"];
if(function_exists('date_default_timezone_set')) {
    date_default_timezone_set("Asia/Kolkata");
}
if(isset($_GET["skip"])){
    $time="00:00:00";
    $points=0;
    $answers="skip";
}
$timestamp = date('Y-m-d H:i:s');
$query="INSERT INTO `do_dont`(`useid`, `ans`, `points`, `time`, `timestamp`) VALUES ('$userid','$answers','$points','$time','$timestamp')";
if(mysqli_query($con,$query)){
    echo "1010";
}else{
    echo "something went wrong".mysqli_error($con);
}
?>