<?php
    session_start();
   include("../config/connection.php");
    if(isset($_POST['login'])){

        
        $password = $_POST['password'];
        $uname = $_POST['uname'];

        $query = "SELECT * FROM admin WHERE username = '$uname'";
        $result = mysqli_query($con,$query);

        if($result){
            $row = mysqli_fetch_assoc($result);
            if($row){
                if(password_verify($password,$row['password'])){
                    $_SESSION['uname'] = $row['username'];
                    $_SESSION['role'] = $row['role'];
                    
                    if ($row['role'] == 'admin') {
                        header("location: ../admin/index.php");
                    } else {
                        header("location: ../admin/index.php");
                    }
                    
                    
                    
                    
                }
                else{
                    echo "<script>alert('Password is Wrong.')</script>";
                }
            }
            else{
                echo "<script>alert('User name  Wrong.')</script>";
            }
        }
    }    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    
<div class="container">

    
<div class="sub-container">
    <div class="sub-container-left">
        <img class="tilt" src="../Multimedia/img-01.webp">
    </div>

    <div class="sub-container-right">
    <h1>UOJ DCS IMS</h1>
        <h1>Login</h1>
        <form action="login.php" method="Post">

        <div class="input-container">
                <input type="text" name="uname" placeholder="Username" required  />
            </div>

            <div class="input-container">
                <input type="password" name="password" placeholder="Password" value="" />
            </div>
 
            <input type="submit" class="button" name="login" value="Login" />
        </form>
        
    </div>
</div>
</body>
</html>