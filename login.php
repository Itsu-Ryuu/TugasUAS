<?php
    include "service/database.php";
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
        $_SESSION["Nama"] = $data["Nama"];
        $_SESSION["is_login"] = true;

        header ("location: dashboard.php");
        exit();
    }else {
        echo "<script>alert('akun tidak ditemukan')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-container {
            max-width: 400px;
            margin: auto;
            padding-top: 50px;
        }
    </style>
</head>
<body>
    <?php include "layout/header.html" ?>

    <div class="login-container">
        <h3 class="text-center">MASUK AKUN</h3>
        <form method="post" action="login.php">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                <label for="floatingInput">Nama</label>
                <div id="UsernameHelp" class="form-text">We'll never share your Nama with anyone else.</div>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="id_pelanggan" name="id_pelanggan" placeholder="id_pelanggan">
                <label for="floatingPassword">id_pelanggan</label>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="check-me-out" name="check-me-out" onchange="clickChecked()">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>

    <?php include "layout/footer.html" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function clickChecked() {
            let checkMeOut = document.getElementById('check-me-out')
            let idPelanggan = document.getElementById('id_pelanggan')
            if(checkMeOut.checked) 
            {
                idPelanggan.type = 'text'
            }
            else
            {
                idPelanggan.type = 'password'
            }
        }
    </script>
</body>
</html>