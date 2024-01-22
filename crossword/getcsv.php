<?php

error_reporting(E_ALL);
define(PER_PAGE, '50');

  $dbhost = 'extramileplay-php-db.czyfwf6hejqk.ap-south-1.rds.amazonaws.com';
  $dbuser = 'root';
  $dbpass = 'milesplay';
  $dbname = 'extramileplay_crossword';
  $base_url = "";
  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die('Error connecting to mysql');

  $sql='SELECT DISTINCT userid,time,crossword_score,crossword_ans,name,organizationId,sessionid,user_type,timestamp from crossword where organizationId="543f589c-c00a-457d-bd30-b4ea65129057" GROUP BY(userid) order by total_score desc,time asc';

  $qur = mysqli_query($conn,$sql);

  $filename = "extramileplay_crossword.csv";
 
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