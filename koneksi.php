<?php
$hostname = "localhost";
$user = "root";
$password = "";
$db_name = "tugasweb";

$koneksi = mysqli_connect($hostname, $user, $password, $db_name);
if (!$koneksi) {
    die("Koneksi Gagal: " . mysqli_connect_error());
} else {
    echo "Koneksi Berhasil!";
}
?>