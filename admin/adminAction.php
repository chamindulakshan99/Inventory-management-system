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
    <title>Admin</title>
    <link rel="stylesheet" href="../css/lab.css">
    <link rel="stylesheet" href="../css/main.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

</head>
<body>
    
   <?php include("../header/header.php") ?> <hr>
  
    <div  class="main-container">
        <h1 style="text-align:center; font-size: 25px; margin: 25px;">Admin Dashboard </h1>

        <div class="table-con">
        <table>
        <thead> 
            <th>Name</th>
            <th>User Name</th>
            <th>email</th>
            <th>Phone Number</th>
            <th>Role</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
              $qeury = "SELECT * FROM admin";
              $result = mysqli_query($con,$qeury);
        
              while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['username']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['tp']?></td>
                <td><?php echo $row['role']?></td>
                <?php if($row['username'] == $_SESSION['uname']){ ?>
                    <td><a href="../login/register.php?id=<?php $row['id']?>">Update</a></td>
                <?php    
                }   ?>
            
            </tr>
            <?php
            
            }
            ?>
        </tbody>
    
    </table>

        </div>
    </div>
    
    
    
    
    

</body>

</html>