<?php

function get_children($name) { 

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'db_test';
    $mysqli = new mysqli($host, $user, $pass, $db);
    //
    $query = "SELECT * FROM member where name ='" . $name . "'";
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    $row = mysqli_fetch_assoc($result);


    $cquery = "SELECT * FROM member where parent_id ='" . $row['id'] . "'";
    $cresult = mysqli_query($mysqli, $cquery) or die(mysqli_error($mysqli));
    $res = mysqli_fetch_assoc($cresult);
    $cr = count($res);

    for ($i=0; $i < $cr; $i++) { 
        $children[] = $res['name'];
        $children = array_filter($children);
    }
    
    //15pts
    //mengambil semua direct-child dari input
    //mengembalikan array of string yang berisi daftarnama child...
    return $children;
}