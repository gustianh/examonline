<?=base64_decode("PC9kaXY+CjwhLS0gRW5kIG9mIE1haW4gQ29udGVudCAtLT4KCjwhLS0gRm9vdGVyIC0tPgo8Zm9vdGVyIGNsYXNzPSJzdGlja3ktZm9vdGVyIGJnLXdoaXRlIj4KICA8ZGl2IGNsYXNzPSJjb250YWluZXIgbXktYXV0byI+CiAgICA8ZGl2IGNsYXNzPSJjb3B5cmlnaHQgdGV4dC1jZW50ZXIgbXktYXV0byI+CiAgICAgIDxzcGFuPkNvcHlyaWdodCAmY29weTsgRkd1c3RpYW4gSGVybGFtYmFuZyB8IFVOUEFLIDIwMTk8L3NwYW4+CiAgICA8L2Rpdj4KICA8L2Rpdj4KPC9mb290ZXI+CjwhLS0gRW5kIG9mIEZvb3RlciAtLT4KCjwvZGl2Pgo8IS0tIEVuZCBvZiBDb250ZW50IFdyYXBwZXIgLS0+Cgo8L2Rpdj4KPCEtLSBFbmQgb2YgUGFnZSBXcmFwcGVyIC0tPgoKPCEtLSBTY3JvbGwgdG8gVG9wIEJ1dHRvbi0tPgo8YSBjbGFzcz0ic2Nyb2xsLXRvLXRvcCByb3VuZGVkIiBocmVmPSIjcGFnZS10b3AiPgogIDxpIGNsYXNzPSJmYXMgZmEtYW5nbGUtdXAiPjwvaT4KPC9hPg==");?>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo site_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo site_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

<script src="<?php echo site_url('assets/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

<?php
if (isset($load_js)) {
    foreach ($load_js as $key) {
        switch ($key) {
          case 'editor':
            echo '<script src="' . site_url('assets/vendor/ckeditor/ckeditor.js') . '"></script>';
            echo '<script src="' . site_url('assets/js/ckeditor.js') . '"></script>';
            break;

          case 'timer':
            echo '<script src="' . site_url('assets/vendor/moment/moment.js') . '"></script>';
            echo '<script src="' . site_url('assets/js/ujian_timer.js') . '"></script>';
            break;
      }
    }
} ?>

<!-- Custom scripts for all pages-->
<script src="<?php echo site_url('assets/js/sb-admin-2.js'); ?>"></script>

</body>

</html>
