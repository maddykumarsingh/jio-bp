<?php
ob_start();
error_reporting(0);
session_start();
include_once 'classes/LoggerClass.php';
include_once 'dao/config.php';
include_once 'classes/LoginClass.php';
include_once 'classes/PdoClass.php';
include_once 'classes/MessageClass.php';
include_once 'classes/FormValidator.php';
include_once 'classes/Eventregister.php';
$objmessageClass = new MessageClass();
$objloginClass = new LoginClass();
$objpdoClass = new PdoClass();
$objEveRegeClass = new Eventregister();
 $result = $objEveRegeClass->getLeaderBoard($connPdo, $objpdoClass);

?>

<!DOCTYPE html>
<html>

<head>
        <meta charset="utf-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">

 <style>
    table {
        margin-bottom: 20px;
    }

    tr th {
        font-size: 16px;
        text-align: center;
        padding: 5px;
        border: 2px solid #ffffff;
        color: #ffffff;
        background-color: black;
    }

    tr td {
        border: 2px solid #ffffff;
    }

    tr td:nth-child(1) {
        font-size: 16px;
        font-weight: 900;
        text-align: center;
        padding: 5px;
        color: #ffffff;
        background-color: #ed1e3c;
    }

    tr td:nth-child(2) {
        font-size: 16px;
        font-weight: 900;
        text-align: center;
        padding: 5px;
        color: #ffffff;
        background-color: black;
    }

    tr td:nth-child(3) {
        font-size: 16px;
        font-weight: 900;
        text-align: center;
        padding: 5px;
        color: #ffffff;
        background-color: #ed1e3c;
    }

    tr td:nth-child(4) {
        font-size: 16px;
        font-weight: 900;
        text-align: center;
        padding: 5px;
        color: #ffffff;
        background-color: #942c2d;
    }
    </style>
</head>

