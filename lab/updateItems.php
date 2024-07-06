<?php
    include("../config/connection.php");
    session_start();

    if(!isset($_SESSION['uname'])){
        header("location: ../login/login.php");
        exit();
    }
    
    $queryinvoice = "SELECT * FROM invoice";
    $result = mysqli_query($con,$queryinvoice);

    if(isset($_GET['id']) && isset($_GET['setid']) && isset($_GET['item']) ){
        $id = $_GET['id'];
        $setid = $_GET['setid'];
        $item = $_GET['item'];
        $query1 = "SELECT * FROM items WHERE set_id = '$setid' AND invoice_id='$id' AND item = '$item' ";
        $result1 = mysqli_query($con, $query1);
        $row1 = mysqli_fetch_assoc($result1);
        if(!$result1){
            die("Database query failed.");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/adddata.css">
<style>


form{
    margin:auto;
    width:600px;
}
h2{
    margin:10px;
    text-align:center;
}
        
        
    </style>
</head>
<body>
<?php include("../header/header.php");?>
    <h2>Update Items</h2>

    <form action="actionItem.php" method="POST">

        <input type="hidden" name="id" value="<?php if(isset($_GET['setid']) && isset($_GET['id']) && isset($_GET['item'])){echo (int)$_GET['id'];}?> " /> <br>
        
        <label for="setid">Set Id</label> <br>
        <input type="number" name="setid" value="<?php if(isset($_GET['setid'])&& isset($_GET['id']) && isset($_GET['item'])){echo $setid;}?>" required/> <br>

        <label for="category">Category</label> <br>
        <input type="text" name="category" value="<?php if(isset($_GET['setid'])&& isset($_GET['id']) && isset($_GET['item'])){echo $row1['category'];}?>" /><br>

        <label for="item">Item</label> <br>
        <input type="text" name="item" value="<?php if(isset($_GET['setid'])&& isset($_GET['id']) && isset($_GET['item'])){echo $row1['item'];}?>" /><br>

        <label for="serial_number">Serial number</label> <br>
        <input type="text" name="serial_number" value="<?php if(isset($_GET['setid'])&& isset($_GET['id']) && isset($_GET['item'])){echo $row1['serial_number'];}?>" /><br>

        <label for="location">Location</label> <br>
        <input type="text" name="location" value="<?php if(isset($_GET['setid'])&& isset($_GET['id']) && isset($_GET['item'])){echo $row1['location'];}?>" required/><br>

        <label for="working">Working</label> <br>
        <input type="text" name="working" value="<?php if(isset($_GET['setid'])&& isset($_GET['id']) && isset($_GET['item'])){echo $row1['working'];}?>" /> <br>

        <br><br>
        <input class="button" type="submit" name="setupdate" value="Update" style="width: 75%;"/> <br>
    </form>
</body>
</html>