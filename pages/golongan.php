<?php
session_start();
include "./../layout/header.php";
include "./../service/golongan.php";
$nomer = 1;
?>

<div class="content-wrapper">
    <div class="flex justify-content-center align-items-center">
        <main class="container text-center">
            <h3>Berikut Informasi Tarif Golongan</h3>
        </main>

        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Golongan</th>
                    <th scope="col">Tarif/Kwh</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($dataTarif as $data) : ?>
                <tr>
                    <th scope="row"><?= $nomer++ ?></th>
                    <td><?= $data['golongan'] ?></td>
                    <td>Rp <?= $data['harga_kwh'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script src="script.js"></script>

<?php include "./../layout/footer.php" ?>