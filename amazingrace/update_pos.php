<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
include_once 'dao/config.php';
error_reporting(0);
$userid=$_SESSION['userId'];
$organizationId=$_SESSION['organizationId'];
$sessionId=$_SESSION['sessionId'];
$pos=$_POST["pos"];
$query="UPDATE `currentgame` SET `pos`='$pos' WHERE userid='$userid'";
if(mysqli_query($con,$query)){
    if($_SESSION['firstName']=="demo"){
        if($pos==1){
            if(function_exists('date_default_timezone_set')) {
                date_default_timezone_set("Asia/Kolkata");
            }
            $timestamp = date('Y-m-d H:i:s');
            $update_lasttime="UPDATE `currentgame` SET `timestamp_end`='$timestamp' WHERE userid='$userid' and organizationId='$organizationId' and sessionId='$sessionId'";
            mysqli_query($con,$update_lasttime);
            include_once 'stat_calculate.php';
        }
    }else{
        if($pos==5){
            if(function_exists('date_default_timezone_set')) {
                date_default_timezone_set("Asia/Kolkata");
            }
            $timestamp = date('Y-m-d H:i:s');
            $update_lasttime="UPDATE `currentgame` SET `timestamp_end`='$timestamp' WHERE userid='$userid' and organizationId='$organizationId' and sessionId='$sessionId'";
            mysqli_query($con,$update_lasttime);
            include_once 'stat_calculate.php';
        }else{
            echo json_encode(array("success"=>"true","final"=>"false"));
        }
    }
}else{
    echo "something went wrong".mysqli_error($con);
}
?>