<?php 
    include "database.php";
    if(!isset($_SESSION['is_login']))
    {
        header ("location: login.php");
    }
    $id_pelanggan=$_SESSION['Id_pelanggan'];
    $sql = "SELECT tabel_pelanggan.id_pelanggan, tabel_pelanggan.nama, tabel_pelanggan.Alamat, tabel_meteran.nomor_meteran, tabel_tarif.golongan FROM tabel_pelanggan JOIN tabel_meteran ON tabel_pelanggan.id_pelanggan = tabel_meteran.id_pelanggan JOIN tabel_tarif ON tabel_meteran.id_tarif = tabel_tarif.id_tarif WHERE tabel_pelanggan.id_pelanggan = '$id_pelanggan'";
    $result = $db->query($sql);
    $data = $result->fetch_assoc();
?>