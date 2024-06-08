<?php
    session_start();
    include "database.php";
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
        if($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $data = $result->fetch_assoc();
            $jumlah_bayar = 0;
            $jumlah_yang_dibayar = '';
            
            if(isset($data['jumlah_bayar']))
            {
                $jumlah_bayar = (int) str_replace(',','',$data['jumlah_bayar']);
            }
            if(isset($_POST["input-bayar"]))
            {
                $jumlah_yang_dibayar = (int) str_replace(',','',$_POST['input-bayar']);
            }
            if($jumlah_bayar === $jumlah_yang_dibayar)
            {
                $query = "UPDATE tabel_4_tugas SET status=2 WHERE id_pembayaran="."'".$data['id_pembayaran']."'";
                $db->query($query);
                echo "<script>alert('SUCCESS')</script>";
            }
            else{
                echo "<script>alert('Jumlah bayar tidak sesuai')</script>";
            }
        }

    }
?>