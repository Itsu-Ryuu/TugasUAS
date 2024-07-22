<?php

$hostname = "localhost";
$Nama ="root";
$id_pelanggan = "";
$database_name = "tugas_besar1";

$db = mysqli_connect($hostname, $Nama, $id_pelanggan, $database_name);

if($db->connect_error) {
    echo "koneksi database rusak";
    die("error!");
}
?>