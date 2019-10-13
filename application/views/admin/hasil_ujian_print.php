<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Hasil Ujian</title>
    <link href="<?php echo site_url('assets/css/print.css'); ?>" rel="stylesheet" type="text/css">
</head>
<body>
    <h1>Hasil Ujian</h1>
    <h3><?php echo $ujian->judul; ?></h3>
    <table width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Skor</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 1; ?>
            <?php foreach ($rows as $row) { ?>
            <tr>
                <td><?php echo $counter; ?></td>
                <td><?php echo $row->nama; ?></td>
                <td><?php echo $row->kelas; ?></td>
                <td><?php echo $row->skor; ?></td>
            </tr>
            <?php $counter++; ?>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>