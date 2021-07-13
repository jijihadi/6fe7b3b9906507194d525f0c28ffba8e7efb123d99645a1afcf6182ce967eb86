<?php

function all()
{
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'db_test';
    $mysqli = new mysqli($host, $user, $pass, $db);
    // 
    $query = "SELECT * FROM `member`";
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    $row = mysqli_fetch_array($result);
    return $row;
    // while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
    //     $_SESSION['email'] = $row['email'];
    //     $flag = true;
    // }
}
