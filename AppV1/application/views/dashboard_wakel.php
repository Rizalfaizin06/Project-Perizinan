<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
</head>

<body>
    <h1>Selamat datang di halaman dashboard Wali KElasss</h1>
    <?= $this->session->userdata('user_role'); ?>
    <a href="<?= base_url() ?>dashboard/verifikasi">verifikasi perizinan</a>
    <a href="<?php echo site_url('auth/logout'); ?>">Logout</a>
</body>

</html>