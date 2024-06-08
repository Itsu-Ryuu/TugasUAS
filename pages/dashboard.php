<?php
    include "./../service/logout.php";
    include "./../service/dashboard.php";
    include "./../layout/header.php";
?>
<div class="d-flex justify-content-center align-items-center">
    <div class="row ">
        <div class="col-md-12 text-center">
            <table class="table">
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
                    <tr>
                        <th scope="row">1</th>
                        <td><?= $_SESSION['Nama'] ?></td>
                        <td><?= $nomor_meteran ?></td>
                        <td><?= $id_tagihan ?></td>
                        <td><?= $jumlah_kwh ?></td>
                        <td><?= $tanggal_pemakaian ?></td>
                        <td><?= $tanggal_tagihan ?></td>
                        <td>
                            <?php if($status==1):?>
                                <span class="badge bg-warning text-dark">belum bayar</span>
                            <?php elseif($status==2):?>
                                <span class="badge bg-success text-white">sudah bayar</span>
                            <?php else:?>
                                <span class="badge bg-danger text-white">melebihi batas tanggal</span>
                            <?php endif;?>
                        </td>
                        <?php if($status!=2):?>
                            <td><button type="button" class="badge bg-success text-white" data-bs-toggle="modal" data-bs-target="#modal-bayar">bayar</button></td>
                        <?php endif; ?>
                    </tr>
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
        <ul style=" list-style-type: none;">
            <li>Nomor Meteran: <?= $nomor_meteran ?></li>
            <li>Id Tagihan: <?= $id_tagihan ?></li>
            <li>Jumlah Kwh: <?= $jumlah_kwh ?></li>
            <li>Tanggal Tagihan: <?= $tanggal_tagihan ?></li>
            <li>Jumlah Bayar: Rp <?= $jumlah_bayar ?>,00</li>
            <br>
            <br>
            <br>
            <form method="post" action="./../service/pembayaran.php" >
                <li>Rp <input type="text" placeholder="Masukan Jumlah Bayar" oninput="formatNumber()" id="input-bayar" name="input-bayar"></li>
            </ul>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-secondary">Close</button>
            <!-- <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
            <!-- <button type="button" class="btn btn-primary">Bayar</button> -->
            <button type="submit" class="btn btn-primary">Bayar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
        function formatNumber() {
    let input = document.getElementById('input-bayar');
    let value = input.value.replace(/\D/g, ''); // Remove non-numeric characters
    value = parseInt(value, 10).toLocaleString(); // Format number with thousand separators
    input.value = value;
    console.log(input.value)
}
    </script>

<?php include "./../layout/footer.php" ?>