<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'db_test';

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error):
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
endif;
