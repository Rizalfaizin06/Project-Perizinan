<div id="container">
    <p class="text-lg font-poppins">
        Nama :
        <?= $status->nama; ?>
    </p>
    <p class="text-lg font-poppins">
        Alasan :
        <?= $status->alasan; ?>
    </p>
    <p class="text-lg font-poppins">
        Waktu Mulai :
        <?= $status->waktuMulai; ?>
    </p>
    <p class="text-lg font-poppins">
        Waktu Selesai :
        <?= $status->waktuSelesai; ?>
    </p>

    <!-- <label>BK :</label>
    <input id="waktuSelesai" name="alasan" disabled
        value="<?= ($status->konfirmasiBK == 0) ? 'Belum Dikonfirmasi' : 'Sudah Dikonfirmasi' ?>">
    <br>

    <label>Wali Kelas :</label>
    <input id="waktuSelesai" name="alasan" disabled
        value="<?= ($status->konfirmasiWakel == 0) ? 'Belum Dikonfirmasi' : 'Sudah Dikonfirmasi' ?>">
    <br> -->

    <p class="text-lg font-poppins">
        status :
        <?php

        if ($status->reject == 0) {
            if ($status->konfirmasiBK == 1 && $status->konfirmasiWakel == 1) {
                $statValue = 100;
                echo " perizinan terverifikasi";
            } elseif ($status->konfirmasiBK == 0 && $status->konfirmasiWakel == 1) {
                $statValue = 50;
                echo " Belum Dikonfirmasi BK";
            } elseif ($status->konfirmasiWakel == 0 && $status->konfirmasiBK == 1) {
                echo " Belum Dikonfirmasi Wali Kelas";
                $statValue = 50;
            } else {
                $statValue = 50;
                echo " Menunggu Konfirmasi";
            }
        } else {
            $statValue = 0;
            echo " Perizinan Ditolak !";
        }
        ?>
    </p>
    <?php
    if ($role == "siswa"):
        if ($statValue == 100): ?>

            <script src="<?= base_url() ?>dist/js/qrcode.min.js"></script>
            <div id="scanQR" class="pt-5 grid grid-cols-1 justify-items-center border-t-2">
                <h3 class="font-poppins font-bold text-center">Scan QR untuk Verifikasi</h3>

                <div id="qrcode<?= $status->perizinan_id ?>"
                    class="grid grid-cols-1 justify-items-center bg-white w-full overflow-hidden p-3">

                </div>
                <script>
                    var qr = new QRCode(document.getElementById("qrcode<?= $status->perizinan_id ?>"), {
                    });
                    qr.makeCode("<?= $encryptId ?>");
                </script>
            </div>
        <?php elseif ($statValue == 50):
            ?>
            <div id="scanQR" class="pt-5 grid grid-cols-1 justify-items-center border-t-2">
                <h3 class="font-poppins font-bold text-center">Menunggu Konfirmasi</h3>

                <div class="grid grid-cols-1 justify-items-center bg-white w-48 overflow-hidden p-3">
                    <img src="<?= base_url() ?>dist/images/icons/waiting.gif" alt="" srcset="">
                </div>
            </div>
        <?php elseif ($statValue == 0):
            ?>
            <div id="scanQR" class="pt-5 grid grid-cols-1 justify-items-center border-t-2">
                <h3 class="font-poppins font-bold text-center">Perizinan Ditolak</h3>

                <div class="grid grid-cols-1 justify-items-center bg-white w-48 overflow-hidden p-3">
                    <img src="<?= base_url() ?>dist/images/icons/notVerified.png" alt="" srcset="">
                </div>
            </div>
        <?php endif;
        ?>

    <?php endif;
    ?>

</div>