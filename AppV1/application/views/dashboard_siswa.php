<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
</head>

<body>
    <h1>Selamat datang di halaman dashboard SISwa</h1>
    <?= $this->session->userdata('user_role'); ?>
    <a href="<?= base_url() ?>dashboard/perizinan">IZIN</a>
    <a href="<?php echo site_url('auth/logout'); ?>">Logout</a>
</body>

</html>