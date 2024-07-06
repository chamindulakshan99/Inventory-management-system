<?php
    include("../config/connection.php");
    session_start();

    if(!isset($_SESSION['uname'])){
        header("location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Office Equipments</title>
    <link rel="stylesheet" href="../css/lab.css">
    <link rel="stylesheet" href="../css/main.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

</head>
<body>
    <?php include("../header/header.php");?> <hr>
    <div class="main-container">
       
<?php
    if(isset($_GET['search'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM o_items WHERE invoice_id = $id";
        $result = mysqli_query($con,$query);

        if(!$result){
            die("Database query failed.");
        }
        
        if(mysqli_num_rows($result) > 0){
            
?>

<div class="table-con">
<table style="width: 100%;">
        <thead>
            <tr>
                <th>No</th>
                <th>serial_number</th>
                <th>location</th>
                <th>working</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
                while($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td hidden = "hidden"><?php echo $row['invoice_id']?></a></td>
                    <td><?php echo $row['set_id']?></a></td>
                    <td><?php echo $row['serial_number']?></td>
                    <td><?php echo $row['location']?></td>
                    <td><?php echo $row['working']?></td>
                    <td>
                        <a href="updateItems.php?id=<?php echo $row['invoice_id'] ?>&setid=<?php echo $row['set_id'];?>" >Edit</a>
                    </td>
                </tr>
            <?php
                }
        }
    }
?>
        </tbody>
    </table>
</div>
    
    </div>
</body>
</html>