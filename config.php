<?php

    $username = "root";
    $password = "Rob.1323";
    $host = "localhost";
    $db = "test";

    $connect = mysqli_connect($host, $username, $password, $db);

    if (!$connect){
        echo "Db not connected";
        die();
    }