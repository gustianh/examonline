<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Kartu Ujian</title>
    <style>
        @page {
            size: A4 landscape;
        }

        @media all {
            .page-break {
                display: none;
            }
        }

        @media print {
            .page-break {
                display: block;
                page-break-before: always;
            }
        }

        .grid-container {
            display: grid;
            grid-column-gap: 10px;
            grid-row-gap: 10px;
            grid-template-columns: 33.3% 33.3% 33.3%;
            padding: 10px;
        }

        .grid-item {
            border: 1px solid rgba(0, 0, 0, 0.8);
            padding: 20px;
            font-size: 30px;
            text-align: center;
            display: block;
        }

        p {
            font-size: 14pt;
            font-weight: bold;
        }

        .center-table {
            margin-left: auto;
            margin-right: auto;
        }

        th,
        td {
            font-size: 12pt;
        }

    </style>
</head>

<body>
    <?php foreach ($rows as $row) { ?>
    <div class="grid-container">
        <?php foreach ($row as $entry) { ?>
        <div class="grid-item">
            <p>KARTU UJIAN<br>TAHUN PELAJARAN 2019/2020<br>SMAN 1 CILEUNGSI</p>
            <div class="center-table">
                <table class="center-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nama:</td>
                            <td><?php echo $entry->nama; ?></td>
                        </tr>
                        <tr>
                            <td>Kelas:</td>
                            <td><?php echo $entry->nama_kelas; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="page-break"></div>
    <?php } ?>
</body>

</html>
