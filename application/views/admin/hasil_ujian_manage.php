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
                <a class="btn btn-success" data-toggle="modal" data-target="#printModal"><i class="fas fa-plus"></i>  Cetak</a>
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
                            <th>Ujian</th>
                            <th>Skor</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $row) { ?>
                        <tr>
                            <td><?php echo $row->id_hasil; ?></td>
                            <td><?php echo $row->nama; ?></td>
                            <td><?php echo $row->judul; ?></td>
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

<!-- Print Modal -->
<div class="modal fade" id="printModal" tabindex="-1" role="dialog" aria-labelledby="cetakModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="cetakModalLabel">Cetak Hasil Ujian</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
            <form action="<?php echo site_url('hasil_ujian/cetak'); ?>" method="POST">
                <div class="modal-body">Pilih ujian untuk di cetak.
                    <select class="custom-select" id="id_ujian" name="id_ujian">
                        <?php foreach ($rows_ujian as $row) { ?>
                        <option value="<?php echo $row->id_ujian; ?>"><?php echo $row->judul; ?></option>
                        <?php } ?>
                    </select>        
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Cetak</button>        
                </div>
            </form>
      </div>
    </div>
  </div>