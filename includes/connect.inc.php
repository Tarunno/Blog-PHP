<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'blog';

    $con = mysqli_connect($servername, $username, $password, $dbname);
    if(!$con){
        header("Location: ../index.php?ERROR=connection_error");
        exit();
    }
