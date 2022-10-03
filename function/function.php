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

function read_join1($tablejoin, $condition, $orderby)
{
    global $db;
    $query = "SELECT * FROM $tablejoin WHERE $condition  ORDER BY $orderby DESC ";
    $cek = mysqli_query($db, $query);
    return $cek;
}

function read_join($tablejoin, $condition, $and, $orderby)
{
    global $db;
    $query = "SELECT * FROM $tablejoin WHERE $condition  AND $and ORDER BY $orderby DESC ";
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

function edit_join($table, $condition, $colkey, $id)
{
    global $db;
    $query = "SELECT * FROM $table WHERE $condition AND $colkey = $id ";
    $cek = mysqli_query($db, $query);
    //var_dump($query);
    return $cek;
}

function edit_join2($tablejoin, $condition, $and, $orderby)
{
    global $db;
    $query = "SELECT * FROM $tablejoin WHERE $condition  AND $and ORDER BY $orderby DESC ";
    $cek = mysqli_query($db, $query);
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
