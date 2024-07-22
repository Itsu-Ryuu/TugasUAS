<?php
session_start();
include "./../service/listpelanggan.php";
include "./../layout/header.php";
$nomer = 1;
?>
<main class="container text-center">
    <h3>Berikut Informasi List Pelanggan</h3>
</main>
<div class="d-flex justify-content-center align-items-center">
    <div class="row ">
        <div class="col-md-12 text-center" style="padding-top: 20px;">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dataBayar as $data) : ?>
                        <tr>
                            <th scope="row"><?= $nomer++ ?></th>
                            <td><?= $data['Nama'] ?></td>
                            <td><?= $data['Jenis_Kelamin'] ?></td>
                            <td><?= $data['Alamat'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>

    </div>
</div>
<?php include "./../layout/footer.php" ?>