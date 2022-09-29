<?php
include '../function/config.php';

function read($table) {
    global $db;
    $query = "SELECT * FROM $table";
    $cek = mysqli_query($db, $query);
    return $cek;
}

?>


