<?php
 ob_start();
 session_start();


error_reporting(0);
define(PER_PAGE, '50');
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'OpenSpace';
	$dbname = 'raymond_amazing_race';
	$base_url = "";
		
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');
		
	$db_selected = mysqli_select_db( $conn,$dbname);
	//echo "hii";exit;
	if (!$db_selected) {
	   die ('Can\'t use foo : ' . mysqli_error());
	}
 $sql = "SELECT t2.emp_name as name1,t2.emp_code as Emp_Id,t2.emp_email as email,t1.`points` as points,t1.`total_time` as time FROM stat t1 LEFT JOIN employeemaster_navrang t2 ON t1.userid= t2.id where t1.`total_time`!='NULL' order by points desc,time asc";

$qur = mysqli_query($conn,$sql);
 
// Enable to download this file
$filename = "raymond_amazing_race.csv";
 
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