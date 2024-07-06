<?php
   include("../config/connection.php");
   session_start();
   if(!isset($_SESSION['uname'])){
       header("location: ../login/login.php");
       exit();
   }

    if(isset($_POST["register"])){
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];

        if($password == $c_password){
            $name = $_POST['name'];
            $uname = $_POST['uname'];
            $email = $_POST['email'];
            $tpnumber = $_POST['tpnumber'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $role = 'admin';

            $query = "SELECT * FROM admin WHERE username='$uname' OR email='$email' ";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result) == 1){
                echo "<script>alert('UserName or email alredy taken')</script>";
                
            }
            else{
                $query = "INSERT INTO admin(name,username,email,tp,role,password) VALUES ('$name','$uname', '$email','$tpnumber','$role','$password' )";
                $result = mysqli_query($con,$query);
                header("location: ../login/login.php");
            }
        }
        else{
            echo "<script>alert('Re Enter Password')</script>";
        } 
    }

    if(isset($_POST["update"])){
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];

        if($password == $c_password ){
            $id= $_POST['id'];
            $name = $_POST['name'];
            $uname = $_POST['uname'];
            $email = $_POST['email'];
            $tpnumber = $_POST['tpnumber'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $role = $_POST['role'];

            $query = "SELECT * FROM admin WHERE username='$uname' OR email='$email' ";
            $result = mysqli_query($con,$query);
            
            if(mysqli_num_rows($result) > 1){
                echo "<script>alert('UserName or email alredy taken')</script>";
            }
            else{
                $query = "UPDATE admin SET name='$name',username='$uname',email='$email',tp='$tpnumber',password='$password' where id='$id'";
                $result = mysqli_query($con,$query);
                header("location: ../login/login.php");

            }
        }
        else{
            echo "<script>alert('Re Enter Password')</script>";
        }
        
    }

    if(isset($_POST['remove'])){
        $id = $_POST['id'];
        $query1 = "DELETE FROM admin WHERE id='$id'";
        $result= mysqli_query($con,$query1);
        
	    if($result){
            header("location: masterAdminAction.php");
        }
    }

?><?php
   include("../config/connection.php");
   session_start();
   if(!isset($_SESSION['uname'])){
       header("location: ../login/login.php");
       exit();
   }

    if(isset($_POST["register"])){
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];

        if($password == $c_password){
            $name = $_POST['name'];
            $uname = $_POST['uname'];
            $email = $_POST['email'];
            $tpnumber = $_POST['tpnumber'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $role = 'admin';

            $query = "SELECT * FROM admin WHERE username='$uname' OR email='$email' ";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result) == 1){
                echo "<script>alert('UserName or email alredy taken')</script>";
                
            }
            else{
                $query = "INSERT INTO admin(name,username,email,tp,role,password) VALUES ('$name','$uname', '$email','$tpnumber','$role','$password' )";
                $result = mysqli_query($con,$query);
                header("location: ../login/login.php");
            }
        }
        else{
            echo "<script>alert('Re Enter Password')</script>";
        } 
    }

    if(isset($_POST["update"])){
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];

        if($password == $c_password ){
            $id= $_POST['id'];
            $name = $_POST['name'];
            $uname = $_POST['uname'];
            $email = $_POST['email'];
            $tpnumber = $_POST['tpnumber'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $role = $_POST['role'];

            $query = "SELECT * FROM admin WHERE username='$uname' OR email='$email' ";
            $result = mysqli_query($con,$query);
            
            if(mysqli_num_rows($result) > 1){
                echo "<script>alert('UserName or email alredy taken')</script>";
            }
            else{
                $query = "UPDATE admin SET name='$name',username='$uname',email='$email',tp='$tpnumber',password='$password' where id='$id'";
                $result = mysqli_query($con,$query);
                header("location: ../login/login.php");

            }
        }
        else{
            echo "<script>alert('Re Enter Password')</script>";
        }
        
    }

    if(isset($_POST['remove'])){
        $id = $_POST['id'];
        $query1 = "DELETE FROM admin WHERE id='$id'";
        $result= mysqli_query($con,$query1);
        
	    if($result){
            header("location: masterAdminAction.php");
        }
    }

?>