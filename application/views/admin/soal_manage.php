<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Soal Ujian</h1>
    <p class="mb-4">Data Soal</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex align-items-center">
                <h6 class="mr-auto mb-0 font-weight-bold text-primary">Data Soal</h6>
                <a class="btn btn-success" href="<?php echo site_url('soal/tambah'); ?>"><i class="fas fa-plus"></i>  Tambah Minat</a>
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
                            <th>Paket</th>
                            <th>Soal</th>
                            <th>Jawaban A</th>
                            <th>Jawaban B</th>
                            <th>Jawaban C</th>
                            <th>Jawaban D</th>
                            <th>Jawaban E</th>
                            <th>Kunci Jawaban</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Paket</th>
                            <th>Soal</th>
                            <th>Jawaban A</th>
                            <th>Jawaban B</th>
                            <th>Jawaban C</th>
                            <th>Jawaban D</th>
                            <th>Jawaban E</th>
                            <th>Kunci Jawaban</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($rows as $row) { ?>
                        <tr>
                            <td><?php echo $row->id_soal; ?></td>
                            <td><?php echo $row->id_paket; ?></td>
                            <td><?php echo $row->soal; ?></td>
                            <td><?php echo $row->opsi_a; ?></td>
                            <td><?php echo $row->opsi_b; ?></td>
                            <td><?php echo $row->opsi_c; ?></td>
                            <td><?php echo $row->opsi_d; ?></td>
                            <td><?php echo $row->opsi_e; ?></td>
                            <td><?php echo $row->kunci_jawaban; ?></td>
                            <td><a class="btn btn-outline-warning btn-sm"
                                    href="<?php echo site_url('soal/edit/' . $row->id_soal); ?>">Edit</a>
                                <a class="btn btn-outline-danger btn-sm"
                                    href="<?php echo site_url('soal/hapus/' . $row->id_soal); ?>">Hapus</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End Page Content -->
