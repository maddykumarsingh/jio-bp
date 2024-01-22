<?php
session_start();
include_once 'dao/config.php';
include_once '../add_report.php';

 $userid = $_SESSION['userId'];
 $organizationId = $_SESSION['organizationId'];
 $v_sessionId = $_SESSION['v_sessionId'];
 $sessionId=$_SESSION['sessionId'];
 $time=$_POST["time"];
 $points=$_POST["points"];
 $answers=$_POST["answers"];
 $fullName=$_SESSION['firstName']." ".$_SESSION['lastName'];
 $email=$_SESSION['email'];

 if($_SESSION['v_sessionId']=="f3dc6b3a-4850-4c3a-92a5-9dd80f120952"){

    $timestamp = date('Y-m-d H:i:s');
    $query= "INSERT INTO `wordpuzzle`(`userid`, `organizationId`, `sessionId`,`v_sessionId`,`email`,`name`, `wordpuzzle_ans`, `time`, `points`, `timestamp`,`method`) VALUES ('$userid','$organizationId','$sessionId','$v_sessionId','$email','$fullName','$answers','$time','$points','$timestamp','free')";
    if($con->query($query)){

        $_SESSION['uniqueMsg']="Your score is ".$points."";
            echo json_encode(array("success"=>true,"isdemo"=>$tools["isdemo"]));
       
}


 }else{

    
    $timestamp = date('Y-m-d H:i:s');
    $query= "INSERT INTO `wordpuzzle`(`userid`, `organizationId`, `sessionId`,`v_sessionId`,`email`,`name`, `wordpuzzle_ans`, `time`, `points`, `timestamp`,`method`) VALUES ('$userid','$organizationId','$sessionId','$v_sessionId','$email','$fullName','$answers','$time','$points','$timestamp','free')";
    if($con->query($query)){

        function successResponse($tools){
            $_SESSION['userPlayedCount']=1;
            $_SESSION['score']=$tools["points"];
            if($tools["isdemo"]){
                $_SESSION['uniqueMsg']="Your score is ".$tools["points"]."";
            }else{
                $_SESSION['uniqueMsg']="Your score is ".$tools["points"]."";
            }
            echo json_encode(array("success"=>true,"isdemo"=>$tools["isdemo"]));
        }
        $data=["points"=>$points,"time"=>$time];
        addReport($data);
}


 }

     




?>