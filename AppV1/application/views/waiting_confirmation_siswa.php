<!DOCTYPE html>
<html>

<head>
    <title>Izin</title>
</head>

<body>
    <!-- <?php if ($error): ?>
        <div style="color: red;">
            <?php echo $error; ?>
        </div>
    <?php endif; ?> -->

    <!-- <?php var_dump($status); ?> -->
    <!-- <?php var_dump($info->waktuMulai); ?> -->


    <label for="waktuMulai">Waktu Mulai :</label>
    <input type="text" name="waktuMulai" disabled>
    <?= $row->kbm; ?><br>

    <label for="waktuSelesai">Waktu Selesai :</label>
    <select id="waktuSelesai" name="waktuSelesai" required>
        <?php
        $count = 1;
        foreach ($kbm as $row):
            ?>
            <option value="<?= $row->kbm; ?>"><?= $row->kbm; ?></option>
            <?php $count++; endforeach; ?>
    </select>
    <br>


    <label>Alasan :</label>
    <input type="text" name="alasan" required><br>






















</body>

</html>