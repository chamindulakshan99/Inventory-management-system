<?php
    include("../config/connection.php");

    session_start();

    if(!isset($_SESSION['uname'])){
        header("location: ../login/login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management System</title>

    <style>

        body

         {
            background-image: url('../image/img5.jpg'); 
            background-size: cover; 
            background-repeat: no-repeat; 
            margin: 0;
            overflow: hidden;
        }

        .animation-container

         {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .animated-text 
        
        {
            font-size: 64px; 
            font-weight: bold;
            animation: rainbowText 3s infinite;
            background: linear-gradient(45deg, #ff5733, #ffbd33, #ff3333, #ff33a6, #a633ff, #33a6ff, #33ffbd); 
            background-size: 150%;
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            margin-bottom: 30px; 
        }

        @keyframes rainbowText
        
        {
            0% {
                background-position: 0%;
            }
            100% {
                background-position: 100%;
            }
        }


        .sub-title
        
        {
            font-size: 48px; 
            color: #33ffbd; 
        }

    </style>
    
</head>
<body>
    <?php include("../header/header.php");?> <hr>
    <div class="animation-container">

        <div class="animated-text">INVENTORY Management System</div>

        <div class="sub-title">--D-C-S--</div>

    </div>
</body>
</html>