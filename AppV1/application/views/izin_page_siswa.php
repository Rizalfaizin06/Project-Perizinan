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
    <title>Reuni Bukber SMKN 2 PWD</title>
    <!-- <link rel="manifest" href="manifest.json"> -->
</head>

<body>
    <!-- component -->
    <div class="relative min-h-screen flex items-center justify-center bg-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 bg-no-repeat bg-cover "
        style="background-image: url(<?= base_url() ?>dist/images/background/bgLogin.jpg);">
        <div class="absolute bg-black opacity-60 inset-0 z-0"></div>


        <div id="registPane" class="max-w-xl w-full space-y-8 p-10 bg-white rounded-xl shadow-lg z-10">
            <div class="grid  gap-8 grid-cols-1">
                <div class="flex flex-col ">
                    <div class="flex flex-col sm:flex-row items-center">
                        <h2 class="font-semibold font-poppins text-2xl text-center">Buat Surat Izin</h2>
                        <div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
                    </div>
                    <div class="flex flex-col sm:flex-row items-center">
                        <h2 class="font-normal font-poppins text-lg text-center">
                            isilah data dengan bijak
                        </h2>

                        <div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>

                    </div>
                    <?php if (isset($error)): ?>
                        <p class="font-poppins text-sm text-red-500 mt-3" id="error">
                            <?= $error; ?>
                        </p>
                    <?php endif; ?>
                    <div class="mt-5">
                        <div>
                            <form action="<?= base_url() ?>dashboard/confirmation_waiting" method="post">

                                <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
                                    <div class="w-full flex flex-col mb-3">
                                        <label class="font-poppins font-semibold text-gray-600 py-2">waktu Mulai</label>
                                        <select id="waktuMulai" name="waktuMulai"
                                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                            required>
                                            <?php
                                            $count = 1;
                                            foreach ($kbm as $row):
                                                ?>
                                                <option value="<?= $row->kbm; ?>"><?= $row->kbm; ?></option>
                                                <?php $count++; endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="w-full flex flex-col mb-3">
                                        <label class="font-poppins font-semibold text-gray-600 py-2">waktu
                                            Selesai</label>
                                        <select id="waktuSelesai" name="waktuSelesai"
                                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                            required>
                                            <?php
                                            $count = 1; foreach ($kbm as $row):
                                                ?>
                                                <option value="<?= $row->kbm; ?>"><?= $row->kbm; ?></option>
                                                <?php $count++; endforeach; ?>
                                        </select>
                                        <p class="font-poppins text-sm text-red-500 hidden mt-3" id="error">Please
                                            fill
                                            out
                                            this field.
                                        </p>
                                    </div>
                                </div>



                                <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                    <div class="mb-3 space-y-2 w-full text-xs">
                                        <label class="font-poppins font-semibold text-gray-600 py-2">Alasan</label>
                                        <textarea rows="4" placeholder="Masukkan Alasan"
                                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg px-4"
                                            required name="alasan" id="alasan"></textarea>
                                    </div>
                                </div>













                                <!-- <p class="font-poppins text-xs text-red-500 text-right my-3">Required fields are marked with
                                an
                                asterisk <abbr title="Required field">*</abbr></p> -->
                                <div class="mt-5 text-center md:text-right md:space-x-3 md:block flex flex-col-reverse">
                                    <a href="<?= base_url() ?>"
                                        class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                                        <span class="">Cancel</span> </a>
                                    <button type="submit"
                                        class="mb-2 md:mb-0 bg-primary px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-opacity-90"
                                        name="izin" value="izin"
                                        onclick="return confirm('Apakah Data Sudah Benar?');">Proses</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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