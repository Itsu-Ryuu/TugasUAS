<?php 
    if(!isset($_SESSION['is_login']))
    {
        header ("location: login.php");
    }
    $sql = "SELECT tabel_pelanggan.id_pelanggan, tabel_pelanggan.nama, tabel_pelanggan.Alamat, tabel_pelanggan.nomor_meteran FROM tabel_pelanggan JOIN tabel_meteran ON tabel_pelanggan.id_pelanggan = tabel_meteran.id_pelanggan";
    $result = $db->query($sql);
?>