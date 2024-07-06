<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <div class="nav-bar">
        <div class="header_1">
            <a href="../admin/index.php"><h1>UOJ DCS IMS </h1></a>
        </div>

        <div class="header_2">
            <ul>
                <li class="lab"><a href="../lab/lab.php" >Lab Equipments</a>
                    <ul class="dropdown">
                        <li><a href="../lab/lab.php" >Lab Equipments</a></li>
                        <li><a href="../lab/addData.php">Add Lab Equipments</a></li>
                    </ul>
                </li>

                <li class="office"><a href="../office/office.php">Office Equipments</a>
                    <ul class="dropdown">
                        <li><a href="../office/office.php">Office Equipments</a></li>
                        <li><a href="../office/addData.php">Add Office Equipments</a></li>
                    </ul>
                </li>
                <li class="furniture"><a href="../furniture/furniture.php">Furniture</a>
                    <ul class="dropdown">
                        <li><a href="../furniture/furniture.php">Furniture</a></li>
                        <li><a href="../furniture/addData.php">Add Furniture</a></li>
                    </ul>
                </li>
            </ul>

        </div>

        <div class="inside_1">
            
        <a href="../login/logout.php" class="logout">Log Out</a>
      
        <?php 

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $username = $_SESSION['uname'];
            $query = "SELECT role FROM admin WHERE username = '$username' ";
            $result = mysqli_query($con,$query);
            $row = mysqli_fetch_assoc($result);
            if ('masteradmin' == $row['role']) {
                ?>
                <a href="../admin/masterAdminAction.php">
                    <img src="../Multimedia/user.png" alt="user">
                </a>
                <?php
            } else {
                ?>
                <a href="../admin/adminAction.php">
                    <img src="../Multimedia/user.png" alt="user">
                </a>
                <?php
            }
        ?>
        </div>
    </div>


</body>
</html>