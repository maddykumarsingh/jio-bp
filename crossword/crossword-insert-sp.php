<?php
session_start();

include_once 'dao/config.php';
include_once '../add_report.php';

 $userid = $_SESSION['email'];
 $question = $_POST['question'];
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
                     $ans4d=  strtolower($_POST['ans4d']);
                     $ans4a=  strtolower($_POST['ans4a']);
                     $ans5=  strtolower($_POST['ans5']);
                     $ans6=  strtolower($_POST['ans6']);
                    $match_array = array("santulan","commitment","performance","serentica","solutions","Lean","convergence","concur");

                    $mat_array = array("$ans1","$ans2","$ans3","$ans4d","$ans4a","$ans5","$ans6");
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
                    $query= "INSERT INTO `crossword`(`userid`,`organizationId`,`sessionid`,`name`,`crossword_ans`,`crossword_score`,total_score,`time`,`timestamp`) VALUES ('" .$userid. "','" .$organizationId. "','" .$sessionid. "','" .$name. "','" .$showname1. "','" .$score1. "','" .$score1. "','".$time."','".$timestamp."')";

 		if($con->query($query)){
            		    $_SESSION['score']=1;
		    $_SESSION['uniqueMsg']="Your score ".$score1." out of 8";

 			   function successResponse($tools){
        			echo json_encode(array("success"=>"true","isdemo"=>$tools["isdemo"]));
    				}
      			 $data=["points"=>$score1,"time"=>$time];
       			addReport($data);

			}

}else{

echo json_encode(array("success"=>"true","isdemo"=>false));

}






?>