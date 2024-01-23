<?php 

    if( !$_SESSION['user'] ){
         header('Location:login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <a href="./crossword">
       Cross Word
    </a>

    <a href="">
       Amazing Word
    </a>

    <a href="">
        Word
    </a>
    
</body>
</html>