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
    <title>Master Admin</title>
    <link rel="stylesheet" href="../css/lab.css">
    <link rel="stylesheet" href="../css/main.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

<style>
.table-con {
    width:1050px;
  }
.addnew{
    color:#1690A7; margin:25px; text-decoration:underline; border:none; background-color:#fff;border-radius:10px; padding:5px;
}
  
    @media screen and (max-width: 667px) {
  .table-con {
    width:350px;
  }
  .addnew{
      font-size:9px;
    color:#1690A7; margin:10px; text-decoration:underline; border:none; background-color:#fff;border-radius:10px; padding:2px;
}
}
</style>
</head>
<body>
    
   <?php include("../header/header.php") ?> <hr>
  
    <div  class="main-container">
        <h1 style="text-align:center; font-size: 25px; margin: 25px;">MasterAdmin Dashboard </h1>
        <div class="link">
            <a href="../login/register.php" class="addnew">Add New Admin</a>
        </div>

        <div class="table-con" >
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
                <td><?php echo ($row['username'])?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['tp']?></td>
                <td><?php echo $row['role']?></td>
                <td><?php if($row['id'] == 2){ ?>
                    <a href="../login/register.php?id=2">Update</a>
                <?php    
                }else{ ?>
                        <form method="post" action="actionAdmin.php">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button class="logout" type="submit" name="remove" onclick="return confirm('Are you sure to remove this record ?')" style="margin:5px;background-color: #ff0000; color: #ffffff; border: none; padding: 5px 10px; cursor: pointer;">Remove</button>
                        </form></td><?php
                } ?>
            
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