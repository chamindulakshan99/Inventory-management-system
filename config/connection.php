<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project_1";

    $con = mysqli_connect($hostname,$username,$password,$dbname);

    if(!$con){
        die("Connection failed.".mysqli_connect_error());
    }
?>