<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>


</head>

<body>
    <div id="container">
        <h1>
            <!-- <?= $konfirmasiBK; ?>
            <?= $konfirmasiWakel; ?>
            <?php
            if ($konfirmasiBK == 1 && $konfirmasiWakel == 1) {
                echo "perizinan terverifikasi";
            } elseif ($konfirmasiBK == 0 && $konfirmasiWakel == 1) {
                echo "Belum Dikonfirmasi BK";
            } elseif ($konfirmasiWakel == 0 && $konfirmasiBK == 1) {
                echo "Belum Dikonfirmasi Wali Kelas";
            } else {
                echo "Menunggu Konfirmasi";
            }
            ?> -->
        </h1>
        <label for="waktuMulai">Waktu Mulai :</label>
        <input type="text" name="waktuMulai" disabled value="<?= $status->waktuMulai; ?>">
        <br>

        <label for="waktuSelesai">Waktu Selesai :</label>
        <input id="waktuSelesai" name="waktuSelesai" disabled value="<?= $status->waktuSelesai; ?>">

        <br>

        <label>Alasan :</label>
        <input id="waktuSelesai" name="alasan" disabled value="<?= $status->alasan; ?>">
        <br>

        <label>Konfirmasi BK :</label>
        <input id="waktuSelesai" name="alasan" disabled value="<?= $status->konfirmasiBK; ?>">
        <br>

        <label>Konfirmasi Wali Kelas :</label>
        <input id="waktuSelesai" name="alasan" disabled value="<?= $status->konfirmasiWakel; ?>">
        <br>
    </div>

</body>

</html>