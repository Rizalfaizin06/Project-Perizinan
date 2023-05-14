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
    <title>Sistem Perizinan SMKN 1 Wirosari</title>
    <!-- <link rel="manifest" href="manifest.json"> -->
</head>



<body>


    <div class="min-h-screen">
        <div
            class="realtive h-64 w-full rounded-b-3xl bg-center cursor-pointer bg-no-repeat object-cover z-10 shadow-lg bg-gradient-to-r from-cyan-500 to-blue-500 grid grid-cols-3 justify-items-center place-content-evenly align-items-center px-5">
            <div class="h-28 col-span-2">
                <h2 class="text-2xl font-bold font-poppins text-white">BK</h2>
                <p class="text-lg font-bold font-poppins text-white">
                    Nama Guru BK
                </p>
                <p class="text-lg font-bold font-poppins text-white">
                    SMKN 1 Wirosari
                </p>

            </div>
            <div class="">
                <img class="rounded-full w-28 h-28 shadow" src="<?= base_url() ?>dist/images/icons/logo.jpeg">
            </div>
        </div>
        <!-- <div class="p-5">
            <h2 colspan="11"
                class="text-center text-2xl bg-gradient-to-r from-cyan-300 to-blue-400 font-bold rounded-lg text-white w-full m-5 p-3">
                alumni
            </h2>
        </div> -->
        <div class="h-24 md:h-8 w-full px-3 pt-8 grid grid-cols-1 md:grid-cols-2 gap-3">
            <a href="<?= base_url() ?>"
                class="px-7 py-3 rounded-lg bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-opacity-80 w-fit">


                <span class="text-sm font-poppins font-bold text-white">Home</span>
            </a>


            <div class="">
                <form action="<?= base_url('dashboard/verifikasi') ?>" method="post">
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="search" id="search" name="search"
                            class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Cari nama" value="<?= (isset($search)) ? $search : '' ?>">
                        <button type="submit"
                            class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
                </form>
            </div>

        </div>
        <div class="w-full p-5">
            <?php
            if ($totalRow != 0):

                ?>
                <div class="w-full overflow-y-auto pt-0" id="allContent">
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead class="text-xs text-gray-500 uppercase w-full">
                            <tr>
                                <th colspan="4" class="p-5">
                                </th>
                            </tr>
                            <tr>
                                <th scope="col" class="px-2 py-3">
                                    No
                                </th>
                                <th scope="col" class="px-2 py-3 sticky left-0 bg-white">
                                    Tanggal
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    Alasan
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    Detail
                                </th>

                            </tr>
                            <tr>
                                <th colspan="4">
                                    <div class="border-t-2 border-dashed border-gray-400 w-full"></div>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $count = $row + 1;
                            foreach ($dataIzin->result() as $row):
                                ?>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white ">
                                        <?= $count; ?>

                                    </th>
                                    <th scope="row"
                                        class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white sticky left-0 bg-white">
                                        <?= $row->createdAt; ?>
                                    </th>
                                    <td scope="row"
                                        class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <?= $row->alasan; ?>
                                    </td>

                                    <td scope="row"
                                        class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                                        <form action="<?= base_url() ?>dashboard/detail_izin" method="post">
                                            <div class="input-group mb-3">
                                                <input type="hidden" name="id" value="<?= $row->id; ?>" class="form-control">
                                                <!-- <input type="submit" name="confirm" value="Konfirmasi" class="btn btn-primary">
                                        <input type="submit" name="reject" value="Tolak" class="btn btn-primary"> -->

                                                <button data-modal-target="defaultModal<?= $row->id; ?>"
                                                    data-modal-toggle="defaultModal<?= $row->id; ?>" type="button"
                                                    name="detailIzin" value="detailIzin"
                                                    class="px-3 py-2 rounded-lg bg-primary hover:bg-opacity-80"
                                                    onclick="detailView(<?= $row->id; ?>)">


                                                    <span class="text-xs font-poppins font-bold text-white">Detail</span>

                                                </button>


                                            </div>
                                        </form>
                                    </td>

                                    <!-- Modal toggle -->


                                    <!-- Main modal -->
                                    <div id="defaultModal<?= $row->id; ?>" tabindex="-1" aria-hidden="true"
                                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-2xl max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div
                                                    class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                        Detail Izin
                                                    </h3>
                                                    <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="defaultModal<?= $row->id; ?>">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="p-6 space-y-6">

                                                    <p id="allContent<?= $row->id; ?>"
                                                        class="text-base leading-relaxed text-gray-500 dark:text-gray-400">

                                                    </p>


                                                </div>
                                                <!-- Modal footer -->
                                                <div
                                                    class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">

                                                    <form action="<?= base_url() ?>dashboard/update_confirmation" method="post">
                                                        <input type="hidden" name="id" value="<?= $row->id; ?>"
                                                            class="form-control">

                                                        <button data-modal-hide="defaultModal<?= $row->id; ?>" type="submit"
                                                            name="Konfirmasi"
                                                            onclick="return confirm('Apakah Sudah Benar diizinkan?');"
                                                            value="Konfirmasi"
                                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Izinkan</button>
                                                        <button data-modal-hide="defaultModal<?= $row->id; ?>" type="submit"
                                                            name="Tolak"
                                                            onclick="return confirm('Apakah Sudah Benar Ditolak?');"
                                                            value="Tolak"
                                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tolak</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <?php $count++; endforeach;
                            ?>
                            </tr>




                        </tbody>


                    </table>

                </div>
            <?php endif; ?>
        </div>
        <div class="h-fit w-full  grid grid-cols-1 gap-3 justify-items-center place-content-evenly align-items-center ">


            <?php
            if ($totalRow == 0):

                ?>
                <h2 class="text-xl font-poppins font-bold text-center mr-2 md:mr-8 mt-24 text-red-500">
                    Tidak ada data alumni
                </h2>
            <?php else: ?>
                <h2 class="text-xl font-poppins font-bold text-center mr-2 md:mr-8 mt-2">
                    Total Peserta :
                    <?= $totalRow; ?>
                </h2>
            <?php endif; ?>


            <div>
                <?= $pagination; ?>
            </div>
        </div>
        <!-- <div class="h-5 w-full"></div>
        <a href="<?= base_url() ?>"
            class="px-7 py-3 rounded-lg bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-opacity-80">


            <span class="text-sm font-poppins font-bold text-white">Home</span>
        </a> -->
        <div class="h-40 w-full"></div>

    </div>
    <div
        class="fixed bottom-0 w-full bg-gradient-to-r from-cyan-500 to-blue-500 rounded-t-3xl grid grid-cols-1 justify-items-center align-items-center place-content-center py-7">
        <div
            class="fixed bottom-0 w-full bg-gradient-to-r from-cyan-500 to-blue-500 rounded-t-3xl grid grid-cols-1 justify-items-center align-items-center place-content-center py-7">
            <div
                class="fixed bottom-0 w-full bg-gradient-to-r from-cyan-500 to-blue-500 rounded-t-3xl grid grid-cols-1 justify-items-center align-items-center place-content-center py-7">
                <h2 class="text-2xl font-bold font-poppins text-white">SMKN 1 WIROSARI</h2>
            </div>
        </div>




    </div>






    <script src="<?= base_url(); ?>dist/js/jquery-3.6.0.min.js"></script>

    <script type="text/javascript" src="<?= base_url(); ?>dist/js/zxing.min.js"></script>

    <script type="text/javascript">
        console.log("muali");
        // setInterval(function () {
        //     $.ajax({
        //         url: "<?php echo base_url(); ?>ajax/get_status_konfirmasi",
        //         type: "post",
        //         data: { id: <?= $row->id; ?> },
        //         success: function (response) {
        //             console.log(response);
        //             $("#allContent<?= $row->id; ?>").html(response);
        //         }
        //     });
        // }, 1000); // interval diatur dalam milidetik (ms)
        function detailView(idDetail) {
            $.ajax({
                url: "<?php echo base_url(); ?>ajax/get_status_konfirmasi",
                type: "post",
                data: { id: idDetail },
                success: function (response) {
                    console.log(response);
                    $("#allContent" + idDetail).html(response);
                }
            });
        }
    </script>





    <script src="<?= base_url() ?>node_modules/flowbite/dist/flowbite.min.js"></script>
</body>

</html>