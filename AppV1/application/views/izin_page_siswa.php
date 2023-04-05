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


    <form method="post" action="<?= base_url() ?>/dashboard/perizinan">

        <label for="waktuMulai">Waktu Mulai :</label>
        <select id="waktuMulai" name="waktuMulai" required>
            <?php
            $count = 1;
            foreach ($kbm as $row):
                ?>
                <option value="<?= $row->kbm; ?>"><?= $row->kbm; ?></option>
                <?php $count++; endforeach; ?>
        </select>
        <br>
        <label for="waktuSelesai">Waktu Selesai :</label>
        <select id="waktuSelesai" name="waktuSelesai" required>
            <?php
            $count = 1; foreach ($kbm as $row):
                ?>
                <option value="<?= $row->kbm; ?>"><?= $row->kbm; ?></option>
                <?php $count++; endforeach; ?>
        </select>
        <br>


        <label>Alasan :</label>
        <input type="text" name="alasan" required><br>
        <input type="submit" name="izin" value="izin">
    </form>
</body>

</html>