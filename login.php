<?php
session_start();
include_once('./config/database.php');


function generateRandomString($length = 16) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the username from the form submission
    $name = $_POST['name'];
    $email = $_POST['email'];
    $employeeId = $_POST['employeeId'];


    $query = "SELECT * FROM employees WHERE employee_id = ? AND employee_email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $employeeId, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Employee exists, fetch the details and store in session
        $row = $result->fetch_assoc();
        $_SESSION['employeeId'] = $row['employee_id'];
        $_SESSION['name'] = $row['employee_name'];
        $_SESSION['email'] = $row['employee_email'];
    } else {
        // Employee does not exist, create a new record using a prepared statement
        $employee_name = $_POST['employee_name'];
    
        $query = "INSERT INTO employees (employee_id, employee_name, employee_email) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $employeeId, $name, $email);
    
        if ($stmt->execute()) {
            // New record created successfully, store in session
            $_SESSION['employeeId'] = $employeeId;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
        } else {
            echo "Error creating record: " . $stmt->error;
        }
    }

    $_SESSION['session'] = generateRandomString(16);

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
    <style>


        .form {
            background:#00943a;
            width:80%; 
            border-radius:20px;
            padding: 10px;
            text-align: center;
            padding: 25px;
        }

        .form-input{
            background-color: #c5eca4;
            font-size: large;
            font-weight: bold;
            padding: 13px;
            margin: 4px;
            border-radius: 6px;
            border: 0;
            box-shadow: 0px 2px 0px #00943a
        }


        .form-input::placeholder{
            color:#acc389;
            font-size: large;
            font-weight: bold;
            padding: 5px;
            text-transform: uppercase;
        }

        .form-button{
            font-size: large;
            font-weight: bold;
            color:green; 
            background:#f8d100;
            text-transform: uppercase;
            padding: 10px 20px;
            border: 0;
            border-radius: 5px;
            cursor: pointer;
        }

        .input-group {
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>  
    <main >
    <div >
         <img width="100%" src="./crossword/dist/images/header-logo.png" alt="">
    </div>
    <div  style="height:80%; display:flex;justify-content: center;align-items: center;">

    <form class="form" method="post" action="login.php">
        <div class="input-group">
               <input  class="form-input"  name="name"  type="text" placeholder="Name">
                <input  class="form-input"  name="email"  type="text" placeholder="Email ID">
                <input  class="form-input"  name="employeeId"   type="text" placeholder="Employee ID">
        </div>
               

        <button class="form-button" type="submit">Login</button>
    </form>
        
    </div>
       
    </main>
</body>
</html>
