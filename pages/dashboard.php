<?php
    include "./../service/logout.php";
    include "./../layout/header.php";
?>

    <h3>selamat datang <?= $_SESSION["Nama"] ?></h3>

    <form action="dashboard.php" method="POST">
        <button type="submit" name="logout">logout</button>
    </form>

<?php include "./../layout/footer.php" ?>