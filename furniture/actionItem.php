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
        $location = $_POST['location'];

        $query1 = "INSERT INTO f_invoice(f_name,f_date,f_price,f_quantity,f_folio_number,f_description,f_supplier_name,f_supplier_tt,f_srn,location) values ('$name','$date','$price','$quantity','$folio','$description','$sName','$s_tp','$srn','$location') ";
        $result1 = mysqli_query($con,$query1);

        if(!$result1){
            echo "<script>alert('can not add result1')</script>";
        }
        $query2 ="SELECT invoice_id FROM f_invoice WHERE f_folio_number ='$folio'";
            
        $result2 = mysqli_query($con,$query2);
        
        if(!$result2){
            echo "<script>alert('can not add result2')</script>";
        }
        
        if(mysqli_num_rows($result2) == 1) {
            $row = mysqli_fetch_assoc($result2);
            $id = $row['invoice_id'];

                for($i=1; $i <= $quantity; $i++){
                    $query3 = "INSERT INTO f_items(invoice_id,f_set_id,location,working) values ('$id', '$i','$location','yes')";
                    $result3 = mysqli_query($con, $query3);
                }
            if($result1){
                header("location: furniture.php");
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

        $query = "UPDATE f_invoice SET f_name='$name',f_date='$date',f_price='$price',f_quantity='$quantity',f_folio_number='$folio',f_description='$description',f_supplier_name='$sName',f_supplier_tt='$s_tp',f_srn='$srn',location='$location' where invoice_id='$id'";

        $result = mysqli_query($con,$query);
        if($result){
            header("location: furniture.php");
        }
    }





    if(isset($_POST['setupdate'])){

        $id = (int)$_POST['id'];
        $setid = $_POST['setid'];
        $location = $_POST['location'];
        $working = $_POST['working'];

        $query = "UPDATE f_items SET f_set_id='$setid',location='$location',working='$working' where f_set_id='$setid' AND invoice_id='$id'";

        $result = mysqli_query($con,$query);
        if($result){
            header("location: furniture.php");
        }else{
            echo "<script>alert('Error')</script>";
        }
    }


    if(isset($_POST['remove'])){
        $id = $_POST['remove'];
        $query1 = "DELETE FROM f_items WHERE invoice_id='$id'";
        $result= mysqli_query($con,$query1);
        $query2 = "DELETE FROM f_invoice WHERE invoice_id='$id'";
        $result= mysqli_query($con,$query2);
	    if($result){
            header("location: furniture.php");
        }
    }
?>