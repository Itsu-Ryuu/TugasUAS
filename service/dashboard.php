<?php
    include "database.php";
    if(!isset($_SESSION['is_login']))
    {
        header ("location: login.php");
    }
    $id_pelanggan=$_SESSION['Id_pelanggan'];
    $sql = "SELECT * FROM tabel_1_tugas a JOIN tabel_2_tugas b ON a.id_pelanggan = b.id_pelanggan JOIN 
    tabel_3_tugas c ON b.id_meteran = c.id_meteran JOIN tabel_4_tugas d ON b.id_meteran = d.id_meteran JOIN tabel_6_tugas e ON b.id_meteran = e.id_meteran
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