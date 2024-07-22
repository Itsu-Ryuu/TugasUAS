<?php
    include "database.php";
    if(!isset($_SESSION['is_login']))
    {
        header ("location: admin.php");
    }
    if(!isset($_SESSION['is_admin']))
    {
        header ("location: dashboard.php");
    }
    $id_pelanggan=$_SESSION['Id_pelanggan'];
    $sql = "SELECT * FROM tabel_user WHERE NOT id_role = 2";
    $result = $db->query($sql);
    $dataBayar = array();
    if($result->num_rows > 0) {
        while ($data = $result->fetch_assoc()) {
            $dataBayar[] = $data;
        }
    }
?>