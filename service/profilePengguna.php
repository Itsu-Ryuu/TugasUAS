<?php 
    include "database.php";
    if(!isset($_SESSION['is_login']))
    {
        header ("location: login.php");
    }
    $id_pelanggan=$_SESSION['Id_pelanggan'];
    if(!isset($_SESSION['is_admin']))
    {
        $sql = "SELECT tabel_user.id_pelanggan, tabel_user.nama, tabel_user.Alamat, tabel_meteran.nomor_meteran, tabel_tarif.golongan FROM 
        tabel_user JOIN tabel_meteran ON tabel_user.id_pelanggan = tabel_meteran.id_pelanggan JOIN tabel_tarif ON tabel_meteran.id_tarif = tabel_tarif.id_tarif 
        WHERE tabel_user.id_pelanggan = '$id_pelanggan'";
    }
    else
    {
        $sql = "SELECT tabel_user.id_pelanggan, tabel_user.nama, tabel_user.Alamat FROM 
        tabel_user WHERE tabel_user.id_pelanggan = '$id_pelanggan'";
    }
    $result = $db->query($sql);
    $data = $result->fetch_assoc();
    if(isset($_SESSION['is_admin']))
    {
        $data['nomor_meteran'] = '';
        $data['golongan'] = '';
    }
?>