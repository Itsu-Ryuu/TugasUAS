<?php
    include "database.php";
    session_start();

    $login_message = "";

    if(isset($_SESSION["is_login"])) {
        header("location: dashboard.php");
    }

if($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $id_pelanggan = '';
    $nama = '';
    
    if(isset($_POST["id_pelanggan"]))
    {
        $id_pelanggan = $_POST["id_pelanggan"];
    }
    if(isset($_POST["nama"]))
    {
        $nama = $_POST["nama"];
    }
    $sql = "SELECT * FROM tabel_1_tugas WHERE nama='$nama' AND 
    id_pelanggan='$id_pelanggan'";
    $result = $db->query($sql);
    
    if($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $_SESSION["Nama"] = $data["nama"];
        $_SESSION["is_login"] = true;

        header ("location: dashboard.php");
        exit();
    }else {
        echo "<script>alert('akun tidak ditemukan')</script>";
    }
}
?>