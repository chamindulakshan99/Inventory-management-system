<?php
    include("../config/connection.php");

    session_start();

    if(!isset($_SESSION['uname'])){
        header("location: ../login/login.php");
        exit();
    }
    
    if(isset($_POST['padd'])){
        $name = $_POST['aname'];
        $date = $_POST['date'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $folio = $_POST['folio'];
        $description = $_POST['description'];
        $sName = $_POST['sName'];
        $s_tp = $_POST['s_tp'];
        $srn = $_POST['srn'];
        $type = $_POST['type'];
        $location = $_POST['location'];

        
        $query1 = "INSERT INTO invoice(name,date,price,quantity,folio_number,description,supplier_name,supplier_tt,srn,type,location) values ('$name','$date','$price','$quantity','$folio','$description','$sName','$s_tp','$srn','$type','$location') ";
        $result1 = mysqli_query($con,$query1);

        $query2 ="SELECT invoice_id FROM invoice WHERE folio_number ='$folio'";
            
        $result2 = mysqli_query($con,$query2);
        
        if(mysqli_num_rows($result2) == 1) {
            $row = mysqli_fetch_assoc($result2);
            $id = $row['invoice_id'];


            if($type === "desktop"){
                for($i=1; $i <= $quantity; $i++){
                    $items = array('CPU', 'Monitor', 'Keyboard', 'Mouse'); // Array of item items

                    $itemData = array(); // Initialize an array to store item data
    
                    $index = (string)$i; // Convert $i to string for concatenation
    
                    foreach ($items as $item) {
                        $itemData[$item] = $_POST[$item . $index]; // Store item data using the item as the key
                    }
    
                    // Inside the loop where you're inserting item data
                    foreach ($items as $item) {
                        $query3 = "INSERT INTO items(invoice_id,set_id,category,item,serial_number,location,working) values ('$id'
                        
                        , '$i', '$type', '$item', '{$itemData[$item]}', '$location', 'yes')";
                        $result3 = mysqli_query($con, $query3);
                    }
                }  
            }
            elseif ($type === "laptop") {
                for($i=1; $i <= $quantity; $i++){
                    $items = array('Model_number', 'Serial_number'); // Array of item items

                    $itemData = array(); // Initialize an array to store item data

                    $index = (string)$i; // Convert $i to string for concatenation

                    foreach ($items as $item) {
                        $itemData[$item] = $_POST[$item . $index]; // Store item data using the item as the key
                    }

                    // Inside the loop where you're inserting item data
                    foreach ($items as $item) {
                        $query3 = "INSERT INTO items(invoice_id,set_id,category,item,serial_number,location,working) values ('$id', '$i', '$type', '$item', '{$itemData[$item]}', '$location', 'yes')";
                        $result3 = mysqli_query($con, $query3);
                    }
                }

            }
            elseif ($type === "electronic") {
                for($i=1; $i <= $quantity; $i++){
                    $items = array('Serial_number'); // Array of item items

                    $itemData = array(); // Initialize an array to store item data

                    $index = (string)$i; // Convert $i to string for concatenation

                    foreach ($items as $item) {
                        $itemData[$item] = $_POST[$item . $index]; // Store item data using the item as the key
                    }

                    // Inside the loop where you're inserting item data
                    foreach ($items as $item) {
                        $query3 = "INSERT INTO items(invoice_id,set_id,category,item,serial_number,location,working) values ('$id', '$i', '$type', '$item', '{$itemData[$item]}', '$location', 'yes')";
                        $result3 = mysqli_query($con, $query3);
                    }
                }
            }
            
            if ($result3) {
               header("location: lab.php");
        
            }

        }

    }

    if(isset($_POST['update'])){

        $id = $_POST['id'];
        $name = $_POST['aname'];
        $date = $_POST['date'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $folio = $_POST['folio'];
        $description = $_POST['description'];
        $sName = $_POST['sName'];
        $s_tp = $_POST['s_tp'];
        $srn = $_POST['srn'];
        $type = $_POST['type'];
        $location = $_POST['location'];

        $query = "UPDATE invoice SET name='$name',date='$date',price='$price',quantity='$quantity',folio_number='$folio',description='$description',supplier_name='$sName',supplier_tt='$s_tp',srn='$srn',location='$location' where invoice_id='$id'";

        $result = mysqli_query($con,$query);
        if($result){
            header("location: lab.php");
        }
    }

    if(isset($_POST['setupdate'])){

        $id = (int)$_POST['id'];
        $setid = $_POST['setid'];
        $category = $_POST['category'];
        $item = $_POST['item'];
        $serial_number = $_POST['serial_number'];
        $location = $_POST['location'];
        $working = $_POST['working'];

        $query = "UPDATE items SET category='$category',item='$item',serial_number='$serial_number',location='$location',working='$working' where invoice_id='$id' AND set_id='$setid' AND  item='$item'";

        $result = mysqli_query($con,$query);
        if($result){
            header("location: lab.php");
        }else{
            echo "<script>alert('Error')</script>";
        }
    }

    if(isset($_POST['remove'])){
        $id = $_POST['remove'];
        $query1 = "DELETE FROM items WHERE invoice_id='$id'";
        $result= mysqli_query($con,$query1);
        $query2 = "DELETE FROM invoice WHERE invoice_id='$id'";
        $result= mysqli_query($con,$query2);
	    if($result){
            header("location: lab.php");
        }
    }
    
    
    
    
    
?>