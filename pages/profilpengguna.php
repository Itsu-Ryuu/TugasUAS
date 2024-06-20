<?php
    session_start();
    include "./../layout/header.php";
    include "./../service/profilePengguna.php";
?>

    <link href="./../css/style.css">

    <div class="profile-container">
            <img src="./../images/Default.png"> 
    </div>
    <div class="content-wrapper">
        <main class="container mt-5 text-center">
            <h3>Selamat Datang <?= $_SESSION["Nama"] ?> Pengguna Layanan PLN</h3>
        </main>
    <div class="content-wrapper">
        <main class="container mt-5 text-center">
                <h3>Terima Kasih sudah memakai layanan PLN</h3>
        </main>
    </div>
    <script src="script.js"></script>
    
<?php include "./../layout/footer.php" ?>