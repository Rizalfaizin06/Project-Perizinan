<?php
if (!isset($error)):
    if ($statValue == 100): ?>

        <script src="<?= base_url() ?>dist/js/qrcode.min.js"></script>
        <div class="pt-5 grid grid-cols-1 justify-items-center">
            <h3 class="font-poppins font-bold text-center">Perizinan Terverifikasi</h3>

            <div class="grid grid-cols-1 justify-items-center bg-white w-48 overflow-hidden p-3">
                <img src="<?= base_url() ?>dist/images/icons/verified.png" alt="" srcset="">
            </div>
        </div>
    <?php elseif ($statValue == 50):
        ?>
        <div class="pt-5 grid grid-cols-1 justify-items-center border-t-2">
            <h3 class="font-poppins font-bold text-center">Menunggu Konfirmasi</h3>

            <div class="grid grid-cols-1 justify-items-center bg-white w-48 overflow-hidden p-3">
                <img src="<?= base_url() ?>dist/images/icons/waiting.gif" alt="" srcset="">
            </div>
        </div>
    <?php elseif ($statValue == 0):
        ?>
        <div class="pt-5 grid grid-cols-1 justify-items-center border-t-2">
            <h3 class="font-poppins font-bold text-center">Perizinan Ditolak</h3>

            <div class="grid grid-cols-1 justify-items-center bg-white w-48 overflow-hidden p-3">
                <img src="<?= base_url() ?>dist/images/icons/notVerified.png" alt="" srcset="">
            </div>
        </div>
    <?php endif;
else: ?>
    <div class="pt-5 grid grid-cols-1 justify-items-center border-t-2">
        <h3 class="font-poppins font-bold text-center">QR Code Salah</h3>

        <div class="grid grid-cols-1 justify-items-center bg-white w-48 overflow-hidden p-3">
            <img src="<?= base_url() ?>dist/images/icons/notVerified.png" alt="" srcset="">
        </div>
    </div>
    <?php
endif;
?>