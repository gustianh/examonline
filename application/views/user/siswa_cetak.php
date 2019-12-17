<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Data Siswa</title>
    <link href="<?php echo site_url('assets/css/print.css'); ?>" rel="stylesheet" type="text/css">
</head>
<body>
    <h1>DATA SISWA</h1>
    <h3>KELAS <?php echo strtoupper($kelas->nama); ?></h3>
    <h3>SMP NEGERI 1 CILEUNGSI</h3>
    <table width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Lengkap</th>
            </tr>
        </thead>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 1; ?>
            <?php foreach ($rows as $row) { ?>
            <tr>
                <td><?php echo $counter; ?></td>
                <td><?php echo $row->nis; ?></td>
                <td><?php echo $row->nama; ?></td>
            </tr>
            <?php $counter++; ?>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
