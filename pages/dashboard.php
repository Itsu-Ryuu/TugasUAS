<?php
session_start();
include "./../layout/header.php";
include "./../service/dashboard.php";
$nomer = 1;
?>
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
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dataBayar as $data) : ?>
                        <tr>
                            <th scope="row"><?= $nomer++ ?></th>
                            <td><?= $_SESSION['Nama'] ?></td>
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
                            <td>
                                <?php if ($data['status'] != 2) : ?>
                                    <button type="button" class="badge bg-success btn-bayar text-white" data-bs-toggle="modal" data-bs-target="#modal-bayar" data-nomor="<?= $data['nomor_meteran'] ?>" data-id="<?= $data['id_tagihan'] ?>" data-kwh="<?= $data['jumlah_kwh'] ?>" data-tanggal="<?= $data['tanggal_tagihan'] ?>"
                                    data-bayar="<?= $data['jumlah_bayar'] ?>"
                                    data-id-bayar="<?= $data['id_pembayaran'] ?>">
                                    bayar</button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>

    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal-bayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <ul style=" list-style-type: none;">
                        <li>Nomor Meteran: <span id="nomorMeteran"></span></li>
                        <li>Id Tagihan: <span id="idTagihan"></span></li>
                        <li>Jumlah Kwh: <span id="jumlahKwh"></span></li>
                        <li>Tanggal Tagihan: <span id="tanggalTagihan"></span></li>
                        <li>Jumlah Bayar: Rp <span id="jumlahBayar"></span>,00</li>
                        <br><br><br>
                        <form method="post" action="dashboard.php" name="formBayar" id="formBayar">
                            <li class="visually-hidden">Rp <input type="text" class="hidden" placeholder="Masukan Jumlah Bayar" id="idPembayaran" name="idPembayaran"></li>
                            <li>Rp <input type="text" placeholder="Masukan Jumlah Bayar" oninput="formatNumber()" id="input-bayar" name="input-bayar"></li>
                        </ul>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Bayar</button> -->
                <button type="button" class="btn btn-primary" id="btnBayar">Bayar</button>
            </div>
        </div>
    </div>
</div>

<?php include "./../layout/footer.php" ?>