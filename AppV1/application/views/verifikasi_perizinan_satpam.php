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

    <!-- <?php var_dump($uuid); ?> -->
    <!-- <?php var_dump($info->waktuMulai); ?> -->

    <h1>Verifikasi</h1>







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
        window.addEventListener('load', function () {
            let selectedDeviceId;
            const codeReader = new ZXing.BrowserMultiFormatReader()
            console.log('ZXing code reader initialized')
            codeReader.listVideoInputDevices()
                .then((videoInputDevices) => {
                    const sourceSelect = document.getElementById('sourceSelect')
                    selectedDeviceId = videoInputDevices[0].deviceId

                    if (videoInputDevices.length > 1) {
                        selectedDeviceId = videoInputDevices[1].deviceId
                    }

                    codeReader.decodeFromVideoDevice(selectedDeviceId, 'video', (result, err) => {
                        if (result) {
                            console.log(result);
                            // document.getElementById('result').textContent = result.text;
                            codeReader.reset();
                            $.ajax({
                                url: "<?php echo base_url(); ?>ajax/check_status_perizinan",
                                type: "POST",
                                data: { uuidSiswa: result.text },
                                success: function (response) {
                                    console.log(response);
                                    $("#allContent").html(response);
                                }
                            });


                        }
                        if (err && !(err instanceof ZXing.NotFoundException)) {
                            console.error(err)
                            document.getElementById('result').textContent = err
                        }
                    })
                    console.log(`Started continous decode from camera with id ${selectedDeviceId}`)


                })
                .catch((err) => {
                    console.error(err)
                })
        })
    </script>

















</body>

</html>