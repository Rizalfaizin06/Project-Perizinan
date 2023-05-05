<!-- <?php var_dump($konfirmasiBK); ?> -->

<div id="scanQR">
    <?php
    if ($status == 1): ?>
        <h3 class="font-poppins font-bold text-center">Pembayaran Terverifikasi</h3>
    <?php else: ?>
        <h3 class="font-poppins font-bold text-center">Pembayaran Tidak Terverifikasi</h3>

    <?php endif; ?>
    <div class="grid grid-cols-1 justify-items-center bg-white w-64 rounded-2xl overflow-hidden mt-5">
        <?php if ($status == 1): ?>
            <img src="<?= base_url(); ?>dist/images/icons/verified.png" alt="avatar">
        <?php else: ?>
            <img src="<?= base_url(); ?>dist/images/icons/notVerified.png" alt="avatar">

        <?php endif; ?>
    </div>
</div>