<?php
session_start();
include_once 'dao/config.php';
include_once '../add_report.php';

 $userid = $_SESSION['userId'];
 $gameId = $_SESSION['gameId'];
 
 $organizationId = $_SESSION['organizationId'];
 $sessionId=$_SESSION['sessionId'];
 
 $_SESSION['yourscore'] =  $_POST['points'];

 $time=$_POST["time"];
 $points=$_POST["points"];
 $answers=$_POST["answers"];
 $fullName=$_SESSION['firstName']." ".$_SESSION['lastName'];
 $roles=$_SESSION['roles'];
 

        $timestamp = date('Y-m-d H:i:s');
        $query= "INSERT INTO `wordpuzzle`(`userid`, `organizationId`, `sessionId`,`email`,`name`, `wordpuzzle_ans`, `time`, `points`,`user_type`, `timestamp`,`method`) VALUES ('$userid','$organizationId','$sessionId','$email','$fullName','$answers','$time','$points','$roles','$timestamp','free')";
        if($con->query($query)){
            if($roles=="GUEST_USER"){
                function successResponse($tools){

                    //print_r($tools);
                    $_SESSION['userPlayedCount']=1;
                    $_SESSION['score']=$tools["points"];
                    if($tools["isdemo"]){
                        $_SESSION['uniqueMsg']="Your score is ".$tools["points"]."";
                    }else{
                        $_SESSION['uniqueMsg']="Your score is ".$tools["points"]."";
                    }
                    echo json_encode(array("success"=>true,"isdemo"=>$tools["isdemo"],"score"=>$tools["points"]));
                }

                $data=["gameId"=>$gameId,"name"=>$fullName,"sessionId"=>$sessionId,"userId"=>$userid,"organizationId"=>$organizationId,"points"=>$points,"time"=>$time,"ans"=>""];
                addReportGuest($data);

            }else{
                function successResponse($tools){
                    $_SESSION['userPlayedCount']=1;
                    $_SESSION['score']=$tools["points"];
                    if($tools["isdemo"]){
                        $_SESSION['uniqueMsg']="Your score is ".$tools["points"]."";
                    }else{
                        $_SESSION['uniqueMsg']="Your score is ".$tools["points"]."";
                    }
                    echo json_encode(array("success"=>true,"isdemo"=>$tools["isdemo"],"score"=>$tools["points"]));
                }
                $data=["points"=>$points,"time"=>$time];
                addReport($data);

            }

           
    }

?>