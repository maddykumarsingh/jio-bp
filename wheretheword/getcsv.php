<?php
 ob_start();
 session_start();
 include_once 'dao/config.php';

$sql = 'SELECT email,name,organizationId,sessionId,time,points,wordpuzzle_ans,timestamp from wordpuzzle where organizationId="543f589c-c00a-457d-bd30-b4ea65129057" order by time desc,points asc';

$qur = mysqli_query($con,$sql);
 
// Enable to download this file
$filename = "wordpuzzle.csv";
 
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: text/csv");
 
$display = fopen("php://output", 'w');
 
$flag = false;
while($row = mysqli_fetch_assoc($qur)) {
    if(!$flag) {
      // display field/column names as first row
      fputcsv($display, array_keys($row), ",", '"');
      $flag = true;
    }
    fputcsv($display, array_values($row), ",", '"');
  }
 
fclose($display);