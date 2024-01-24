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
</head>
<body>

<div style="    display: flex;
    flex-direction: column;
    align-items: baseline;">
<a style="text-decoration: none;
    padding: 16px 35px;
    background: #00943b;
    color: white;
    margin: 10px;" href="./crossword">
       Down and Accross 
    </a>

    <a style="text-decoration: none;
    padding: 16px 35px;
    background: #00943b;
    color: white;
    margin: 10px;" href="./wheretheword">
       Where is the Word
    </a>

    
    
</div>

   
</body>
</html>