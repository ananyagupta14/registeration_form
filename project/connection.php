<?php
    error_reporting(0);
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "studentdata";

    $conn       = mysqli_connect($servername,$username,$password,$dbname);
    if($conn){}
    else{echo "Connection failed";}
?>