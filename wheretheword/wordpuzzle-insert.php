<?php
session_start();
include_once('../config/database.php');


 $time=$_POST["time"];
 $score=$_POST["points"];
 $answers=$_POST["answers"];
 $username=$_SESSION['employeeId'];
 $session = $_SESSION['session'];



 

$gametype = 'wheretheword';
$query = "INSERT INTO game_scores (employee_id, session, game_type, score , timer) VALUES (?, ?, ?, ? , ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("sssis", $username, $session, $gametype , $score , $time);

if ($stmt->execute()) {
    $_SESSION['score']=1;
    $_SESSION['uniqueMsg']="Your score ".$score." out of 6";
    echo json_encode(array("success"=>"true" , "score" => $score));

} else {
    echo "Error recording score: " . $stmt->error;
    echo json_encode(array("success"=>"true"));
}


     




?>