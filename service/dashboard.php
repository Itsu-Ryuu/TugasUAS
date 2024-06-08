<?php
    include "database.php";
    if(!isset($_SESSION['is_login']))
    {
        header ("location: login.php");
    }
    $id_pelanggan=$_SESSION['Id_pelanggan'];
    $nomor_meteran = '';
    $id_tagihan = '';
    $jumlah_kwh = '';
    $tanggal_pemakaian = '';
    $tanggal_tagihan = '';
    $status = '';
    $jumlah_bayar = '';
    $sql = "SELECT * FROM tabel_1_tugas a JOIN tabel_2_tugas b ON a.id_pelanggan = b.id_pelanggan JOIN 
    tabel_3_tugas c ON b.id_meteran = c.id_meteran JOIN tabel_4_tugas d ON b.id_meteran = d.id_meteran JOIN tabel_6_tugas e ON b.id_meteran = e.id_meteran
    WHERE a.id_pelanggan = '$id_pelanggan'";
    $result = $db->query($sql);
    if($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $status = $data['status'];
        $nomor_meteran = $data['nomor_meteran'];
        $id_tagihan = $data['id_tagihan'];
        $jumlah_kwh = $data['jumlah_kwh'];
        $tanggal_pemakaian = $data['tanggal_pemakaian'];
        $tanggal_tagihan = $data['tanggal_tagihan'];
        $jumlah_bayar = str_replace(',','.',$data['jumlah_bayar']);
        
    }
?>