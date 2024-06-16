<?php
    session_start();
    include "./../layout/header.php";
    include "./../service/profilePengguna.php";
?>
    <div class="content-wrapper">
        <main class="container mt-5 text-center">
            <h1>Selamat Datang <?= $_SESSION["Nama"] ?></h1>
        </main>
    <div class="content-wrapper">
        <main class="container mt-5 text-center">
                <h3>Terima Kasih sudah memakai layanan PLN</h3>
        </main>
    </div>





<?php include "./../layout/footer.php" ?>