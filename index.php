<?php
session_start(); // Start the session

// Check if the required session variables are not set
if (!isset($_SESSION['name']) || !isset($_SESSION['email']) || !isset($_SESSION['employeeId'])) {
    // Redirect to the login page
    header("Location: login.php");
    exit(); // Ensure that no other code is executed after the redirect
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JIO BP</title>
    <style>
        body {
            margin: 0;
            background-image: url(./crossword/dist/images/background.jpg);
            width: 100vw;
            height: 100vh;
        }
        
        .list {
            width: 100%;
            margin-top: 5%;
            display: flex;
            justify-content: center;
            flex-direction: row;
            align-items: center;
        }


        .item {
            text-decoration: none;
            color: white;
            background-color:#cee69f;
            margin: 10px;
            border-radius: 10px;
            width:250px; 
            height:200px;
            padding:10px; 
            cursor: pointer;
        }

        .item > a {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

    </style>
</head>
<body >
<div >
         <img width="100%" src="./crossword/dist/images/header-logo.png" alt="">
    </div>

    <div style="display: flex; justify-content: center; align-items: center; margin-top: 20px;">
        <img width="80%" src="./dist/images/header.png" alt="">
    </div>

     <div class="list">
            <div  class="item" >
                <a href="./crossword">
                    <img width="50%" src="./crossword/dist/images/welcome-logo.png" alt="">
                </a>
            </div>

            <div class="item">
                    <a  href="./wheretheword">
                    <img width="50%" src="./wheretheword/images/welcome-logo.png" alt="">
                    </a>
            </div>
        </div>

   
</body>
</html>