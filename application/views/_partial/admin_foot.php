</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo site_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo site_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

<script src="<?php echo site_url('assets/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

<?php if (isset($use_editor) && $use_editor) { ?>
<script src="<?php echo site_url('assets/vendor/ckeditor/ckeditor.js'); ?>"></script>
<script>
function MinHeightPlugin(editor) {
  this.editor = editor;
}

MinHeightPlugin.prototype.init = function() {
  this.editor.ui.view.editable.extendTemplate({
    attributes: {
      style: {
        minHeight: '300px'
      }
    }
  });
};

ClassicEditor.builtinPlugins.push(MinHeightPlugin);
ClassicEditor
    .create( document.querySelector( '#editor' ))
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
</script>
<?php } ?>

<!-- Custom scripts for all pages-->
<script src="<?php echo site_url('assets/js/sb-admin-2.min.js'); ?>"></script>

</body>

</html>
