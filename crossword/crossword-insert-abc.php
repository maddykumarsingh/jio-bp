<?php
session_start();

include_once 'dao/config.php';
include_once '../add_report.php';

 $userid = $_SESSION['userId'];
 $question = $_POST['question'];
 $roles=$_SESSION['roles'];
 $gameId = $_SESSION['gameId'];
 //echo $roles;
$organizationId=$_SESSION['organizationId'];
$sessionid=$_SESSION['sessionId'];
$name=$_SESSION['firstName']." ".$_SESSION['lastName'];
if(function_exists('date_default_timezone_set')) {
    date_default_timezone_set("Asia/Kolkata");
}

     $sql="select * from crossword where userid='$userid' and organizationId='$organizationId' and sessionid='$sessionid'";
     $sql=mysqli_query($con,$sql);
     $sql=mysqli_num_rows($sql);
     
     if($sql==0){

           	  $time=$_POST['timer'];
                     $ans1=  strtolower($_POST['ans1']);
                     $ans2=  strtolower($_POST['ans2']);
                     $ans3=  strtolower($_POST['ans3']);
                     $ans4=  strtolower($_POST['ans4']);
                    
                     $ans5=  strtolower($_POST['ans5']);
                     $ans6=  strtolower($_POST['ans6']);
                     $ans7=  strtolower($_POST['ans7']);
                     $ans8=  strtolower($_POST['ans8']);
                     $ans9=  strtolower($_POST['ans9']);
                    $match_array = array("jointlife","grace","nominee","deathbenefit","insurance","maturity","lapse","quote","terminate");

                    $mat_array = array("$ans1","$ans2","$ans3","$ans4","$ans5","$ans6","$ans7","$ans8","$ans9");
                    $r = array_map(function($match_array, $mat_array) {
                        return $match_array == $mat_array;
                    }, $match_array, $mat_array);

                    $score1= count(array_filter($r));

                    $arr1=array($ans1,$ans2,$ans3,$ans4,$ans5,$ans6,$ans7,$ans8,$ans9);
                    $filtered_array1 = array_filter($arr1);
                    $showname1=implode(",",$filtered_array1);

                    if(function_exists('date_default_timezone_set')) {
                        date_default_timezone_set("Asia/Kolkata");
                    }
                    $timestamp = date('Y-m-d H:i:s');
                    $query= "INSERT INTO `crossword`(`userid`,`organizationId`,`sessionid`,`name`,`crossword_ans`,`crossword_score`,total_score,`user_type`,`time`,`timestamp`) VALUES ('" .$userid. "','" .$organizationId. "','" .$sessionid. "','" .$name. "','" .$showname1. "','" .$score1. "','" .$score1. "','".$roles."','".$time."','".$timestamp."')";

                    $_SESSION['yourscore']= $score1;
                    
                if($con->query($query)){

                    if($roles=="GUEST_USER"){
                        
                
                        $_SESSION['score']=1;
                        $_SESSION['uniqueMsg']="Your score ".$score1." out of 9";
                
                        function successResponse($tools){
                            echo json_encode(array("success"=>"true","isdemo"=>$tools["isdemo"]));
                        }
                        //$score1=(int)$score1;
                        $data=["gameId"=>$gameId,"name"=>$name,"sessionId"=>$sessionid,"userId"=>$userid,"organizationId"=>$organizationId,"points"=>$score1,"time"=>$time,"ans"=>"$showname1"];
                
                    }else{
                                $_SESSION['score']=1;
                            $_SESSION['uniqueMsg']="Your score ".$score1." out of 9";

                        function successResponse($tools){
                                echo json_encode(array("success"=>"true","isdemo"=>$tools["isdemo"]));
                                }
                            $data=["points"=>$score1,"time"=>$time];

                        }
                }

}else{

echo json_encode(array("success"=>"true","isdemo"=>false));

}






?>