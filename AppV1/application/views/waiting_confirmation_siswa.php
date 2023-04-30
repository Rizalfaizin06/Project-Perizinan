<!DOCTYPE html>
<html>

<head>
    <title>Izin</title>
</head>

<body>
    <!-- <?php if ($error): ?>
        <div style="color: red;">
            <?php echo $error; ?>
        </div>
    <?php endif; ?> -->

    <?php var_dump($uuid); ?>
    <!-- <?php var_dump($info->waktuMulai); ?> -->

    <h1>WAITING</h1>
    <label for="waktuMulai">Waktu Mulai :</label>
    <input type="text" name="waktuMulai" disabled value="<?= $info->waktuMulai; ?>">
    <br>

    <label for="waktuSelesai">Waktu Selesai :</label>
    <input id="waktuSelesai" name="waktuSelesai" disabled value="<?= $info->waktuSelesai; ?>">

    <br>

    <label>Alasan :</label>
    <input id="waktuSelesai" name="alasan" disabled value="<?= $info->alasan; ?>">
    <br>

    <label>Konfirmasi BK :</label>
    <input id="waktuSelesai" name="alasan" disabled value="<?= $info->konfirmasiBK; ?>">
    <br>

    <label>Konfirmasi Wali Kelas :</label>
    <input id="waktuSelesai" name="alasan" disabled value="<?= $info->konfirmasiWakel; ?>">
    <br>








    <div class="grid grid-cols-1 justify-items-center w-full gap-3 p-5" id="allContent">

        <h3 id="result" class="font-poppins font-bold">Scan QR untuk membayar</h3>

        <div class="grid grid-cols-1 justify-items-center bg-white h-64 w-64 rounded-2xl overflow-hidden ">
            <div class="h-64 w-64 overflow-hidden">
                <video id="video" class="object-fill"></video>
            </div>
            <div class="relative w-64 h-[50px] -top-64 bg-black bg-opacity-60 justify-self-start"></div>
            <div class="grid gap-2 grid-cols-2 relative w-64 h-[155px]">
                <div class="relative w-[46px] h-[155px] -top-64 bg-black bg-opacity-60 justify-self-start"></div>
                <div class="relative w-[46px] h-[155px] -top-64 bg-black bg-opacity-60 justify-self-end"></div>
            </div>
            <div class="relative w-64 h-[50px] -top-64 bg-black bg-opacity-60 justify-self-start"></div>
            <img src="assets/icons/camScan.png" alt="avatar" class="relative h-48 -top-[480px]">
        </div>

        <a href="index.php" class="px-7 py-3 rounded-lg bg-primary hover:bg-opacity-80">


            <span class="text-sm font-poppins font-bold text-white">Back</span>
        </a>
    </div>




    <script src="<?= base_url(); ?>dist/js/jquery-3.6.0.min.js"></script>

    <script type="text/javascript" src="<?= base_url(); ?>dist/js/zxing.min.js"></script>



    <script type="text/javascript">
        console.log("muali");
        setInterval(function () {
            $.ajax({
                url: "<?php echo base_url(); ?>ajax/get_status_konfirmasi",
                type: "post",
                data: { id: idDetail },
                success: function (response) {
                    console.log(response);
                    $("#allContent").html(response);
                }
            });
        }, 1000); // interval diatur dalam milidetik (ms)

    </script>

















</body>

</html>