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

    // DATABASE : blog
    // TABLE : users (id, admin, username, email, password, users_create_time, profile_img_status)
    // TABLE : topics (id, name, description)
    // TABLE : posts (id, user_id, title, image, body, published, created_at, trending, sum_rating, rated_users)
