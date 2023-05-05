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


        <label for="waktuMulai">Waktu Mulai :</label>
        <input name="waktuMulai" disabled value="<?= $status->waktuMulai; ?>">
        <br>

        <label for="waktuSelesai">Waktu Selesai :</label>
        <input id="waktuSelesai" name="waktuSelesai" disabled value="<?= $status->waktuSelesai; ?>">
        <br>

        <label>Alasan :</label>
        <input id="waktuSelesai" name="alasan" disabled value="<?= $status->alasan; ?>">
        <br>

        <label>Konfirmasi BK :</label>
        <input id="waktuSelesai" name="alasan" disabled
            value="<?= ($status->konfirmasiBK == 0) ? 'Belum Dikonfirmasi' : 'Sudah Dikonfirmasi' ?>">
        <br>

        <label>Konfirmasi Wali Kelas :</label>
        <input id="waktuSelesai" name="alasan" disabled
            value="<?= ($status->konfirmasiWakel == 0) ? 'Belum Dikonfirmasi' : 'Sudah Dikonfirmasi' ?>">
        <br>

        <h1>
            <?php
            if ($status->konfirmasiBK == 1 && $status->konfirmasiWakel == 1) {
                echo "perizinan terverifikasi";
            } elseif ($status->konfirmasiBK == 0 && $status->konfirmasiWakel == 1) {
                echo "Belum Dikonfirmasi BK";
            } elseif ($status->konfirmasiWakel == 0 && $status->konfirmasiBK == 1) {
                echo "Belum Dikonfirmasi Wali Kelas";
            } else {
                echo "Menunggu Konfirmasi";
            }
            ?>
        </h1>

    </div>
</body>

</html>