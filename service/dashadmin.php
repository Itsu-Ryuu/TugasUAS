<?php
    include "database.php";
    if(!isset($_SESSION['is_login']))
    {
        header ("location: admin.php");
    }
    $id_pelanggan=$_SESSION['Id_pelanggan'];
    $sql = "SELECT * FROM tabel_user a JOIN tabel_meteran b ON a.id_pelanggan = b.id_pelanggan JOIN 
    tabel_tagihan c ON b.id_meteran = c.id_meteran JOIN tabel_pembayaran d ON b.id_meteran = d.id_meteran JOIN tabel_pemakaian e ON b.id_meteran = e.id_meteran
    WHERE a.id_pelanggan = '$id_pelanggan'";
    $result = $db->query($sql);
    $dataBayar = array();
    if($result->num_rows > 0) {
        while ($data = $result->fetch_assoc()) {
           if($data['jumlah_bayar'])
           {
            $data['jumlah_bayar'] = str_replace(',','.',$data['jumlah_bayar']); 
           }
            $dataBayar[] = $data;
        }
    }
?>