<body style="background:#ffb600;">
    <div class="container-fluid" style="margin-top:10px;">
    <div class="row">
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-5 auto">
                <img src="img/logo.png" class="img-fluid " style=""/>
            </div>
       
        <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12 auto">
                <h3 style="font-size: 35px;color:black;text-align: center;margin: 30px 0px 42px;font-weight: 900;">
                    Leaderboard</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7 col-md-7 col-lg-7 col-xs-12 auto">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 auto">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 auto">
                        <table border="1" width="100%">
                            <tr>
                                <th>Name</th>
                                <th>Employee Code</th>
                                <th>Score</th>
                                <th>Duration</th>
                            </tr>
                            <tr>
                                <td><?php if(empty($result[0]['name1'])){ echo "--";}else{ echo $result[0]['name1']; };?>
                                </td>
                                <td><?php if(empty($result[0]['Emp_Id'])){ echo "--";}else{ echo $result[0]['Emp_Id'];};?>
                                </td>
                                <td><?php if(empty($result[0]['points'])){ echo "--";}else{ echo $result[0]['points'];};?>
                                </td>
                                <td><?php if(empty($result[0]['time'])){ echo "00";}else{ echo $result[0]['time'];};?>
                                </td>
                            </tr>
                            <tr>
                                <td><?php if(empty($result[1]['name1'])){ echo "--";}else{ echo $result[1]['name1'];};?>
                                </td>
                                <td><?php if(empty($result[1]['Emp_Id'])){ echo "--";}else{ echo $result[1]['Emp_Id'];};?>
                                </td>
                                <td><?php if(empty($result[1]['points'])){ echo "--";}else{ echo $result[1]['points'];};?>
                                </td>
                                <td><?php if(empty($result[1]['time'])){ echo "00";}else{ echo $result[1]['time'];};?>
                                </td>

                            </tr>
                            <tr>
                                <td><?php if(empty($result[2]['name1'])){ echo "--";}else{ echo $result[2]['name1'];};?>
                                </td>
                                <td><?php if(empty($result[2]['Emp_Id'])){ echo "--";}else{ echo $result[2]['Emp_Id'];};?>
                                </td>
                                <td><?php if(empty($result[2]['points'])){ echo "--";}else{ echo $result[2]['points'];};?>
                                </td>
                                <td><?php if(empty($result[2]['time'])){ echo "00";}else{ echo $result[2]['time'];};?>
                                </td>
                            </tr>
                            <tr>
                                <td><?php if(empty($result[3]['name1'])){ echo "--";}else{ echo $result[3]['name1'];};?>
                                </td>
                                <td><?php if(empty($result[3]['Emp_Id'])){ echo "--";}else{ echo $result[3]['Emp_Id'];};?>
                                </td>
                                <td><?php if(empty($result[3]['points'])){ echo "--";}else{ echo $result[3]['points'];};?>
                                </td>
                                <td><?php if(empty($result[3]['time'])){ echo "00";}else{ echo $result[3]['time'];};?>
                                </td>
                            </tr>
                            <tr>
                                <td><?php if(empty($result[4]['name1'])){ echo "--";}else{ echo $result[4]['name1'];};?>
                                </td>
                                <td><?php if(empty($result[4]['Emp_Id'])){ echo "--";}else{ echo $result[4]['Emp_Id'];};?>
                                </td>
                                <td><?php if(empty($result[4]['points'])){ echo "--";}else{ echo $result[4]['points'];};?>
                                </td>
                                <td><?php if(empty($result[4]['time'])){ echo "00";}else{ echo $result[4]['time'];};?>
                                </td>
                            </tr>
 			<tr>
                                <td><?php if(empty($result[5]['name1'])){ echo "--";}else{ echo $result[5]['name1']; };?>
                                </td>
                                <td><?php if(empty($result[5]['Emp_Id'])){ echo "--";}else{ echo $result[5]['Emp_Id'];};?>
                                </td>
                                <td><?php if(empty($result[5]['points'])){ echo "--";}else{ echo $result[5]['points'];};?>
                                </td>
                                <td><?php if(empty($result[5]['time'])){ echo "00";}else{ echo $result[5]['time'];};?>
                                </td>
                            </tr>
                            <tr>
                                <td><?php if(empty($result[6]['name1'])){ echo "--";}else{ echo $result[6]['name1'];};?>
                                </td>
                                <td><?php if(empty($result[6]['Emp_Id'])){ echo "--";}else{ echo $result[6]['Emp_Id'];};?>
                                </td>
                                <td><?php if(empty($result[6]['points'])){ echo "--";}else{ echo $result[6]['points'];};?>
                                </td>
                                <td><?php if(empty($result[6]['time'])){ echo "00";}else{ echo $result[6]['time'];};?>
                                </td>
                            </tr>
                            <tr>
                                <td><?php if(empty($result[7]['name1'])){ echo "--";}else{ echo $result[7]['name1'];};?>
                                </td>
                                <td><?php if(empty($result[7]['Emp_Id'])){ echo "--";}else{ echo $result[7]['Emp_Id'];};?>
                                </td>
                                <td><?php if(empty($result[7]['points'])){ echo "--";}else{ echo $result[7]['points'];};?>
                                </td>
                                <td><?php if(empty($result[7]['time'])){ echo "00";}else{ echo $result[7]['time'];};?>
                                </td>
                            </tr>
                            <tr>
                                <td><?php if(empty($result[8]['name1'])){ echo "--";}else{ echo $result[8]['name1'];};?>
                                </td>
                                <td><?php if(empty($result[8]['Emp_Id'])){ echo "--";}else{ echo $result[8]['Emp_Id'];};?>
                                </td>
                                <td><?php if(empty($result[8]['points'])){ echo "--";}else{ echo $result[8]['points'];};?>
                                </td>
                                <td><?php if(empty($result[8]['time'])){ echo "00";}else{ echo $result[8]['time'];};?>
                                </td>
                            </tr>
                            <tr>
                                <td><?php if(empty($result[9]['name1'])){ echo "--";}else{ echo $result[9]['name1'];};?>
                                </td>
                                <td><?php if(empty($result[9]['Emp_Id'])){ echo "--";}else{ echo $result[9]['Emp_Id'];};?>
                                </td>
                                <td><?php if(empty($result[9]['points'])){ echo "--";}else{ echo $result[9]['points'];};?>
                                </td>
                                <td><?php if(empty($result[9]['time'])){ echo "00";}else{ echo $result[9]['time'];};?>
                                </td>
                            </tr>


                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

</body>

</html>