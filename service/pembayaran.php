<?php
include "database.php";
$id_pembayaran = '';
if(isset($_POST['idPembayaran']))
{

    $id_pembayaran = $_POST['idPembayaran'];
}

$sql = "SELECT * FROM tabel_1_tugas a JOIN tabel_2_tugas b ON a.id_pelanggan = b.id_pelanggan JOIN 
    tabel_3_tugas c ON b.id_meteran = c.id_meteran JOIN tabel_4_tugas d ON b.id_meteran = d.id_meteran JOIN tabel_6_tugas e ON b.id_meteran = e.id_meteran
    WHERE d.id_pembayaran = '$id_pembayaran'";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $jumlah_bayar = 0;
    $jumlah_yang_dibayar = '';

    if (isset($data['jumlah_bayar'])) {
        $jumlah_bayar = (int) str_replace(',', '', $data['jumlah_bayar']);
    }
    if (isset($_POST["inputBayar"])) {
        $jumlah_yang_dibayar = (int) str_replace('.', '', $_POST['inputBayar']);
    }
    if ($jumlah_bayar === $jumlah_yang_dibayar) {
        $query = "UPDATE tabel_4_tugas SET status=2 WHERE id_pembayaran=" . "'" . $data['id_pembayaran'] . "'";
        $db->query($query);
        $response = array('success' => true);
        } else {
        http_response_code(400);
        $response = array('success' => false, 'message' => 'Jumlah Bayar Tidak Sesuai');
    }
} 
else {
    http_response_code(400);
    $response = array('success' => false, 'message' => 'Data NoT Found');
}

header('Content-Type: application/json');
echo json_encode($response);