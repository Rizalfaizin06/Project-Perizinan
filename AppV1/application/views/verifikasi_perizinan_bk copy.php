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

    <!-- <?php var_dump($uuid); ?> -->
    <!-- <?php var_dump($info->waktuMulai); ?> -->

    <h1>Verifikasi BK</h1>








    <table class="table">
        <thead>
            <tr>
                <th>uuid.</th>

                <th>konfirmasiBK</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($izin as $row):
                ?>
                <tr>
                    <td>
                        <?= $row->uuid; ?>
                    </td>
                    <td>
                        <?= $row->konfirmasiBK; ?>
                    </td>
                    <td>
                        <form action="<?= base_url() ?>dashboard/update_confirmation" method="post">
                            <div class="input-group mb-3">
                                <input type="hidden" name="id" value="<?= $row->id; ?>" class="form-control">
                                <input type="submit" name="confirm" value="Konfirmasi" class="btn btn-primary">
                                <input type="submit" name="reject" value="Tolak" class="btn btn-primary">
                            </div>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?= base_url() ?>">Home</a>

</body>

</html>