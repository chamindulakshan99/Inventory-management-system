<?php
    include("../config/connection.php");
    session_start();

    if(!isset($_SESSION['uname'])){
        header("location: login.php");
        exit();
    }


    $queryinvoice = "SELECT * FROM f_invoice";
    $result = mysqli_query($con,$queryinvoice);

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query1 = "SELECT * FROM f_invoice WHERE invoice_id = $id";
        $result1 = mysqli_query($con, $query1);
        $row1 = mysqli_fetch_assoc($result1);

        $query2 = "SELECT * FROM f_items WHERE invoice_id = $id";
        $result2 = mysqli_query($con, $query2);
        $row2 = mysqli_fetch_assoc($result2);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/adddata.css">
<style>

form{
    margin:auto;
    width:800px;
}
h2{
    margin:10px;
    text-align:center;
}
        
        
    </style>
</head>
<body>
<?php include("../header/header.php");?>
    <h2><?php if(isset($_GET['id'])){echo "Update Furniture Invoice";}else{echo "Add Furniture Invoice";}?></h2>

    <form action="actionItem.php" method="POST">
	
        <input type="hidden" name="id" value="<?php if(isset($_GET['id'])){echo $row1['invoice_id'];}?> " /> <br>
	
        <label for="aName">Article Name</label> <br>
        <input type="text" name="aname" value="<?php if(isset($_GET['id'])){echo $row1['f_name'];}?>" required/> <br>

        <label for="date">Date</label> <br>
        <input type="date" name="date" value="<?php if(isset($_GET['id'])){echo $row1['f_date'];}?>" required/><br>

        <label for="price">Price(Per Unit)</label> <br>
        <input type="number" name="price" value="" /><br>

        <label for="quantity">Quantity</label> <br>
        <input type="number" name="quantity" value="<?php if(isset($_GET['id'])){echo $row1['f_quantity'];}?>" required/><br>

        <label for="folio">Folio Number</label> <br>
        <input type="text" name="folio" value="<?php if(isset($_GET['id'])){echo $row1['f_folio_number'];}?>" required/><br>

        <label for="description">Description</label>
        <textarea name="description" cols="20" rows="10" ><?php if(isset($_GET['id'])){echo $row1['f_description'];}?></textarea> <br><br><br>

        <label for="sName">Supplier Name</label> <br>
        <input type="text" name="sName" value="<?php if(isset($_GET['id'])){echo $row1['f_supplier_name'];}?>" required/> <br>

        <label for="s_tp">Supplier T.P.</label> <br>
        <input type="number" name="s_tp" value="<?php if(isset($_GET['id'])){echo $row1['f_supplier_tt'];}?>" /> <br>

        <label for="srn">SRN Number</label> <br>
        <input type="number" name="srn" value="<?php if(isset($_GET['id'])){echo $row1['f_srn'];}?>" /> <br>

        <label for="location">Location:</label>
        <input type="text" name="location" value="<?php if(isset($_GET['id'])){echo $row1['location'];}?>" required/> <br>
        <br><br>

        <input class="button" type="submit" name="<?php if(isset($_GET['id'])){echo "update";}else{echo "padd";}?>" value="<?php if(isset($_GET['id'])){echo "Update";}else{echo "Add";}?>" style="width: 75%;"/> <br>
    </form>
</body>
</html>