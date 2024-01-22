<?php
 ob_start();
 session_start();


error_reporting(0);
define(PER_PAGE, '50');
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'OpenSpace';
	$dbname = 'liberty_amazing_race';
	$base_url = "";
		
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');
		
	$db_selected = mysqli_select_db( $conn,$dbname);
	//echo "hii";exit;
	if (!$db_selected) {
	   die ('Can\'t use foo : ' . mysqli_error());
	}
 $sql = "SELECT t2.emp_name,t2.emp_id,t2.division,t1.time,t1.points,t1.time as gametime,t1.total_time,t1.timestamp FROM stat t1 LEFT JOIN employeemaster_navrang t2 ON t1.userid= t2.id where t1.userid=t2.id order by t1.points desc,t1.time ASC";

$qur = mysqli_query($conn,$sql);
 
// Enable to download this file
$filename = "amazing_race_stat.csv";
 
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