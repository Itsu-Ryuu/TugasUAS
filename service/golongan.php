<?php 
    include "database.php";
    if(!isset($_SESSION['is_login']))
    {
        header ("location: login.php");
    }
    $id_pelanggan=$_SESSION['Id_pelanggan'];
    $sql = "SELECT golongan, harga_kwh FROM tabel_tarif";
    $result = $db->query($sql);
    $dataTarif = array();
    if($result->num_rows > 0) {
        while ($data = $result->fetch_assoc()) {
           if($data['harga_kwh'])
           {
            $data['harga_kwh'] = number_format($data['harga_kwh'], 2, ',', '.'); 
           }
            $dataTarif[] = $data;
        }
    }
?>