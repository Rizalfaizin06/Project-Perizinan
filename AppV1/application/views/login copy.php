<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <?php if ($error): ?>
        <div style="color: red;">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>
    <form method="post" action="<?= base_url() ?>">
        <label>Username:</label>
        <input type="text" name="username" required><br>
        <label>Password :</label>
        <input type="password" name="password" required><br>
        <input type="submit" name="login" value="Login">
    </form>
</body>

</html>