<?php
include 'connect.php';
function get_tree($name = "root")
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
    // 
    $querys = "SELECT COUNT(parent_id) as c FROM member where parent_id='" . $row['parent_id'] . "'";
    $results = mysqli_query($mysqli, $querys) or die(mysqli_error($mysqli));
    $crow = mysqli_fetch_assoc($results);
    $crow = $crow['c'];
    
    $tree['name'] ='' ;
    $tree['name'] = $row['name'];
    
    //
    $q = "SELECT * FROM member where parent_id ='" . $row['parent_id'] . "' and name not like '" . $row['name'] . "'";
    $rs = mysqli_query($mysqli, $q) or die(mysqli_error($mysqli));
    $r = mysqli_fetch_assoc($rs);
    // 
    $q2 = "SELECT * FROM member where parent_id ='" . $row['parent_id'] . "' and name not like '" . $name . "'";
    $rs2 = mysqli_query($mysqli, $q) or die(mysqli_error($mysqli));
    $r2 = mysqli_fetch_assoc($rs);
    // 
    $q3 = "SELECT * FROM member where parent_id ='" . $row['parent_id'] . "' and name not like '" . $name . "'";
    $rs3 = mysqli_query($mysqli, $q) or die(mysqli_error($mysqli));
    $r3 = mysqli_fetch_assoc($rs);
    // 
    $q4 = "SELECT * FROM member where parent_id ='" . $row['parent_id'] . "' and name not like '" . $name . "'";
    $rs4 = mysqli_query($mysqli, $q) or die(mysqli_error($mysqli));
    $r4 = mysqli_fetch_assoc($rs);

    $tree['children'] = ['name'=>$r['name'], 'children' =>['name'=>$r2['name'], 'children' =>['name'=>$r3['name'], 'children' =>['name'=>$r4['name']]]]];

    //40pts//mengambil struktur tree dari database dengan toplevel item sesuai input
    //mengembalikan assoc array dengan property namadan children
    //dimana children adalah array of assoc array berisichild dibawah member ybs...
    // return  $tree;
    $tree = array_filter($tree);
    return $tree;
}
