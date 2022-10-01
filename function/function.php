<?php
include 'config.php';

// gita

function read($table, $orderby)
{
    global $db;
    $query = "SELECT * FROM $table ORDER BY $orderby DESC ";
    $cek = mysqli_query($db, $query);
    return $cek;
}

function create($table, $cols, $value)
{
    global $db;
    $query = "INSERT INTO $table ($cols) VALUES ($value)";
    $cek = mysqli_query($db, $query);
    return $cek;
}

function edit($table, $col, $id)
{
    global $db;
    $query = "SELECT * FROM $table WHERE $col = $id ";
    $cek = mysqli_query($db, $query);
    //var_dump($query);
    return $cek;
}


function update($tabel, $value, $kolomkey, $valuekey)
{
    global $db;
    $query = "UPDATE  " . $tabel . " set " . $value . " where $kolomkey = $valuekey";
    $cek = mysqli_query($db, $query);
    // var_dump($query);
    return $cek;
}

function delete($table, $cols, $id)
{
    global $db;
    $query = "DELETE FROM $table WHERE $cols = $id";
    $cek = mysqli_query($db, $query);
    return $cek;
}

function loginPetugas($table, $col, $id)
{
    global $db;
    $query = "SELECT * FROM $table WHERE $col= '$id'";
    $cek = mysqli_query($db, $query);
    return $cek;
}

function loginSiswa($table, $col, $id)
{
    global $db;
    $query = "SELECT * FROM $table WHERE $col= '$id'";
    $cek = mysqli_query($db, $query);
    return $cek;
}
