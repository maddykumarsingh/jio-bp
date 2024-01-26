<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the username from the form submission
    $username = $_POST['username'];

    // Set the username in the session
    $_SESSION['username'] = $username;

    // Redirect to index.php
    header('Location: index.php');
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <title>JIO BP | START YOUR SESSION</title>
</head>
<body>  
    <main >
    <div >
         <img width="100%" src="./crossword/dist/images/header-logo.png" alt="">
    </div>
        <form method="post" action="login.php">
            <div>
                <input name="username"  placeholder="Enter your username" type="text" placeholder="Enter Your username">
            </div>

            <button  type="submit">Start</button>
        </form>
    </main>
</body>
</html>
