<?php
session_start();
include "./../layout/header.php";
include "./../service/profilePengguna.php";
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
    
    <div class="content-wrapper d-flex flex-column" style="min-height: 50vh;">
    <div class="mt-auto">
        <main class="container text-center">
            <h3>Terima Kasih sudah memakai layanan PLN</h3>
        </main>
    </div>
</div>
<script src="script.js"></script>

<?php include "./../layout/footer.php" ?>