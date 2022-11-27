<?php
$server ="localhost";
$user = "root";
$pass = "";
$database= "recyclick";
$koneksi = mysqli_connect($server, $user, $pass, $database) or die ("Database Tidak Bisa Terhubung ");

if(mysqli_connect_errno()) {
    echo "koneksi gagal : ".mysqli_connect_error();
 }

?>