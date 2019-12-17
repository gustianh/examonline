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
                <a class="btn btn-success" href="<?php echo site_url('soal/tambah'); ?>"><i class="fas fa-plus"></i> Tambah Soal</a>
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
                <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Mapel</th>
                            <th>Paket</th>
                            <th>Soal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Mapel</th>
                            <th>Paket</th>
                            <th>Soal</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End Page Content -->

<?php function footer_block() { ?>
    <script type="text/javascript">
        $(document).ready(function () {
            var tabel = $('#table').DataTable({
                "autoWidth": false,
                "processing": true,
                "serverSide": true,
                "ordering": true,
                "order": [[0, 'asc']],
                "ajax":
                {
                    "url": '<?=site_url('soal/populate_table');?>',
                    "type": "POST"
                },
                "deferRender": true,
                "columns": [
                    { "data": "id_soal" },
                    { "data": "mapel" },
                    { "data": "paket" },
                    { "data": "soal" },
                    {
                        "render": function (data, type, row) {
                            var html = '<a class="btn btn-outline-warning btn-sm" href="<?=site_url('soal/edit');?>/' + row.id_soal + '">Edit</a>  '
                            html += '<a class="btn btn-outline-danger btn-sm" href="<?=site_url('soal/hapus');?>/' + row.id_soal + '">Hapus</a>'
                            return html;
                        }
                    }
                ]
            });
        });
    </script>
<?php } ?>
