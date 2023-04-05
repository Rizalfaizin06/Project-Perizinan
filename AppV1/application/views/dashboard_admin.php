<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
</head>

<body>
    <h1>Selamat datang di halaman dashboard Admin</h1>
    <?= $this->session->userdata('user_role'); ?>
    <a href="<?php echo site_url('auth/logout'); ?>">Logout</a>
</body>

</html>