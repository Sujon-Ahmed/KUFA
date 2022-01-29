  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Develop by <a href="https://github.com/Sujon-Ahmed">Sujon Ahmed</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/js/jquery.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <!-- toastr js cdn link -->
  <script src="assets/js/toastr.min.js"></script>
  <!-- summernote js cdn link -->
  <script src="summernote/summernote-bs4.min.js"></script>
  <!-- toastr message -->
  <?php if (isset($_SESSION['msg']['success'])) { ?>
    <script>
        toastr.success("<?= Flash_data::show_error() ?>");
    </script>
  <?php } ?>
  <?php if (isset($_SESSION['msg']['error'])) { ?>
    <script>
        toastr.error("<?= Flash_data::show_error() ?>");
    </script>
  <?php } ?>
  <!-- summernote script -->
  <script>
    // $('#banner_desc').summernote({
    //   placeholder: 'Write Your Description Here...',
    //   tabsize: 2,
    //   height:250
    // });
    $(document).ready(function() {
      $('#banner_desc').summernote({
        placeholder: 'Write Your Banner Description Here...',
        tabsize: 2,
        height: 200
      });
    });
  </script>

</body>

</html>