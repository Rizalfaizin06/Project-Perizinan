<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?= base_url() ?>dist/css/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="icon" href="<?= base_url() ?>dist/images/icons/logo.jpeg" type="image/icon type">
    <title>Sistem Perizinan SMKN 1 WIROSARI</title>
    <!-- <link rel="manifest" href="manifest.json"> -->
</head>

<body>
    <!-- component -->
    <div class="relative min-h-screen flex items-center justify-center bg-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 bg-no-repeat bg-cover "
        style="background-image: url(<?= base_url() ?>dist/images/background/bgLogin.jpg);">
        <div class="absolute bg-black opacity-60 inset-0 z-0"></div>


        <div id="chooseRole"
            class="p-5 bg-white grid grid-cols-1 justify-items-center gap-5 items-center w-fit h-fit rounded-xl z-10">
            <?php if (isset($error)): ?>
                <p style="color: red; font-style: italic;">Silahkan Ulangi Registrasi Anda</p>
            <?php endif; ?>
            <h2 class="font-poppins text-center align-self-center text-2xl">Pilih Tipe User</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 justify-items-center items-center w-full">
                <div
                    class="w-full max-w-sm bg-white border-2 border-gray-300 border-dashed rounded-lg shadow-2xl px-5 py-8 items-center">
                    <div class="grid grid-cols-1 gap-4 justify-items-center items-center">
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg border-2 border-gray-300"
                            src="<?= base_url() ?>dist/images/icons/logo.jpeg" alt="Bonnie image" />
                        <span class="text-sm text-gray-500 dark:text-gray-400">Daftar Sebagai</span>
                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Siswa</h5>
                        <form action="<?= base_url("Auth/registrasi") ?>" method="post">
                            <button id="btnChooseSiswa" type="submit" value="btnChooseSiswa" name="btnChooseSiswa"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-primary rounded-lg hover:bg-opacity-90 focus:ring-4 focus:outline-none">Daftar</button>
                        </form>

                    </div>
                </div>
                <div
                    class="w-full max-w-sm bg-white border-2 border-gray-300 border-dashed rounded-lg shadow-2xl px-5 py-8 items-center">
                    <div class="grid grid-cols-1 gap-4 justify-items-center items-center">
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg border-2 border-gray-300"
                            src="<?= base_url() ?>dist/images/icons/logo.jpeg" alt="Bonnie image" />
                        <span class="text-sm text-gray-500 dark:text-gray-400">Daftar Sebagai</span>
                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Wali Kelas</h5>

                        <form action="<?= base_url("Auth/registrasi") ?>" method="post">
                            <button id="btnChooseWakel " type="submit" value="btnChooseWakel" name="btnChooseWakel"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-primary rounded-lg hover:bg-opacity-90 focus:ring-4 focus:outline-none">Daftar</button>
                        </form>

                    </div>
                </div>
                <div
                    class="w-full max-w-sm bg-white border-2 border-gray-300 border-dashed rounded-lg shadow-2xl px-5 py-8 items-center">
                    <div class="grid grid-cols-1 gap-4 justify-items-center items-center">
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg border-2 border-gray-300"
                            src="<?= base_url() ?>dist/images/icons/logo.jpeg" alt="Bonnie image" />
                        <span class="text-sm text-gray-500 dark:text-gray-400">Daftar Sebagai</span>
                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">BK</h5>

                        <form action="<?= base_url("Auth/registrasi") ?>" method="post">
                            <button id="btnChooseBK " type="submit" value="btnChooseBK" name="btnChooseBK"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-primary rounded-lg hover:bg-opacity-90 focus:ring-4 focus:outline-none">Daftar</button>
                        </form>

                    </div>
                </div>
                <div
                    class="w-full max-w-sm bg-white border-2 border-gray-300 border-dashed rounded-lg shadow-2xl px-5 py-8 items-center">
                    <div class="grid grid-cols-1 gap-4 justify-items-center items-center">
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg border-2 border-gray-300"
                            src="<?= base_url() ?>dist/images/icons/logo.jpeg" alt="Bonnie image" />
                        <span class="text-sm text-gray-500 dark:text-gray-400">Daftar Sebagai</span>
                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Satpam</h5>

                        <form action="<?= base_url("Auth/registrasi") ?>" method="post">
                            <button id="btnChooseSatpam " type="submit" value="btnChooseSatpam" name="btnChooseSatpam"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-primary rounded-lg hover:bg-opacity-90 focus:ring-4 focus:outline-none">Daftar</button>
                        </form>

                    </div>
                </div>
            </div>
            <a href="<?= base_url("Auth/login") ?>"
                class="inline-flex items-center px-4 py-2 mr-5 text-sm font-medium text-center text-white bg-primary rounded-lg hover:bg-opacity-90 focus:ring-4 focus:outline-none">Back</a>
        </div>





    </div>




    <script src="<?= base_url() ?>node_modules/flowbite/dist/flowbite.min.js"></script>
    <script src="<?= base_url() ?>dist/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        // const tahunSekarang = new Date().getFullYear();

        // for (let i = tahunSekarang - 1; i >= 2010; i--) {
        //     $('#tahunLulus').append($('<option>', {
        //         value: i,
        //         text: i
        //     }));
        // }



    </script>

</body>

</html>