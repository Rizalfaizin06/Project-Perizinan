<div id="container">


    <label for="waktuMulai">Waktu Mulai :</label>
    <input name="waktuMulai" disabled value="<?= $status->waktuMulai; ?>">
    <br>

    <label for="waktuSelesai">Waktu Selesai :</label>
    <input id="waktuSelesai" name="waktuSelesai" disabled value="<?= $status->waktuSelesai; ?>">
    <br>

    <label>Alasan :</label>
    <input id="waktuSelesai" name="alasan" disabled value="<?= $status->alasan; ?>">
    <br>

    <label>BK :</label>
    <input id="waktuSelesai" name="alasan" disabled
        value="<?= ($status->konfirmasiBK == 0) ? 'Belum Dikonfirmasi' : 'Sudah Dikonfirmasi' ?>">
    <br>

    <label>Wali Kelas :</label>
    <input id="waktuSelesai" name="alasan" disabled
        value="<?= ($status->konfirmasiWakel == 0) ? 'Belum Dikonfirmasi' : 'Sudah Dikonfirmasi' ?>">
    <br>

    <h1>
        status :
        <?php
        if ($status->konfirmasiBK == 1 && $status->konfirmasiWakel == 1) {
            echo " perizinan terverifikasi";
        } elseif ($status->konfirmasiBK == 0 && $status->konfirmasiWakel == 1) {
            echo " Belum Dikonfirmasi BK";
        } elseif ($status->konfirmasiWakel == 0 && $status->konfirmasiBK == 1) {
            echo " Belum Dikonfirmasi Wali Kelas";
        } else {
            echo " Menunggu Konfirmasi";
        }
        ?>
    </h1>
    <?php
    if ($role == "siswa"): ?>
        <script src="<?= base_url() ?>dist/js/qrcode.min.js"></script>
        <div id="scanQR" class="pt-5 grid grid-cols-1 justify-items-center border-t-2">
            <h3 class="font-poppins font-bold text-center">Scan QR untuk Verifikasi</h3>

            <div id="qrcode<?= $status->id ?>"
                class="grid grid-cols-1 justify-items-center bg-white w-48 overflow-hidden p-3">

            </div>
            <script>
                var qr = new QRCode(document.getElementById("qrcode<?= $status->id ?>"), {
                });
                qr.makeCode("<?= $status->id ?>");
            </script>
        </div>
    <?php endif;
    ?>

</div>