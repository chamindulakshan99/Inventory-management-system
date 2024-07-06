<?php
   include("../config/connection.php");
   session_start();
   if(!isset($_SESSION['uname'])){
       header("location: ../login/login.php");
       exit();
   }

    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $query = "SELECT * FROM admin WHERE id='$id'";
        $result = mysqli_query($con,$query);

        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/register.css">

</head>

<body>
    <div class="container">

        <div class="sub-container"  style = "padding: 4rem">
            <div class="sub-container-left" >
                <img class="tilt" src="../Multimedia/img-01.webp">
            </div>
            
           <div class="sub-container-right">
                <h1> <?php if(isset($_GET['id'])){echo "Update Admin Details";} else{echo 'Sign Up';} ?> </h1>
                <form action="../admin/actionAdmin.php" method="POST">
            
                    <input type="hidden" name="id" placeholder="ID" value="<?php if(isset($_GET['id'])){echo $row['id'];} ?>"/> 
                 
                    <input type="text" name="name" placeholder="Name" value="<?php if(isset($_GET['id'])){echo $row['name'];} ?>" required/> 

                    <input type="text" name="uname" placeholder="Username" value="<?php if(isset($_GET['id'])){echo $row['username'];} ?>" required/> 
                
                    <input type="email" name="email" placeholder="Email" value="<?php if(isset($_GET['id'])){echo $row['email'];} ?>" required/> 
                
                    <input type="text" name="tpnumber" placeholder="Telephone" value="<?php if(isset($_GET['id'])){echo $row['tp'];} ?>" required/>

                    <input type="hidden" name="role" value="<?php if(isset($_GET['id'])){echo $row['role'];} ?>" required/>

                    <input type="password" name="password" placeholder="Password" value="" required/> 
                 
                    <input type="password" name="c_password" placeholder="Confirm Password" value="" required/> 

                    <input type="submit" class="button" name="<?php if(isset($_GET['id'])){echo "update";} else{echo 'register';} ?>" value="<?php if(isset($_GET['id'])){echo "Update";} else{echo 'Register';} ?>" />

                    
                </form>
            </div>
    </div>
</body>
</html>