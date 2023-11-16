<?php

$judul = "localhost";
$user  = "root";
$pass  = "";
$db    = "db_penorak";

$conn = mysqli_connect($judul, $user, $pass, $db);

if (!$conn){
    die ("Gagal terhubung".mysqli_connect_error());
}
?>