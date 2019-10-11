</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; FGustian Herlambang | UNPAK 2019</span>
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

  MinHeightPlugin.prototype.init = function () {
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
    .create(document.querySelector('#editor'))
    .then(editor => {
      console.log(editor);
    })
    .catch(error => {
      console.error(error);
    });

</script>
<?php } ?>

<?php if (isset($use_countdown) && $use_countdown) { ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"
  integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
    $.getJSON('/ujian/batas_waktu/<?php echo $id_ujian; ?>', function (data) {
        var eventTime = new Date().getMilliseconds() + (data.batas_waktu * 60 *
        1000); // Timestamp - Sun, 21 Apr 2013 13:00:00 GMT
        var currentTime = new Date().getMilliseconds(); // Timestamp - Sun, 21 Apr 2013 12:30:00 GMT
        var diffTime = eventTime - currentTime;
        var duration = moment.duration(diffTime, 'milliseconds');
        var interval = 1000;

        setInterval(function () {
          duration = moment.duration(duration - interval, 'milliseconds');
          $('#timer').text("Sisa waktu: " + duration.hours() + ":" + duration.minutes() + ":" + duration.seconds())
        }, interval);
    });
  })

  function getTimeFromMins(mins) {
    // do not include the first validation check if you want, for example,
    // getTimeFromMins(1530) to equal getTimeFromMins(90) (i.e. mins rollover)
    if (mins >= 24 * 60 || mins < 0) {
      throw new RangeError("Valid input should be greater than or equal to 0 and less than 1440.");
    }
    var h = mins / 60 | 0,
      m = mins % 60 | 0;
    return moment.utc().hours(h).minutes(m).format("hh:mm A");
  }

</script>
<?php } ?>

<!-- Custom scripts for all pages-->
<script src="<?php echo site_url('assets/js/sb-admin-2.min.js'); ?>"></script>

</body>

</html>
