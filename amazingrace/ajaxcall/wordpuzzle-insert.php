<?php
session_start();

include_once '../dao/config.php';

 $userid = $_SESSION['userId'];
 $question = $_POST['question'];
//  print_r($_POST);

if(function_exists('date_default_timezone_set')) {
    date_default_timezone_set("Asia/Kolkata");
}


$checkUserExist="select * from `wordpuzzle` WHERE `userid`='$userid'";
//print_r($checkUserExist);
$checkUserExist=mysqli_query($con,$checkUserExist);
$checkUserExistTable=mysqli_num_rows($checkUserExist);
//echo $checkUserExistTable;
if($checkUserExistTable>0){
    echo "all";

} else{
            $time=$_POST['timer'];
                $ans1=  $_POST['ans1'];
                $ans2=  $_POST['ans2'];
                $ans3=  $_POST['ans3'];
                $ans4=  $_POST['ans4'];
                $ans5=  $_POST['ans5'];
                $ans6=  $_POST['ans6'];
                    $match_array = array("Teamwork","Empathy","Respect","Support","Integrity","Agility");
                    $mat_array = array("$ans1","$ans2","$ans3","$ans4","$ans5","$ans6");
                    $r = array_map(function($match_array, $mat_array) {
                        return $match_array == $mat_array;
                    }, $match_array, $mat_array);

                    $score1			= count(array_filter($r));

                    $arr1=array($ans1,$ans2,$ans3,$ans4,$ans5,$ans6);
                    $filtered_array1 = array_filter($arr1);
                    $showname1=implode(",",$filtered_array1);

                    if(function_exists('date_default_timezone_set')) {
                        date_default_timezone_set("Asia/Kolkata");
                    }
                    $timestamp = date('Y-m-d H:i:s');

                    $query= "INSERT INTO `wordpuzzle`(`userid`,`wordpuzzle_ans`,`wordpuzzle_score`,total_score,`time`,`timestamp`) VALUES ('" .$userid. "','" .$showname1. "','" .$score1. "','" .$score1. "','".$time."','".$timestamp."')";
                    if($con->query($query)){
                        echo "1";
                }
    
}




?>