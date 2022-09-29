<?php
include '../function/config.php';

// gita

function read($table, $orderby) {
    global $db;
    $query = "SELECT * FROM $table ORDER BY $orderby DESC ";
    $cek = mysqli_query($db, $query);
    return $cek;
}

function create($table, $cols, $value) {
    global $db;
    $query = "INSERT INTO $table ($cols) VALUES ($value)";
    $cek = mysqli_query($db, $query);
    return $cek;
}

?>


