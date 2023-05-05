<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?= base_url() ?>dist/css/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="icon" href="<?= base_url() ?>dist/images/icons/logo.jpeg" type="image/icon type">
    <title>Reuni Bukber SMKN 2 PWD</title>
    <!-- <link rel="manifest" href="manifest.json"> -->
</head>

<body>
    <div class="min-h-screen">
        <div
            class="realtive h-64 w-full rounded-b-3xl bg-center cursor-pointer bg-no-repeat object-cover z-10 shadow-lg bg-gradient-to-r from-cyan-500 to-blue-500 grid grid-cols-3 justify-items-center place-content-evenly align-items-center px-5">
            <div class="h-28 col-span-2">
                <h2 class="text-2xl font-bold font-poppins text-white">Satpam</h2>
                <p class="text-lg font-bold font-poppins text-white">
                    Nama Satpam
                </p>
                <p class="text-lg font-bold font-poppins text-white">
                    SMKN 1 WIROSARI
                </p>

            </div>
            <div class="">
                <img class="rounded-full w-28 h-28 shadow" src="<?= base_url() ?>dist/images/icons/logo.jpeg">
            </div>



        </div>
        <div class="grid grid-cols-1 justify-items-center w-full gap-3 p-5" id="allContent">
            <div id="scanQR">
                <h3 class="font-poppins font-bold text-center">Scan QR untuk Verifikasi</h3>

                <div class="grid grid-cols-1 justify-items-center bg-white h-64 w-64 rounded-2xl overflow-hidden ">
                    <div class="h-64 w-64 overflow-hidden">
                        <video id="video" class="object-fill"></video>
                    </div>
                    <div class="relative w-64 h-[50px] -top-64 bg-black bg-opacity-60 justify-self-start"></div>
                    <div class="grid gap-2 grid-cols-2 relative w-64 h-[155px]">
                        <div class="relative w-[46px] h-[155px] -top-64 bg-black bg-opacity-60 justify-self-start">
                        </div>
                        <div class="relative w-[46px] h-[155px] -top-64 bg-black bg-opacity-60 justify-self-end"></div>
                    </div>
                    <div class="relative w-64 h-[50px] -top-64 bg-black bg-opacity-60 justify-self-start"></div>
                    <img src="<?= base_url(); ?>dist/images/icons/camScan.png" alt="avatar"
                        class="relative h-48 -top-[480px]">
                </div>
            </div>
            <a href="<?= base_url(); ?>"
                class="px-7 py-3 rounded-lg bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-opacity-80">


                <span class="text-sm font-poppins font-bold text-white">Back</span>
            </a>
        </div>
        <div class="h-36 w-full"></div>
        <div
            class="fixed bottom-0 w-full bg-gradient-to-r from-cyan-500 to-blue-500 rounded-t-3xl grid grid-cols-1 justify-items-center align-items-center place-content-center py-7">
            <a href="https://wa.me/6282242279859?text=Halo+Skansawira+Riset+and+Development+Technology.."
                class="mb-3 px-7 py-3 rounded-lg bg-white hover:bg-opacity-80 w-fit">


                <span class="text-sm font-poppins font-bold text-blue-500">Hubungi Kami</span>
            </a>
            <marquee direction="left" loop="" scrollamount="15">
                <h2 class="text-2xl font-bold font-poppins text-white">Website ini dibuat oleh SKANSAWIRA RISET &
                    DEVELOPMENT TECHNOLOGY, Kami melayani segala kebutuhan teknologi digital anda. Silahkan hubungi kami
                    dengan klik tombol diatas.</h2>
            </marquee>
        </div>
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
                                url: "<?= base_url(); ?>ajax/check_status_pembayaran",
                                type: "POST",
                                data: { uuidSiswa: result.text },
                                success: function (response) {
                                    console.log(response);
                                    $("#scanQR").html(response);
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



    <script src="<?= base_url() ?>node_modules/flowbite/dist/flowbite.min.js"></script>

</body>

</html>