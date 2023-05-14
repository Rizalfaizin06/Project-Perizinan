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



    <div class="relative min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 bg-no-repeat bg-cover"
        style="background-image: url('<?= base_url() ?>dist/images/background/bgLogin.jpg');">
        <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
        <div class="max-w-md w-full space-y-8 p-10 bg-white rounded-xl z-10">
            <div class="text-center">
                <h2 class="mt-6 text-3xl font-bold font-poppins text-gray-900">
                    Selamat Datang
                </h2>
                <p class="mt-2 text-sm text-gray-600">Silahkan login dengan akun anda</p>

                <?php if (isset($error)): ?>
                    <p class="mt-2 text-sm text-red-500">
                        <?= $error ?>
                    </p>
                <?php endif; ?>
            </div>

            <form class="mt-8 space-y-6" action="<?= base_url() ?>auth/login" method="POST">
                <input type="hidden" name="remember" value="true">
                <div class="relative">

                    <label class="text-sm font-bold text-gray-700 tracking-wide">Username</label>
                    <input id="username" name="username"
                        class=" w-full text-base py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-primary focus:border-primary"
                        type="text" placeholder="Masukkan username" value="">
                </div>
                <div class="mt-8 content-center">
                    <label class="text-sm font-bold text-gray-700 tracking-wide">
                        Password
                    </label>
                    <input id="password" name="password"
                        class="w-full content-center text-base py-2  border border-gray-300 rounded-xl  focus:outline-none focus:ring-primary focus:border-primary"
                        type="password" placeholder="Masukkan password" value="">
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="rememberMe" name="rememberMe" type="checkbox"
                            class="h-4 w-4 bg-primary focus:ring-primary border-gray-300 rounded">
                        <label for="rememberMe" class="ml-2 block text-sm text-gray-900">
                            Remember me
                        </label>
                    </div>
                    <div class="text-sm">
                        <a onclick="return alert('Untuk Sementara Dapat Menghubungi Admin Untuk Reset Password');"
                            class="font-medium text-primary hover:text-primary">
                            Forgot your password?
                        </a>
                    </div>
                </div>
                <div>
                    <button type="submit" name="login" value="Login"
                        class="w-full flex justify-center bg-primary text-gray-100 p-4  rounded-full tracking-wide font-semibold  focus:outline-none focus:shadow-outline hover:bg-opacity-50 shadow-lg cursor-pointer transition ease-in duration-100">
                        Sign in
                    </button>
                </div>
                <p class="flex flex-col items-center justify-center mt-10 text-center text-md text-gray-500">
                    <span>Belum terdaftar sebagai member?</span>
                    <a href="<?= base_url() ?>auth/registrasi"
                        class="text-primary hover:text-primary no-underline hover:underline cursor-pointer transition ease-in duration-300">Sign
                        up</a>
                </p>
            </form>
        </div>
    </div>
    <script src="<?= base_url() ?>node_modules/flowbite/dist/flowbite.min.js"></script>
</body>

</html>