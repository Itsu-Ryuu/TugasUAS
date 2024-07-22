<?php
    include "database.php";
    session_start()

    $login_message = "";

    if(!isset($_SESSION['is_login']))
    {
        header ("location: dashadmin.php");
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
    $sql = "SELECT * FROM tabel_user WHERE nama='$nama' AND 
    id_pelanggan='$id_pelanggan'";
    $result = $db->query($sql);
    
    if($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $_SESSION["Nama"] = $data["Nama"];
        $_SESSION["Id_pelanggan"] = $data["id_pelanggan"];
        $_SESSION["is_admin"] = true;

        header ("location: profilpengguna.php");
        exit();
    }else {
        echo "<script>
        Swal.fire({
            title: 'Error!',
            text: 'Akun Tidak Ditemukan',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        </script>";
    }
}
?>