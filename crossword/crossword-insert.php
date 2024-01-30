<?php
session_start();

 include_once('../config/database.php');

 $username = $_SESSION['employeeId'];
 $session = $_SESSION['session'];
 $question = $_POST['question'];
 $time=$_POST['timer'];


 $ans1=  strtolower($_POST['ans1']);
 $ans2=  strtolower($_POST['ans2']);
 $ans3=  strtolower($_POST['ans3']);
 $ans4=  strtolower($_POST['ans4']);
 $ans5=  strtolower($_POST['ans5']);
 $ans6=  strtolower($_POST['ans6']);
 $ans7=  strtolower($_POST['ans7']);
 $ans8 =  strtolower($_POST['ans8']);




 $match_array = array("quality","trust","responsibility","prioritize","win","individualistic","clarity");
 $mat_array = array("$ans1","$ans2","$ans3","$ans4","$ans5","$ans6" ,"$ans7" , "$ans8");
 $r = array_map(function($match_array, $mat_array) {
     return $match_array == $mat_array;
 }, $match_array, $mat_array);

 $score			= count(array_filter($r));

           	  

                  

                    // $arr1=array($ans1,$ans2,$ans3,$ans4,$ans5,$ans6);
                    // $filtered_array1 = array_filter($arr1);
                    // $showname1=implode(",",$filtered_array1);

                
   
                    $gametype = 'downandacross';
                    $query = "INSERT INTO game_scores (employee_id, session, game_type, score , timer) VALUES (?, ?, ?, ? , ?)";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("sssis", $username, $session, $gametype , $score , $time);

                    if ($stmt->execute()) {
                        $_SESSION['score']=1;
		                $_SESSION['uniqueMsg']="Your score ".$score." out of 6";
                        echo json_encode(array("success"=>"true"));

                    } else {
                        echo "Error recording score: " . $stmt->error;
                        echo json_encode(array("success"=>"true","isdemo"=>false));
                    }

 	

?>