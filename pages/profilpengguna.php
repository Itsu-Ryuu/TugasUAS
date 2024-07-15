<?php
session_start();
include "./../layout/header.php";
include "./../service/profilePengguna.php";
$nomer = 1;
?>

<div class="content-wrapper">
    <div class="row w-100">
        <div class="col-md-2">
            <div class="profile-container">
                <img src="./../images/Default.png">
            </div>
            
        </div>
        <div class="col-md-8 d-flex justify-content-center align-items-center">
            <main class="container text-center">
                <h3>Selamat Datang <?= $_SESSION["Nama"] ?> Pengguna Layanan PLN</h3>
            </main>
        </div>
    </div>
<div class="d-flex justify-content-center align-items-center mt-4">
    <div class="row ">
        <div class="col-md-12 text-center" style="padding-top: 2px;">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Id Pelanggan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Nomor Meteran</th>
                        <th scope="col">Golongan</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <th scope="row"><?= $nomer++ ?></th>
                            <td><?= $_SESSION['Nama'] ?></td>
                            <td><?= $data['id_pelanggan'] ?></td>
                            <td><?= $data['Alamat'] ?></td>
                            <td><?= $data['nomor_meteran'] ?></td>
                            <td><?= $data['golongan'] ?></td>
                        </tr>
                </tbody>
            </table>
        </div>

    <div class="content-wrapper d-flex flex-column" style="min-height: 20vh;">
    <div class="mt-auto">
        <main class="container text-center">
            <h3>Terima Kasih sudah memakai layanan PLN</h3>
        </main>
    </div>
</div>
<script src="script.js"></script>

<?php include "./../layout/footer.php" ?>