<?php
function get_parents($name)
{
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'db_test';
    $mysqli = new mysqli($host, $user, $pass, $db);
    //
    $query = "SELECT * FROM member where name ='" . $name . "'";
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    $row = mysqli_fetch_assoc($result);

    for ($i=$row['parent_id']-1; $i >= 0;  $i--) { 
        $query = "SELECT * FROM member where parent_id ='" . $i . "'";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        $r = mysqli_fetch_assoc($result);

        $parents[] = $r['name'];
        $parents = array_filter($parents);
    }
    //25pts
    //mengambil semua parent dari input mulai dari direct-parentsampai root member
    //mengembalikan array of string berisi nama parenturut dari yang paling dekat...
    return $parents;}
