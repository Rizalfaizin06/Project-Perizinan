<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
</head>

<body>
    <h1>Selamat datang di halaman dashboard</h1>
    <?= $this->session->userdata('user_id'); ?>
    <a href="<?php echo site_url('auth/logout'); ?>">Logout</a>
</body>

</html>