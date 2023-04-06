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
    <?php var_dump($konfirmasiBK); ?>
    <div id="container">
        <h1>
            <?= $konfirmasiBK; ?>
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
            ?>
        </h1>

    </div>

</body>

</html>