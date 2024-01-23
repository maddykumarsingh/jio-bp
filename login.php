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
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>  
    <main class="h-screen w-screen ">
        <form method="post" class="flex w-full h-full justify-center items-center flex-col space-y-4" action="login.php">
                <div>
                    <input name="username" class="border p-2 rounded-md" placeholder="Enter your username" type="text" placeholder="Enter Your username">
                </div>

                <button class="bg-green-300 px-6 py-1 rounded-md" type="submit">Start</button>
        </form>
    </main>
</body>
</html>