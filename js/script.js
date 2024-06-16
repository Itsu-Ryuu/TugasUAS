function formatNumber() {
    let input = document.getElementById('input-bayar');
    console.log(input);
    let value = input.value.replace(/\D/g, ''); // Remove non-numeric characters
    value = parseInt(value, 10).toLocaleString(); // Format number with thousand separators
    input.value = value;
}

document.addEventListener("DOMContentLoaded", function () {
    var buttonsBayar = document.querySelectorAll('.btn-bayar');

    buttonsBayar.forEach(function (button) {
        button.addEventListener('click', function () {
            var nomorMeteran = this.getAttribute('data-nomor');
            var idTagihan = this.getAttribute('data-id');
            var jumlahKwh = this.getAttribute('data-kwh');
            var tanggalTagihan = this.getAttribute('data-tanggal');
            var bayar = this.getAttribute('data-bayar');
            var idBayar = this.getAttribute('data-id-bayar');

            // Mengisi data ke dalam modal
            document.getElementById('nomorMeteran').innerText = nomorMeteran;
            document.getElementById('idTagihan').innerText = idTagihan;
            document.getElementById('jumlahKwh').innerText = jumlahKwh;
            document.getElementById('tanggalTagihan').innerText = tanggalTagihan;
            document.getElementById('jumlahBayar').innerText = bayar;
            document.getElementById('idPembayaran').value = idBayar;
        });
    });

    document.getElementById('btnBayar').addEventListener('click', function () {
        // Ambil nilai input yang dibutuhkan
        var idPembayaran = document.getElementById('idPembayaran').value;
        var jumlahBayar = document.getElementById('input-bayar').value;

        // Validasi jika jumlahBayar valid (opsional)
        if (jumlahBayar.trim() === '') {
            Swal.fire({
                title: 'Error!',
                text: 'Silakan masukkan jumlah bayar',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return;
        }

        // Data yang akan dikirimkan ke server
        var formData = new FormData();
        formData.append('idPembayaran', idPembayaran);
        formData.append('inputBayar', jumlahBayar);

        // Pengiriman data ke server menggunakan fetch
        fetch('./../service/pembayaran.php', {
            method: 'POST',
            body: formData
        })
            .then(response => {
                // Periksa status response dari server
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Tanggapan dari server
                if (data.success) {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Pembayaran Berhasil',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(function () {
                        location.reload(); // Memuat ulang halaman setelah pengiriman sukses
                    });
                } else {
                    Swal.fire({
                        title: 'Failed!',
                        text: data.message ? data.message : 'Pembayaran Gagal',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    title: 'Error!',
                    text: 'Terjadi kesalahan saat mengirim data',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
    });
});

document.getElementById('formBayar').addEventListener('submit', function (event) {
    event.preventDefault();
    document.forms["formBayar"].submit();
})


function clickChecked() {
    let checkMeOut = document.getElementById('check-me-out')
    let idPelanggan = document.getElementById('id_pelanggan')
    if (checkMeOut.checked) {
        idPelanggan.type = 'text'
    }
    else {
        idPelanggan.type = 'password'
    }
}

function logout() {
    fetch('../service/logout.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ logout: true })
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return window.open('../pages/index.php', '_self')
        })
        .catch(error => {
            console.error('Error executing PHP function:', error);
        });
}

function goToLogin() {
    window.open('../pages/login.php', '_self')
}

function clearForm() {
    document.getElementById('input-bayar').value = '';
    document.getElementById('idPembayaran').value = '';
}