<?php 
    session_start();
    if( !$_SESSION['username'] ){
            header('Location:login.php');
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
            height: 100%;
            width: 100%;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }


        .item {
            text-decoration: none;
            padding: 16px 35px;
            background: #00943b;
            color: white;
            margin: 10px;
            border-radius: 10px;
        }

    </style>
</head>
<body >
<div >
         <img width="100%" src="./crossword/dist/images/header-logo.png" alt="">
    </div>
<div class="list">
<a class="item" href="./crossword">
       Down and Accross 
    </a>

    <a class="item" href="./wheretheword">
       Where is the Word
    </a>

    
    
</div>

   
</body>
</html>