<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Hasil Ujian</h1>
    <p class="mb-4">Data Administrasi Hasil Ujian</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex align-items-center">
                <h6 class="mr-auto mb-0 font-weight-bold text-primary">Hasil Ujian</h6>
            </div>
        </div>
        <div class="card-body">
            <?php if (isset($message)) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $message; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php } ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Siswa</th>
                            <th>Skor</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Siswa</th>
                            <th>Skor</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($rows as $row) { ?>
                        <tr>
                            <td><?php echo $row->id_hasil; ?></td>
                            <td><?php echo $row->nama; ?></td>
                            <td><?php echo $row->skor; ?></td>
                            <td><a class="btn btn-outline-danger btn-sm"
                                    href="<?php echo site_url('hasil_ujian/hapus/' . $row->id_hasil); ?>">Hapus</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End Page Content -->
