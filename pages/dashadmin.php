<?php
session_start();
include "./../layout/header.php";
include "./../service/dashadmin.php";
$nomer = 1;
?>
<main class="container text-center">
    <h3>Berikut Informasi Pembayaran Pelanggan</h3>
</main>
<div class="d-flex justify-content-center align-items-center">
    <div class="row ">
        <div class="col-md-12 text-center" style="padding-top: 20px;">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">nomer meteran</th>
                        <th scope="col">id tagihan</th>
                        <th scope="col">jumlah kwh</th>
                        <th scope="col">Tanggal Pemakaian</th>
                        <th scope="col">tanggal tagihan</th>
                        <th scope="col">status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dataBayar as $data) : ?>
                        <tr>
                            <th scope="row"><?= $nomer++ ?></th>
                            <td><?= $data['Nama'] ?></td>
                            <td><?= $data['nomor_meteran'] ?></td>
                            <td><?= $data['id_tagihan'] ?></td>
                            <td><?= $data['jumlah_kwh'] ?></td>
                            <td><?= $data['tanggal_pemakaian'] ?></td>
                            <td><?= $data['tanggal_tagihan'] ?></td>
                            <td>
                                <?php if ($data['status'] == 1) : ?>
                                    <span class="badge bg-warning text-dark">belum bayar</span>
                                <?php elseif ($data['status'] == 2) : ?>
                                    <span class="badge bg-success text-white">sudah bayar</span>
                                <?php else : ?>
                                    <span class="badge bg-danger text-white">melebihi batas tanggal</span>
                                <?php endif; ?>
                            </td>
                            <!-- <td>
                                <?php if ($data['status'] != 2) : ?>
                                    <button type="button" class="badge bg-success btn-bayar text-white" data-bs-toggle="modal" data-bs-target="#modal-bayar" data-nomor="<?= $data['nomor_meteran'] ?>" data-id="<?= $data['id_tagihan'] ?>" data-kwh="<?= $data['jumlah_kwh'] ?>" data-tanggal="<?= $data['tanggal_tagihan'] ?>"
                                    data-bayar="<?= $data['jumlah_bayar'] ?>"
                                    data-id-bayar="<?= $data['id_pembayaran'] ?>">
                                    bayar</button>
                                <?php endif; ?>
                            </td> -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>

    </div>
</div>